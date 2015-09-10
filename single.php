<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format());

//			the_post_navigation( array(
//				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
//					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
//					'<span class="post-title">%title</span>',
//				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
//					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
//					'<span class="post-title">%title</span>',
//			) );
			previous_post_link('%link','<b>上一篇:</b><span>%title</span>');
			next_post_link('%link','<b>下一篇:</b><span>%title</span>');

			// If comments are open or we have at least one comment, load up the comment template.

		// End the loop.
		endwhile;
		?>
			<!-- JiaThis Button BEGIN -->
			<div class="jiathis_style">
				<span class="jiathis_txt">分享到：</span>
				<a class="jiathis_button_tsina" title="分享到新浪微博"><span class="jiathis_txt jtico jtico_tsina"></span></a>
				<a class="jiathis_button_cqq" title="分享到QQ好友"><span class="jiathis_txt jtico jtico_cqq"></span></a>
				<a class="jiathis_button_douban" title="分享到豆瓣"><span class="jiathis_txt jtico jtico_douban"></span></a>
				<a class="jiathis_button_weixin" title="分享到微信"><span class="jiathis_txt jtico jtico_weixin"></span></a>
				<a class="jiathis_button_tumblr" title="分享到Tumblr"><span class="jiathis_txt jtico jtico_tumblr"></span></a>
				<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
			</div>
			<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1405949716054953" charset="utf-8"></script><script type="text/javascript" src="http://v3.jiathis.com/code/plugin.client.js" charset="utf-8"></script>
			<!-- JiaThis Button END -->
			<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
