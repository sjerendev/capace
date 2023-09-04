<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<div id="ttr_header" class="jumbotron bg-dark">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 text-start">
				<h1 class="display-4 text-white"><?php bloginfo( 'name' ); ?></h1>
				<p class="lead text-white"><?php bloginfo( 'description' ); ?></p>
			</div>
			<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 text-end position-relative">
				<button id="colorButton">Byt färg</button>
				<div id="colorHex" class="text-white">#FFFFFF</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
