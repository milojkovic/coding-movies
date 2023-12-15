<?php
/* Template Name: Custom Login */
include_once'connect-api.php';
?>

<?php get_header(); ?>

<div class="login-form-container">
	<form name="loginform" id="loginform" class="login-form" method="post">
		<p>
			<label for="user_login">Username<br/>
			<input type="text" name="log" id="user_login" class="input" value="" size="20"/></label>
		</p>
		<p>
			<label for="user_pass">Password<br/><input type="password" name="pwd" id="user_pass" class="input" value="" size="20"/></label>
		</p>
		<p class="forgetmenot">
			<label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"/> Remember Me</label>
		</p>
		<p class="submit">
			<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In"/>
			<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
		</p>
	</form>
</div>

<!--// It can also be done this way -->
<!--<div class="login-form-container">-->
<!--	--><?php
//	$args = array(
//		'redirect'    => home_url(),
//		'id_username' => 'log',
//		'id_password' => 'pwd',
//	); ?>
<!--	--><?php //wp_login_form( $args ); ?>
<!--</div>-->

<?php get_footer(); ?>
