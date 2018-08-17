<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chefeedback
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo"><?php if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo(); } ?>
            </div>
            <div class="header-right-section">
                <div class="position-contact-us">
                    <div>
                        <span><i class="fas fa-calculator"></i></span><span>(068 26 20 669)</span>
                    </div>
                    <button>Contact</button>
                    <button>Request a Demo</button>
                </div>
                <div class="main-menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'page-top-menu',
                        'container_class' => 'custom-menu-class' ) );
                    ?>
                </div>
            </div>
        </div>

    </header>
    <?php the_breadcrumb(); ?>

<?php wp_footer(); ?>
</body>
</html>
