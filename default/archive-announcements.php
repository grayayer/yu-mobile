<?php // get_header(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( ' | ', true, 'right' ); ?></title>
		<?php wptouch_head(); ?>
	</head>
	
	<!-- Help speed up display of the page -->
	<?php flush(); ?>
	
	<body <?php body_class( wptouch_get_body_classes() ); ?>>
		
		<?php do_action( 'wptouch_preview' ); ?>
		
		<?php do_action( 'wptouch_body_top' ); ?>
		
		<?php get_template_part( 'header-bottom-announcements' ); ?>

<div id="content">
	<?php if ( wptouch_have_posts() ) while ( wptouch_have_posts() ) { ?>
		<?php wptouch_the_post(); ?>
		<div class="<?php wptouch_post_classes(); ?>">
			<?php get_template_part( 'announcement-post-loop' ); ?>
		</div> <!-- post classes -->
	<?php } else { ?> 
		<!-- no posts -->
	<?php } ?>
	<?php if ( foundation_is_theme_using_module( 'infinite-scroll' ) ) { ?>		

		<?php if ( get_next_posts_link() ) { ?>
			<!-- hidden in css, needed to add js -->
			<a class="infinite-link" href="#" rel="<?php echo get_next_posts_page_link(); ?>"></a>
		<?php } ?>

	<?php } elseif ( foundation_is_theme_using_module( 'load-more' ) ) { ?>

		<!-- show the load more if we have more posts/pages -->
		<?php if ( get_next_posts_link() ) { ?>
			<a class="load-more-link tappable no-ajax" href="javascript:return false;" rel="<?php echo get_next_posts_page_link(); ?>">
				<?php wptouch_fdn_archive_load_more_text(); ?>&hellip;
			</a>
		<?php } ?>

	<?php } else { ?>

		<div class="posts-nav">
			<?php posts_nav_link( ' | ', '&lsaquo; ' . __( 'newer posts', 'wptouch-pro' ), __( 'older posts', 'wptouch-pro' ) . ' &rsaquo;' ); ?>
		</div>

	<?php } ?>

</div><!-- #content -->

<?php get_footer(); ?>