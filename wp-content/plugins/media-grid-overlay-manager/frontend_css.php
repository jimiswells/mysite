<?php
///////////////////////////////////////////
// DYNAMICALLY CREATE THE OVERLAYS CSS ////
///////////////////////////////////////////

include_once(MGOM_DIR . '/functions.php');

//// BASIC FRONTEND CSS 
// remove the HTTP/HTTPS for SSL compatibility
$safe_baseurl = str_replace(array('http:', 'https:', 'HTTP:', 'HTTPS:'), '', MGOM_URL);
?>
@import url("<?php echo $safe_baseurl; ?>/css/frontend.css");
<?php

// get all the overlays
$ols = get_terms('mgom_overlays', 'hide_empty=0&orderby=id');
foreach($ols as $ol) :

	// layers counter
	$lc = 0;
?>

/* ***** <?php echo $ol->term_id ?> - <?php echo $ol->name ?> OVERLAY ***** */ 
  <?php  
  // get layers
  $layers = unserialize($ol->description);
  if(is_array($layers) && isset($layers['graphic'])) {
	
	//// graphic
	foreach($layers['graphic'] as $lname => $layer) {
		
		// layer over text block 
		$over_txt = (isset($layer['over_txt_block']) && $layer['over_txt_block']) ? true : false; 
		
		
		// standard
		echo '
		.mgom_'.$ol->term_id.'_'.$lc.' { /* '.$lname.' */
				';
		
		foreach ($layer as $opt => $val) {
			echo mgom_opt_to_css($opt, $val, $layer);
		}
		
			
			$z_index = 900 - (10 * ($lc + 1));
			if($over_txt) {$z_index = $z_index + 200;}
			
			echo '
			z-index: '.$z_index.'; 
		}';
		
		// hover
		echo '
		.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' {
				';
		
		foreach ($layer as $opt => $val) {
			echo mgom_opt_to_css($opt, $val, $layer, true);
		}

		echo '
		}
		';
		
		
		// special rule for split overlays
		if($lname == 'vert_split_layer' || $lname == 'horiz_split_layer') {
			// standard
			echo '
			.mgom_'.$ol->term_id.'_'.$lc.' div {
					';
			
			foreach ($layer as $opt => $val) {
				if($opt != 'opacity') {
					echo mgom_opt_to_css($opt, $val, $layer);
				}
			}
				echo '
			}';
			
			// hover
			echo '
			.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' div {
					';
			
			foreach ($layer as $opt => $val) {
				if($opt != 'opacity_h') {
					echo mgom_opt_to_css($opt, $val, $layer, true);
				}
			}
	
			echo '
			}
			';	
		}
		
		
		// special rule for shapes
		if($lname == 'central_shape') {
			$bg_color = isset($layer['bg_color']) ? $layer['bg_color'] : '#fefefe'; 
			$bg_color_h = isset($layer['bg_color_h']) ? $layer['bg_color_h'] : false; 
			
			echo '
			.mgom_'.$ol->term_id.'_'.$lc.' div, .mgom_'.$ol->term_id.'_'.$lc.' div:before, .mgom_'.$ol->term_id.'_'.$lc.' div:after {
				background-color: '.$bg_color.';	
				border-color: '.$bg_color.'; 
			}';
			
			if($bg_color_h) {
			echo '
			.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' div, .mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' div:before, .mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' div:after {
				background-color: '.$bg_color_h.';	
				border-color: '.$bg_color_h.';	
			}
			';
			}
		}
		
		
		// special rule for icons - if position center
		if(($lname == 'icon') && isset($layer['icon_position']) && $layer['icon_position'] == 'center') {
			$margin = ceil((int)$layer['font_size'] / 2);
			$margin_h = (isset($layer['font_size_h'])) ? ceil((int)$layer['font_size_h'] / 2) : $margin;
			
			echo '
			.mgom_'.$ol->term_id.'_'.$lc.' {
				margin-top: -'.$margin.'px;	
				margin-left: -'.$margin.'px; 
			}';
			
			if($margin_h) {
			echo '
			.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' {
				margin-top: -'.$margin_h.'px;	
				margin-left: -'.$margin_h.'px; 
			}
			';
			}
		}
		
		$lc++;	
	}

	
	
	//// textuals
	foreach($layers['txt']  as $lname => $layer) {
		
		// standard
		echo '
		.mgom_'.$ol->term_id.'_'.$lc.' { /* '.$lname.' */
				';
		
		foreach ($layer as $opt => $val) {
			echo mgom_opt_to_css($opt, $val, $layer);
		}
		
		echo '
		}';
		
		// hover
		echo '
		.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' {
				';
		
		foreach ($layer as $opt => $val) {
			echo mgom_opt_to_css($opt, $val, $layer, true);
		}
		
		echo '
		}
		';
		
		
		// animations for button
		if($lname == 'button') {
			echo '
			.mgom_'.$ol->term_id.'_'.$lc.' {
				transition: 		all '.$layers['txt']['txt_block']['animation_time'].'ms '. mgom_easing_to_css($layers['txt']['txt_block']['easing']) .' 0s;
				-webkit-transition: all '.$layers['txt']['txt_block']['animation_time'].'ms '. mgom_easing_to_css_ow($layers['txt']['txt_block']['easing']) .' 0s;
				-ms-transition: 	all '.$layers['txt']['txt_block']['animation_time'].'ms '. mgom_easing_to_css($layers['txt']['txt_block']['easing']) .' 0s;
			}
			';	
		}
		
		
		// special rules for socials block
		if($lname == 'socials') {
			echo '
			.mgom_'.$ol->term_id.'_'.$lc.' span {
				'. mgom_opt_to_css('font_size', $layer['font_size'], $layer) .'
			}
			.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' span {
				'. mgom_opt_to_css('color', $layer['color'], $layer) .'
			}
			.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' span:hover,
			.mgom_'.$ol->term_id.'_'.$lc.' span:hover {
				'. mgom_opt_to_css('color_h', $layer['color_h'], $layer, true) .'
			}';
		}
		
		
		// special rules for custom text block
		if($lname == 'custom_txt') {
		
			// standard
			echo '
			.mgom_'.$ol->term_id.'_'.$lc.' * {
					';
			
			foreach ($layer as $opt => $val) {
				echo mgom_opt_to_css($opt, $val, $layer);
			}
			
			echo '
			}';
			
			// hover
			echo '
			.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.' * {
					';
			
			foreach ($layer as $opt => $val) {
				echo mgom_opt_to_css($opt, $val, $layer, true);
			}
			
			echo '
			}
			';
			
		}
		
		$lc++;	
	}

	
	//// special rule for overlay txt wrapper
	$layer = $layers['txt']['txt_block'];

	// text layers visibility
	if(isset($layer['txt_visibility'])) {
		if($layer['txt_visibility'] == 'hide') {
			echo'
			.mg_box .mgom_'.$ol->term_id.'_'.$lc.'.mgom_txt_wrap > *:not(.mgom_txt_block) {
				opacity: 0;
				filter: alpha(opacity=0);	
			}
			.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.'.mgom_txt_wrap > *:not(.mgom_txt_block) {
				opacity: 1;
				filter: alpha(opacity=100);	
			}
			'; 	
		}
		else if($layer['txt_visibility'] == 'hide_h') {
			echo'
			.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.'.mgom_txt_wrap > * {
				opacity: 0;
				filter: alpha(opacity=0);	
			}
			'; 	
		}
		if($layer['txt_visibility'] == 'hide' || $layer['txt_visibility'] == 'hide_h') {
			echo'.mgom_'.$ol->term_id.'_'.$lc.'.mgom_txt_wrap > * {
				transition: 		opacity '.$layer['animation_time'].'ms '. mgom_easing_to_css($layer['easing']) .' 0s;
				-webkit-transition: opacity '.$layer['animation_time'].'ms '. mgom_easing_to_css_ow($layer['easing']) .' 0s;
				-ms-transition: 	opacity '.$layer['animation_time'].'ms '. mgom_easing_to_css($layer['easing']) .' 0s;
			}
			'; 			
		}
	}

	echo '
	.mgom_'.$ol->term_id.'_'.$lc.'.mgom_txt_wrap {
		'. mgom_opt_to_css('position', $layer['position'], $layer) .'	
		'. mgom_opt_to_css('easing', $layer['easing'], $layer) .'
		'. mgom_opt_to_css('txt_padding', $layer['txt_padding'], $layer) .'
	}
	
	.mg_box:hover .mgom_'.$ol->term_id.'_'.$lc.'.mgom_txt_wrap {
		'. mgom_opt_to_css('position', $layer['position'], $layer, true) .'	
	}
	';
  }
endforeach;  ?>