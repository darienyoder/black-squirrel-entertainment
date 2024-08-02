<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/wp-content/themes/BlackSquirrelEntertainment/style.css">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <header id="header">
            <div>
                <a href="/home"><img src="temp-icon.png" alt=""></a>
                <a href="/home">
                    <h1>Black Squirrel Entertainment</h1>
                    <h2>See what's up</h2>
                </a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="/tv">TV</a
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
                    ><li
                        ><a href="/radio">Radio</a
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
                    </li>
                </ul>
            </nav>
        </header>
        <main>
