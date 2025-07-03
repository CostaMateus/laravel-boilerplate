<?php

namespace App\Rector;

use PhpParser\Node;
use PhpParser\Comment\Doc;
use PhpParser\Node\Expr\Variable;
use Rector\Rector\AbstractRector;
use PhpParser\Node\Stmt\Function_;
use PhpParser\Node\Stmt\ClassMethod;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;

final class CamelCaseToSnakeCaseVariableRector extends AbstractRector
{
    /**
     * Map of variable names from camelCase to snake_case
     *
     * @var array
     */
    private array $variable_map = [];

    /**
     * Returns the rule definition for this rector.
     *
     * @return RuleDefinition
     */
    public function getRuleDefinition() : RuleDefinition
    {
        return new RuleDefinition(
            "Convert camelCase variables to snake_case in parameters, variables and docblocks",
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
                        /**
                         * @param EmailVerificationRequest $emailVerificationRequest
                         * @return RedirectResponse
                         */
                        public function __invoke(EmailVerificationRequest $emailVerificationRequest): RedirectResponse
                        {
                            $userModel = $emailVerificationRequest->user();
                            return redirect();
                        }
                    CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
                        /**
                         * @param EmailVerificationRequest $email_verification_request
                         * @return RedirectResponse
                         */
                        public function __invoke(EmailVerificationRequest $email_verification_request): RedirectResponse
                        {
                            $user_model = $email_verification_request->user();
                            return redirect();
                        }
                    CODE_SAMPLE
                ),
            ]
        );
    }

    /**
     * Returns the node types that this rector can handle.
     *
     * @return array
     */
    public function getNodeTypes() : array
    {
        return [ClassMethod::class, Function_::class];
    }

    /**
     * Refactors the given node.
     *
     * @param ClassMethod|Function_ $node
     */
    public function refactor( Node $node ) : ?Node
    {
        $has_changed = false;

        $this->mapVariablesInMethod( $node );

        if ( $this->processDocBlock( $node ) )
            $has_changed = true;

        if ( $this->processParameters( $node ) )
            $has_changed = true;

        if ( $this->processVariablesInMethod( $node ) )
            $has_changed = true;

        return $has_changed ? $node : null;
    }

    /**
     * Maps variables in the method to their snake_case equivalents.
     *
     * @param ClassMethod|Function_ $node
     */
    private function mapVariablesInMethod( ClassMethod|Function_ $node ) : void
    {
        $this->variable_map = [];

        foreach ( $node->params as $param )
        {
            if ( $param->var instanceof Variable )
            {
                $variable_name = $this->getName( $param->var );

                if ( $variable_name !== null )
                {
                    $snake_case_name = $this->camelCaseToSnakeCase( $variable_name );

                    if ( $variable_name !== $snake_case_name )
                        $this->variable_map[$variable_name] = $snake_case_name;
                }
            }
        }

        $this->traverseNodesWithCallable( $node->stmts ?? [], function ( Node $node ) : void
        {
            if ( $node instanceof Variable )
            {
                $variable_name = $this->getName( $node );

                if ( $variable_name !== null && ! $this->shouldSkipVariable( $variable_name ) )
                {
                    $snake_case_name = $this->camelCaseToSnakeCase( $variable_name );

                    if ( $variable_name !== $snake_case_name )
                        $this->variable_map[$variable_name] = $snake_case_name;
                }
            }

        } );
    }

    /**
     * Processes the docblock of the given node, updating variable names.
     *
     * @param ClassMethod|Function_ $node
     *
     * @return bool true if the docblock was changed, false otherwise
     */
    private function processDocBlock( ClassMethod|Function_ $node ) : bool
    {
        $doc_comment = $node->getDocComment();

        if ( ! $doc_comment instanceof Doc )
            return false;

        $original_text = $doc_comment->getText();

        $updated_text = $this->updateDocBlockVariables( $original_text );

        if ( $original_text === $updated_text )
            return false;

        $node->setDocComment( new Doc( $updated_text ) );

        return true;
    }

    /**
     * Processes the parameters of the given node, updating variable names.
     *
     * @param ClassMethod|Function_ $node
     *
     * @return bool true if any parameter was changed, false otherwise
     */
    private function processParameters( ClassMethod|Function_ $node ) : bool
    {
        $has_changed = false;

        foreach ( $node->params as $param )
        {
            if ( $param->var instanceof Variable )
            {
                $variable_name = $this->getName( $param->var );

                if ( $variable_name !== null && isset( $this->variable_map[$variable_name] ) )
                {
                    $param->var->name = $this->variable_map[$variable_name];

                    $has_changed = true;
                }
            }
        }

        return $has_changed;
    }

    /**
     * Processes the variables in the method body, updating their names.
     *
     * @param ClassMethod|Function_ $node
     *
     * @return bool true if any variable was changed, false otherwise
     */
    private function processVariablesInMethod( ClassMethod|Function_ $node ) : bool
    {
        $has_changed = false;

        $this->traverseNodesWithCallable( $node->stmts ?? [], function ( Node $node ) use ( &$has_changed ) : void
        {
            if ( $node instanceof Variable )
            {
                $variable_name = $this->getName( $node );

                if ( $variable_name !== null && isset( $this->variable_map[$variable_name] ) )
                {
                    $node->name = $this->variable_map[$variable_name];
                    $has_changed = true;
                }
            }

        } );

        return $has_changed;
    }

    /**
     * Updates the docblock by replacing camelCase variable names with snake_case.
     *
     * @param string $doc_block
     *
     * @return string
     */
    private function updateDocBlockVariables( string $doc_block ) : string
    {
        if ( $this->variable_map === [] )
            return $doc_block;

        $updated_doc_block = $doc_block;

        foreach ( $this->variable_map as $camel_case => $snake_case )
        {
            $patterns = [
                // @param Type $variableName
                "/(@param\s+[^\s]+\s+\$)" . preg_quote( $camel_case, "/" ) . "(\s|$)/",
                // @var Type $variableName
                "/(@var\s+[^\s]+\s+\$)" . preg_quote( $camel_case, "/" ) . "(\s|$)/",
                // @return Type description with $variableName
                "/(\$)" . preg_quote( $camel_case, "/" ) . "(\s|$|\.|\,|\;)/",
            ];

            foreach ( $patterns as $pattern )
                $updated_doc_block = preg_replace( $pattern, "$1" . $snake_case . "$2", (string) $updated_doc_block );
        }

        return $updated_doc_block;
    }

    /**
     * Converts a camelCase string to snake_case.
     *
     * @param string $input
     *
     * @return string
     */
    private function camelCaseToSnakeCase( string $input ) : string
    {
        return mb_strtolower( (string) preg_replace( "/(?<!^)[A-Z]/", "_$0", $input ) );
    }

    /**
     * Determines if a variable should be skipped based on its name.
     *
     * @param string $variable_name
     *
     * @return bool true if the variable should be skipped, false otherwise
     */
    private function shouldSkipVariable( string $variable_name ) : bool
    {
        $skip_variables = [
            "this",
            "GLOBALS",
            "_GET",
            "_POST",
            "_SESSION",
            "_COOKIE",
            "_FILES",
            "_ENV",
            "_SERVER",
            "_REQUEST",
        ];

        return in_array( $variable_name, $skip_variables, true );
    }
}
