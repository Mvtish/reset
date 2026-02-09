<?php
/**
 * Template Name: Puente Alto Weather Only
 * Description: Muestra únicamente el widget del clima.
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();

?>
<main class="paw-widget-page" role="main">
    <?php echo do_shortcode('[puente_alto_weather]'); ?>
</main>
<?php

get_footer();
