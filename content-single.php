<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    // Post thumbnail.
    twentyfifteen_post_thumbnail();
    ?>
    <header class="entry-header">
        <?php
        if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
        endif;
        ?>
    </header>
    <!-- .entry-header -->

    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content(sprintf(
            __('Continue reading %s', 'twentyfifteen'),
            the_title('<span class="screen-reader-text">', '</span>', false)
        ));
        wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'twentyfifteen') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'twentyfifteen') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));
        ?>
    </div>
    <!-- .entry-content -->
    <?php
    // Author bio.
    if (is_single() && get_the_author_meta('description')) :
        get_template_part('author-bio');
    endif;
    ?>
    <div id="comment-area">
        <div class="pn_post_link">
            <?php
            previous_post_link('%link', '<b>上一篇:</b><span>%title</span><br/>');
            next_post_link('%link', '<b>下一篇:</b><span>%title</span>');
            ?>
        </div>
        <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_twi" data-cmd="twi" title="分享到Twitter"></a></div>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>

</article><!-- #post-## -->
