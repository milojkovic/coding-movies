<?php
/* Template Name: Content Login */
get_header();
?>

<div class="content-login">
	<h2>Login content page</h2>
</div>

<?php
if ( isset( $_COOKIE['wpb_custom_login'] ) ) {
	echo 'Login Success';
} else {
	echo 'Forbidden Access';
}
?>

<?php get_footer(); ?>
