<?php

declare(strict_types = 1);

use Rector\Config\RectorConfig;
use App\Rector\CamelCaseToSnakeCaseVariableRector;

return RectorConfig::configure()
    ->withPaths( paths: [
        __DIR__ . "/app",
        __DIR__ . "/bootstrap",
        __DIR__ . "/config",
        __DIR__ . "/lang",
        __DIR__ . "/public",
        __DIR__ . "/resources",
        __DIR__ . "/routes",
    ] )
    ->withPhpSets()
    ->withTypeCoverageLevel( level: 8 ) // 8 to new projects | 5 to legacy | 3 to critical
    ->withDeadCodeLevel( level: 8 )     // 8 to new projects | 6 to legacy | 4 to critical
    ->withCodeQualityLevel( level: 8 )  // 8 to new projects | 5 to legacy | 4 to critical
    ->withPreparedSets(
        naming: true,
        instanceOf: true,
        earlyReturn: true,
        privatization: true,
        strictBooleans: true
    )
    ->withRules( [
        CamelCaseToSnakeCaseVariableRector::class,
    ] );
