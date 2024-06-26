<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;500;600;700&family=Instrument+Sans:wght@400;500;600&family=Outfit:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- <script src="javascript/social-share.js"></script> -->

    <title>
        <?php wp_title(); ?>
    </title>

    <?php wp_head(); ?>
    <?php get_template_part('/template-parts/search-query-prompt'); ?>
    <?php get_template_part('/template-parts/drawer-from-bottom'); ?>

</head>


<body <?php body_class(); ?>>
<?php get_template_part('/template-parts/top-navigation-bar'); ?>







