<!DOCTYPE html>
<html id="bse-html" lang="en-US" <?php /*language_attributes();*/ ?> <?php /*blankslate_schema_type();*/ ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <?php echo '<link rel="stylesheet" href="/wp-content/themes/BlackSquirrelEntertainment/style.css?ver='.$_SERVER['REQUEST_TIME'].'">'; ?>
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
        <!-- <link href="" rel="stylesheet"> -->
        <?php echo '<script src="/wp-content/themes/BlackSquirrelEntertainment/main.js?ver='.$_SERVER['REQUEST_TIME'].'" charset="utf-8"></script>'; ?>
        <?php if ($_SERVER['REQUEST_URI'] == "/tv" || $_SERVER['REQUEST_URI'] == "/radio" || $_SERVER['REQUEST_URI'] == "/article" || (str_starts_with($_SERVER['REQUEST_URI'], "/tv") && $_SERVER['REQUEST_URI'] != "/tv/shows" && $_SERVER['REQUEST_URI'] != "/tv/schedule")) {
            echo '
                <style>
                #bse-header {
                    position: absolute;
                    z-index: 100000;
                }

                main, #bse-body.customize-support main {
                    margin-left: 0px;
                    margin-right: 0px;
                    margin-top: 0px;
                    top: 0px;
                }

                #nav-links, nav #toggled-nav, nav li ul, #blue-bar {
                    background-color: transparent;
                }

                nav #toggled-nav a:hover {
                    // background-color: var(--dark-blue);
                }

                </style>
            ';
        } ?>
        <?php if (!str_starts_with($_SERVER['REQUEST_URI'], "/tv") && !str_starts_with($_SERVER['REQUEST_URI'], "/radio") && !str_starts_with($_SERVER['REQUEST_URI'], "/podcasts") && !str_starts_with($_SERVER['REQUEST_URI'], "/article")) {
            echo '
                <style>
                @media only screen and (min-aspect-ratio: 1 / 1)
                {
                    :root {
                      --nav1-height: 90px;
                      --nav2-height: 0px;
                    }

                    #nav-links {
                        font-size: 50px;
                    }
                }
                </style>
            ';
        } ?>
        <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/article/")) {
            echo '
                <style>
                main {
                    margin: 0px 200px;
                }
                @media only screen and (max-aspect-ratio: 1 / 1)
                {
                    main {
                        margin: 0px 10px;
                    }
                }
                </style>
            ';
        } ?>
        <?php wp_head(); ?>
    </head>
    <body id="bse-body" onload="if(window.location.href.endsWith('/')&&window.location.pathname!='/'){window.location.href=window.location.href.slice(0,window.location.href.length-1);}" <?php /*body_class();*/ ?>>
        <?php /* wp_body_open(); */ ?>
        <header id="bse-header">
            <div>
                <a href="/home">
                    <img id="bse-logo" src="/wp-content/themes/BlackSquirrelEntertainment/assets/icon_light.png" alt="">
                </a>
                <a id="bse-title" href="/home">
                    <img src="/wp-content/themes/BlackSquirrelEntertainment/assets/icon_light.png" alt="Black Squirrel Entertainment" height="30px">
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
                                <span><a href="/tv/schedule">Schedule</a></span>
                            </li>
                            <li>
                                <span><a href="/tv/shows">Shows</a></span>
                            </li>
                        </ul
                    ></li
                    ><li <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/radio") || str_starts_with($_SERVER['REQUEST_URI'], "/podcasts")) {echo "id='toggled-nav'";} ?>
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
                                <span><a href="/podcasts">Podcasts</a></span>
                            </li>
                        </ul
                    ></li
                    ><li <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/article")) {echo "id='toggled-nav'";} ?>
                        ><span class="bse-submenu"
                        ><a href="/articles">Articles</a></span
                        ><ul>
                            <li>
                                <span><a href="/articles">Recent</a></span>
                            </li>
                            <li>
                                <span><a href="/articles/archive">Archive</a></span>
                            </li>
                            <!-- <li>
                                <span><a href="/articles">Music</a></span>
                            </li> -->
                            <!-- <li>
                                <span><a href="/radio/shows">Shows</a></span>
                            </li> -->
                        </ul
                    ></li
                    ><li
                        ><span><a href="/about">About</a></span
                    ></li
                    ><li
                        ><span><a href="/contact">Contact</a></span
                    ></li>
                </ul>
                <!-- <div id="blue-bar"></div> -->
            </nav>
        </header>
        <main>
