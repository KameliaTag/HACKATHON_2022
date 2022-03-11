<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="" <?php language_attributes(); ?>>
	<head>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/simple-grid.css">
		<link rel="stylesheet" href="https://use.typekit.net/ytq8nba.css">
		<link rel="stylesheet" href="https://use.typekit.net/ytq8nba.css">
		
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

		<?php

		add_action( 'wp_enqueue_scripts', 'my_plugin_assets' );
		function my_plugin_assets() {
			wp_enqueue_script( 'index', get_template_directory_uri() . '/assets/js/index.js', [], 1, false);
			wp_enqueue_script( 'index' );
		}
		?>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">
	</head>

	<header>
		<div class="row">
			<div class="col-7" style="margin-top: 12px;">
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo.svg" style="width: 67px;"></a>
			</div>
			<div class="col-5" style="margin-top: 28px;">
				<select>
					<option>EN</option>
					<option>FR</option>
					<option>CH</option>
				</select>

				<a href='#' style="margin-left: 80px;">LOGIN</a>

				<a href='#' style="margin-left: 80px;">REQUEST A NOTE</a>
			</div>
		</div>
	</header>

	<body <?php body_class(); ?>>
