<!DOCTYPE html>
<html id="bse-html" lang="en-US" <?php /*language_attributes();*/ ?> <?php /*blankslate_schema_type();*/ ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/wp-content/themes/BlackSquirrelEntertainment/style.css?ver=2024.8.5.16">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <script src="/wp-content/themes/BlackSquirrelEntertainment/main.js" charset="utf-8"></script>
        <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/tv/shows/") && $_SERVER['REQUEST_URI'] != "/tv/shows/") {
            echo '
                <style>
                #bse-header {
                    position: absolute;
                    z-index: 100000;
                }

                #nav-links, nav #toggled-nav, nav li ul, #blue-bar {
                    background-color: transparent;
                }

                nav #toggled-nav a:hover {
                    background-color: var(--dark-blue);
                }

                </style>
            ';
        } ?>
        <?php wp_head(); ?>
    </head>
    <body id="bse-body" onload="bse_main();" <?php /*body_class();*/ ?>>
        <?php /* wp_body_open(); */ ?>
        <header id="bse-header">
            <div>
                <a href="/home">
                    <img id="bse-logo" src="/wp-content/themes/BlackSquirrelEntertainment/assets/darien-logo.png" alt="">
                </a>
                <a id="bse-title" href="/home">
                    <img src="/wp-content/themes/BlackSquirrelEntertainment/assets/darien-logo.png" alt="Black Squirrel Entertainment" height="30px">
                </a>
                <a id="nav-burger" ref="javascript:void(0);" class="icon" onclick="toggleNav();">
                    <img src="/wp-content/themes/BlackSquirrelEntertainment/assets/menu-icon.png">
                </a>
            </div>
            <nav id="nav-links">
                <ul>
                    <li class="bse-tall-link" onclick="openNavSubmenu(this);" <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/tv")) {echo "id='toggled-nav'";} ?>
                        ><span class="bse-submenu"
                        ><a href="/tv">TV</a></span
                        ><ul>
                            <li>
                                <span><a href="/tv"><b>LIVE</b></a></span>
                            </li>
                            <li>
                                <span><a href="/tv/schedule">SCHEDULE</a></span>
                            </li>
                            <li>
                                <span><a href="/tv/shows">SHOWS</a></span>
                            </li>
                        </ul
                    ></li
                    ><li class="bse-tall-link" onclick="openNavSubmenu(this);" <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/radio")) {echo "id='toggled-nav'";} ?>
                        ><span class="bse-submenu"
                        ><a href="/radio">Radio</a></span
                        ><ul>
                            <li>
                                <span><a href="/radio"><b>LIVE</b></a></span>
                            </li>
                            <li>
                                <span><a href="/radio/schedule">Schedule</a></span>
                            </li>
                            <li>
                                <span><a href="/radio/shows">Shows</a></span>
                            </li>
                        </ul
                    ></li
                    ><li
                        ><span><a href="/articles">Articles</a></span
                    ></li
                    ><li
                        ><span><a href="/about">About</a></span
                    ></li
                    ><li
                        ><span><a href="/join">Join</a></span
                    ></li>
                </ul>
                <!-- <div id="blue-bar"></div> -->
            </nav>
        </header>
        <main>
