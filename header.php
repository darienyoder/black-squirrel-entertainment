<!DOCTYPE html>
<html id="bse-html" lang="en-US" <?php /*language_attributes();*/ ?> <?php /*blankslate_schema_type();*/ ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/wp-content/themes/BlackSquirrelEntertainment/style.css?ver=2024.8.4.25">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <script src="/wp-content/themes/BlackSquirrelEntertainment/main.js" charset="utf-8"></script>
        <script>

function bse_main()
{
    if (window.location.pathname.startsWith("/tv/shows/") && window.location.pathname != "/tv/shows/")
    {
        document.getElementById("nav-links").scrollIntoView();
    }
}

        </script>
        <?php wp_head(); ?>
    </head>
    <body id="bse-body" onload="bse_main();" <?php /*body_class();*/ ?>>
        <?php /* wp_body_open(); */ ?>
        <header id="bse-header">
            <div>
                <a href="/home"><img id="bse-logo" src="/wp-content/themes/BlackSquirrelEntertainment/assets/icon.png" alt=""></a>
                <a id="bse-title" href="/home">
                    <img src="/wp-content/themes/BlackSquirrelEntertainment/assets/bse-header.png" alt="Black Squirrel Entertainment" height="60px">
                    <!-- <h1>Black Squirrel Entertainment</h1>
                    <h2>See what's up</h2> -->
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
                                <a href="/tv"><b>WATCH</b></a>
                            </li>
                            <li>
                                <a href="/tv/schedule">Schedule</a>
                            </li>
                            <li>
                                <a href="/tv/shows">Shows</a>
                            </li>
                        </ul
                    ></li
                    ><li class="bse-tall-link" onclick="openNavSubmenu(this);" <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/radio")) {echo "id='toggled-nav'";} ?>
                        ><span class="bse-submenu"
                        ><a href="/radio">Radio</a></span
                        ><ul>
                            <li>
                                <a href="/radio"><b>LISTEN</b></a>
                            </li>
                            <li>
                                <a href="/radio/schedule">Schedule</a>
                            </li>
                            <li>
                                <a href="/radio/shows">Shows</a>
                            </li>
                        </ul
                    ></li
                    ><li
                        ><a href="/articles">Articles</a
                    ></li
                    ><li
                        ><a href="/about">About</a>
                    </li
                    ><li
                        ><a href="/about">Join</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
