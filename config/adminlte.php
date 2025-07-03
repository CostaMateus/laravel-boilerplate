<?php
return [

    "lang_navbar_enabled"   => true,
    "lang_sidebar_enabled"  => true,

    "usermenu_enabled"      => true,
    "usermenu_profile_href" => "profile.edit",

    "menu" => [
        "navbar" => [
            "items" => [
                [
                    "text"  => "home",
                    "href"  => "dashboard",
                    "icon"  => "",
                    "class" => "",
                ],[
                    "text"  => "safe-area",
                    "href"  => "safe.area",
                    "icon"  => "",
                    "class" => "",
                ],
            ]
        ],
        "sidebar" => [
            "title" => "L.Boilerplate",
            "class" => "bg-lv-primary",
            "href"  => "dashboard",
            "items" => [
                [
                    "text"       => "dashboard",
                    "icon"       => "fa-gauge-max",
                    "href"       => "dashboard",
                    "class"      => "",
                ],[
                    "text"       => "safe-area",
                    "icon"       => "fa-shield-halved",
                    "href"       => "safe.area",
                    "class"      => "",
                ],[
                    "text"       => "level-1",
                    "icon"       => "fa-circle-minus",
                    "icon_color" => "primary",
                    "href"       => "#",
                    "class"      => "",
                    "submenu"    => [
                        [
                            "text"       => "level-2",
                            "icon"       => "fa-circle-check",
                            "icon_color" => "success",
                            "href"       => "level.2",
                            "params"     => [],
                            "class"      => "",
                        ],[
                            "text"       => "level-2",
                            "icon"       => "fa-circle-check",
                            "icon_color" => "success",
                            "href"       => "#",
                            "class"      => "",
                            "submenu"    => [
                                [
                                    "text"       => "level-3",
                                    "icon"       => "fa-circle-x",
                                    "icon_color" => "danger",
                                    "href"       => "level.3",
                                    "params"     => [],
                                    "class"      => "",
                                ],
                                [
                                    "text"       => "level-3",
                                    "icon"       => "fa-circle-x",
                                    "icon_color" => "danger",
                                    "href"       => "level.3",
                                    "params"     => [],
                                    "class"      => "",
                                ],
                            ]
                        ],
                    ]
                ],[
                    "text"       => "level-1",
                    "icon"       => "fa-circle-minus",
                    "icon_color" => "primary",
                    "href"       => "level.1",
                    "params"     => [],
                    "class"      => "",
                ],[
                    "text"       => "level-2",
                    "icon"       => "fa-circle-check",
                    "icon_color" => "success",
                    "href"       => "level.2",
                    "params"     => [],
                    "class"      => "",
                ],[
                    "text"       => "level-3",
                    "icon"       => "fa-circle-x",
                    "icon_color" => "danger",
                    "href"       => "level.3",
                    "params"     => [],
                    "class"      => "",
                ],
            ]
        ],
    ]
];
