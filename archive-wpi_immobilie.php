<?php
/**
 * Template zur Anzeige der Immobilien als Single
 *
 */

use wpi\wpi_classes\ListViewClass;

$list_view = new ListViewClass();

if ( wp_is_block_theme() ):
    $header_block = do_blocks( '<!-- wp:template-part {"slug":"header","area":"header","tagName":"header"} /-->' );
    $footer_block = do_blocks( '<!-- wp:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->' );
endif;
?>

<?php if ( wp_is_block_theme() ): ?>
    <!--    ONLY BLOCK THEMES HEADER  -->
    <!doctype html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wp-site-blocks">
    <?php echo $header_block; ?>

<?php else: ?>
    <!--    LEGACY THEMES HEADER-AREA   -->
    <?php get_header(); ?>
<?php endif; ?>

    <!--    CONTENT AREA   -->
<?php echo $list_view->wrapper_template(); ?>

<?php if ( wp_is_block_theme() ): ?>
    <!--    ONLY BLOCK THEMES FOOTER  -->
    </div>
    <?php echo $footer_block; ?>
    <?php wp_footer(); ?>
    </body>
    </html>

<?php else: ?>
    <!--    LEGACY THEMES FOOTER-AREA   -->
    <?php get_footer(); ?>
<?php endif; ?>
