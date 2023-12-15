<?php
/*Template Name: Review*/

get_header();

query_posts(array(
	'post_type' => 'movies_review'
)); ?>

<?php

while (have_posts()) : the_post(); ?>
	<div class="code-movies-content">
		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<p><?php the_excerpt(); ?></p>
	</div>
<?php endwhile;

get_footer();

?>
