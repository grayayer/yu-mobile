<!-- announcements post loop -->
<a href="<?php wptouch_the_permalink(); ?>" class="loop-link tappable clearfix <?php if ( !bauhaus_should_show_thumbnail() ) { echo 'no-thumbs'; } ?>">

	<?php if ( wptouch_get_comment_count() > 0 && comments_open() ) { ?>
		<div class="comments">
			<span><?php comments_number( '0', '1', '%' ); ?></span>
		</div>
	<?php } ?>
	<?php if ( bauhaus_should_show_thumbnail() && wptouch_has_post_thumbnail() ) { ?>
		<img src="<?php wptouch_the_post_thumbnail( 'thumbnail' ); ?>" alt="thumbnail" class="post-thumbnail wp-post-image" />
	<?php } else if ( bauhaus_should_show_thumbnail() && !wptouch_has_post_thumbnail() ) { ?>
		<div class="date-circle">
			<span class="month"><?php the_time( 'M' ); ?></span>
			<span class="day"><?php the_time( 'j' ); ?></span>
		</div>
	<?php } ?>

	<span class="post-date-author body-font">
		<?php // check if the announcement has a subtitle assigned to it, and if so, displays it.
	             $subtitle = get_post_meta($post->ID, 'subtitle', true); 
	                            
	            if ($subtitle) {
	            echo "$subtitle";
	            }
		?>    
	</span>

	<h2 class="post-title heading-font" style="padding-bottom:0;"><?php the_title(); ?></h2>

	<?php if ( wptouch_should_load_rtl() ) { ?>
		<i class="arrow icon-angle-left"></i>
	<?php } else { ?>
		<i class="arrow icon-angle-right"></i>
	<?php } ?>

	<span class="bottom-border"><!--css border--></span>
</a>