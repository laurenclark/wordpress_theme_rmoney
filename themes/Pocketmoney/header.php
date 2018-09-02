<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PocketMoney</title>
    <meta name="description" content="Pocket Money Tracker" />
    <?php wp_head(); ?> 
</head>

<body>
    <header role="banner">
        <nav role="navigation" class="nav container-xl">
            <div class="nav__left">
                <a role="button" aria-pressed="false" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img role="img" src="<?php echo get_template_directory_uri() . '/dist/image/logo.svg' ?>" alt="Logo"></a>
                <h1><?php if(is_page()){ echo get_the_title(); } else { echo "Blog"; } ?></h1>
            </div>
            <div class="nav__right">
                <div id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="menu hidden">
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Athena's Savings</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    