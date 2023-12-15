<?php

get_header();

/* Start the Loop */
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/post/content', get_post_format() ); ?>

	<div class="single-post">
		<?php
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail( array( 400, 400 ) );
		}
		?>
		<div><?php the_date(); ?></div>
		<h1><?php the_title(); ?> </h1>
		<div><?php the_content(); ?></div>
	</div>
<?php
endwhile; // End of the loop.
?>

<div class="cf_fields">
	<ul>
		<li><strong>Movies Title: </strong>
			<?php echo esc_attr( get_post_meta( get_the_ID(), 'cf_movies_title', true ) ); ?>
		</li>
	</ul>
</div>
<?php
//the_meta();

get_footer();
?>
