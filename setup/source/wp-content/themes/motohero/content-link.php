<?php
/**
 * The default template for displaying content gallery
 * @package motohero
 */
$authordata = Inwave_Helper::getAuthorData();
$inwave_theme_option = Inwave_Helper::getConfig('smof');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-item">
        <div class="post-content">
			<div class="post-icon theme-bg">
				<?php echo inwave_get_post_format_icon(get_post_format()); ?>
				<?php if (is_sticky()){echo '<span class="feature-post">'.esc_html__('Sticky', 'motohero').'</span>';} ?>
			</div>
			<div class="post-info-date theme-bg"><span><?php echo get_the_date('d'); ?></span><br /><?php echo get_the_date('M'); ?></div>
			<div class="post-content-detail">
				<div class="post-content-head">
					<div class="post-head-detail">
						<h3 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title('', ''); ?></a>
						</h3>
						<div class="post-info">
							<?php if($inwave_theme_option['author_info']): ?>
								<div class="post-info-category">
									<span><?php echo esc_html__('By', 'motohero') ?></span>
									<a href="<?php echo esc_url(get_author_posts_url($authordata->ID, $authordata->user_nicename)); ?>">
										<?php echo esc_html($authordata->display_name); ?>
									</a>
								</div>
							<?php endif; ?>
							<?php if($inwave_theme_option['blog_category_title_listing']): ?>
								<div class="post-info-category theme-color"><?php echo '<span>'.esc_html__('On', 'motohero').'</span> '; ?><?php the_category(', ') ?></div>
							<?php endif; ?>
							<?php
							if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
								echo '<div class="post-info-comment">';
								comments_popup_link( esc_html__( '0 comment', 'motohero' ), esc_html__( '1 Comment', 'motohero' ), esc_html__( '% Comments', 'motohero' ) );
								echo '</span></div>';
							}
							?>
						</div>
					</div>
					
					
				</div>
				<div class="post-content-desc">
					<div class="post-text">
						<?php
						/* translators: %s: Name of current post */
						the_content( sprintf(
							'',
							the_title( '<span class="screen-reader-text">', '</span>', false )
						) );

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'motohero' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'motohero' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
						?>
						<div class="clear"></div>
						<?php if ($inwave_theme_option['entry_footer_category']): ?>
							<?php inwave_entry_footer(); ?>
						<?php endif ?>
					</div>
				</div>
				<div class="post-content-footer">
					<?php echo '<a class="more-link" href="'.get_the_permalink().'">'.esc_html__('Continue reading', 'motohero').' <i class="fa fa-arrow-right"></i></a>'; ?>
					<?php if($inwave_theme_option['social_sharing_box_category']): ?>
						<div class="post-share-buttons">
						<span class="post-share-text"><?php echo esc_html__('Share this', 'motohero') ?></span>
							<?php
							inwave_social_sharing(get_permalink(), Inwave_Helper::substrword(get_the_excerpt(), 10), get_the_title());
							?>
						</div>
					<?php endif; ?>
				<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
        </div>
    </div>
</article><!-- #post-## -->