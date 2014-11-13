<?php get_header(); ?>

	<!--
	<div class="crumb-path bauhaus">
		<p>
			<a href="<?php wptouch_bloginfo( 'url' ); ?>"><?php wptouch_bloginfo( 'site_title' ); ?></a> 
			<i class="icon-angle-right"></i> 
			<span><?php wptouch_the_title(); ?></span>
		</p>
	</div>
	-->

	<div id="content">
		<?php while ( wptouch_have_posts() ) { ?>
		
			<?php wptouch_the_post(); ?>

			<div class="<?php wptouch_post_classes(); ?>">
				<div class="post-page-head-area bauhaus">

					<h2 class="post-title heading-font"><?php wptouch_the_title(); ?></h2>
	    
								<?php // check if the announcement has a subtitle assigned to it, and if so, displays it.
	                                $subtitle = get_post_meta($post->ID, 'subtitle', true); 
	                            
	                                if ($subtitle) {
	                                    echo "<h3>$subtitle</h3>";
	                                }
	                            ?>    
	    
				</div>

				<div class="post-page-content">
					<?php if ( bauhaus_should_show_thumbnail() && wptouch_has_post_thumbnail() ) { ?>
						<div class="post-page-thumbnail">
							<?php the_post_thumbnail('large', array( 'class' => 'post-thumbnail wp-post-image' ) ); ?>
						</div>
					<?php } ?>
					
					<a href="<?php echo get_post_meta($post->ID, 'actionURL', true); ?>" target="_blank" class="actionbutton"><?php echo get_post_meta($post->ID, 'actiontext', true); ?></a>

					<?php wptouch_the_content(); ?>

				</div>
			</div>

		<?php } ?>
	</div> <!-- content -->
	
	<?php get_template_part( 'nav-bar' ); ?>
	
	<?php get_template_part( 'related-posts' ); ?>
	
	<?php if ( comments_open() ) { ?>
		<div id="comments">
			<?php comments_template(); ?>
		</div>
	<?php } ?>
	
<?php get_footer(); ?>