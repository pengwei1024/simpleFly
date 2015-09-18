<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if (has_nav_menu('primary') || is_active_sidebar('sidebar-1')) : ?>
    <div id="secondary" class="secondary">
        <?php if (has_nav_menu('primary')) : ?>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php
                // Primary navigation menu.
                wp_nav_menu(array(
                    'menu_class' => 'nav-menu',
                    'theme_location' => 'primary',
                ));
                ?>
            </nav><!-- .main-navigation -->
        <?php endif; ?>
        <?php if (is_home()) { ?>
            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <div id="widget-area" class="widget-area" role="complementary">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>
        <?php } else { ?>
            <?php if (is_active_sidebar('sidebar-2')) : ?>
                <div id="widget-area" class="widget-area" role="complementary">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div><!-- .widget-area -->
            <?php endif; ?>
        <?php } ?>

    </div><!-- .secondary -->

<?php endif; ?>
