<?php 
// graphical overlay types
function mgom_graphic_types($type = false) {
	$opts = array(
		'full_img_layer' => __('Full image layer', 'mgom_ml'),
		'vert_split_layer' => __('Vertical split layers', 'mgom_ml'),
		'horiz_split_layer' => __('Horizontal split layers', 'mgom_ml'),
		'crossing_layer' => __('Crossing layer', 'mgom_ml'),
		'corner_slice' => __('Corner slice', 'mgom_ml'),
		
		/*'top_bar' => __('Top bar', 'mgom_ml'),
		'right_bar' => __('Right bar', 'mgom_ml'),
		'btm_bar' => __('Bottom bar', 'mgom_ml'),
		'left_bar' => __('Left bar', 'mgom_ml'),*/
		
		'central_shape' => __('Central shape', 'mgom_ml'),
		'corner_shape' => __('Corner shape', 'mgom_ml'),
		'icon' => __('Standalone icon', 'mgom_ml'),
		
		'img_fx' => __('Image effect', 'mgom_ml'),
	);	
	
	return ($type !== false) ? $opts[$type] : $opts;
}

// textual overlay types
function mgom_txt_types($type = false) {
	$opts = array(
		'txt_block' 	=> __("Text block <small>(not for text under images)</small>", 'mgom_ml'),
		'title' 		=> __("Item's title", 'mgom_ml'),
		'descr' 		=> __("Item's excerpt", 'mgom_ml'),
		'separator' 	=> __("Separator", 'mgom_ml'),
		'button' 		=> __("Button", 'mgom_ml'),
		'socials' 		=> __("Social buttons", 'mgom_ml'),
		'custom_txt' 	=> __("Custom content", 'mgom_ml')
	);	
	
	return ($type !== false) ? $opts[$type] : $opts;
}

// overlay types
function mgom_types($type = false) {
	$opts = array_merge(mgom_txt_types(), mgom_graphic_types());  
	
	return ($type !== false) ? $opts[$type] : $opts;
}


/////////////////////////////////////////////////////////

// central overlay shapes 
function mgom_central_shapes() {
	$opts = array(
		'circle' 			=> __('circle', 'mgom_ml'),
		'diamond' 			=> __('diamond', 'mgom_ml'),
		'exagon' 			=> __('exagon', 'mgom_ml'),
		'octagon' 			=> __('octagon', 'mgom_ml'),
		'outline_circle' 	=> __('outlined circle', 'mgom_ml'),
		'outline_diamond' 	=> __('outlined diamond', 'mgom_ml'),
	);	
	
	return $opts;	
}

// corner overlay shapes 
function mgom_corner_shapes() {
	$opts = array(
		'corner_triangle' => __('triangle', 'mgom_ml'),
		'corner_square' => __('square', 'mgom_ml'),
		'corner_circle' => __('circle', 'mgom_ml')
	);	
	
	return $opts;	
}

// positions
function mgom_positions($strip = array()) {
	$opts = array(
		'center' => __("center", 'mgom_ml'),
		'top-left' => __("top-left", 'mgom_ml'),
		'top' => __("top", 'mgom_ml'),
		'top-right' => __("top-right", 'mgom_ml'),
		'right' => __("right", 'mgom_ml'),
		'bottom-right' => __("bottom-right", 'mgom_ml'),
		'bottom' => __("bottom", 'mgom_ml'),
		'bottom-left' => __("bottom-left", 'mgom_ml'),
		'left' => __("left", 'mgom_ml'),
		'mouse_dir' => __("on mouse direction", 'mgom_ml'),
	);	
	
	if(!empty($strip)) {
		foreach($strip as $to_strip) {
			if(isset($opts[$to_strip])) {unset($opts[$to_strip]);}	
		}
	}
	
	return $opts;
}

// positions
function mgom_icon_positions() {
	$opts = array(
		'center' => __("center", 'mgom_ml'),
		'top-left' => __("top-left corner", 'mgom_ml'),
		'top-right' => __("top-right corner", 'mgom_ml'),
		'bottom-right' => __("bottom-right corner", 'mgom_ml'),
		'bottom-left' => __("bottom-left corner", 'mgom_ml')
	);	
	
	return $opts;
}

// corners
function mgom_corners() {
	$opts = array(
		'top-left' => __("top-left", 'mgom_ml'),
		'top-right' => __("top-right", 'mgom_ml'),
		'bottom-right' => __("bottom-right", 'mgom_ml'),
		'bottom-left' => __("bottom-left", 'mgom_ml')
	);	
	
	return $opts;
}


// inner icons
function mgom_inner_icons($always_icon = false) {
	$opts = array(
		'none' => __('none', 'mgom_ml'),
		'subj_icon' => __('Item type icon', 'mgom_ml'),
		'magnfier_icon' => __('Magnifier icon', 'mgom_ml'),
		'plus_icon' => __('Plus icon', 'mgom_ml'),
		'eye_icon' => __('Eye icon', 'mgom_ml')
	);
		
	if($always_icon) {unset($opts['none']);}	
	return $opts;
}


// easings
function mgom_easings() {
	$opts = array(
		'ease' => __("ease", 'mgom_ml'),
		'linear' => __("linear", 'mgom_ml'),
		'ease-in' => __("ease-in", 'mgom_ml'),
		'ease-out' => __("ease-out", 'mgom_ml'),
		'ease-in-out' => __("ease-in-out", 'mgom_ml'),
		'ease-in-back' => __("ease-in-back", 'mgom_ml'),
		'ease-out-back' => __("ease-out-back", 'mgom_ml'),
		'ease-in-out-back' => __("ease-in-out-back", 'mgom_ml')
	);	
	
	return $opts;
}

// transions
function mgom_transitions() {
	$opts = array(
		'zoom-in' => __("zoom-in", 'mgom_ml'),
		'zoom-out' => __("zoom-out", 'mgom_ml'),
		'slide-vert' => __("slide vertically", 'mgom_ml'),
		'slide-horiz' => __("slide horizontally", 'mgom_ml'),
		'flip-vert' => __("flip vertically", 'mgom_ml'),
		'flip-horiz' => __("flip horizontally", 'mgom_ml'),
		'rotate' => __("rotate", 'mgom_ml')
	);	
	
	return $opts;
}

// text layer behaviors
function mgom_txt_behaviors() {
	$opts = array(
		'none' 			=> __("(standard behavior)", 'mgom_ml'),
		'show_all' 		=> __("always visible + use contents height", 'mgom_ml'),
		'show_title'	=> __("always show title + use contents height", 'mgom_ml'),
		'show_title_fh' => __("always show title + full height", 'mgom_ml'),
		'hide_all' 		=> __("show on hover + use contents height", 'mgom_ml'),
		'sh_vert_center'=> __("slide on hover vertically centered + use contents height", 'mgom_ml'),
		'curtain'	 	=> __("curtain effect", 'mgom_ml')
	);	
	
	return $opts;
}

// text alignments
function mgom_txt_align($justify = true) {
	$opts = array(
		'left' => __("left", 'mgom_ml'),
		'center' => __("center", 'mgom_ml'),
		'right' => __("right", 'mgom_ml')
	);	
	if($justify) {
		$opts['justify'] = __("justify", 'mgom_ml');	
	}
	
	return $opts;
}

// social button styles
function mgom_social_btn_styles() {
	$opts = array(
		'minimal' => __("minimal", 'mgom_ml'),
		'rounded' => __("rounded", 'mgom_ml'),
		'squared' => __("squared", 'mgom_ml')
	);	
	
	return $opts;
}

// socials alignment
function mgom_socials_align() {
	$opts = array(
		'left'	 => __("left", 'mgom_ml'),
		'center' => __("center", 'mgom_ml'),
		'right'	 => __("right", 'mgom_ml')
	);	
	
	return $opts;
}

// border styles
function mgom_border_styles() {
	$opts = array(
		'solid' => __("solid", 'mgom_ml'),
		'dotted' => __("dotted", 'mgom_ml'),
		'dashed' => __("dashed", 'mgom_ml'),
		'double' => __("double", 'mgom_ml')
	);	
	
	return $opts;
}

/////////////////////////////////////////////////////////


// all types option - global cumulative array
function mgom_types_opt($type) {
	$opts = array(
		'cent_ol_shape' => array(
			'type' => 'select',
			'label' => __("Shape", 'mgom_ml'),
			'opts' => mgom_central_shapes()
		),
		'corn_ol_shape' => array(
			'type' => 'select',
			'label' => __("Shape", 'mgom_ml'),
			'opts' => mgom_corner_shapes()
		),
		'icon_type' => array(
			'type' => 'select',
			'label' => __("Icon type", 'mgom_ml'),
			'opts' => mgom_inner_icons(true)
		),
		
		'bg_color' => array(
			'type' => 'color',
			'label' => __("Background color", 'mgom_ml'),
			'def' => '#ffffff'
		),
		'bg_color_h' => array(
			'type' => 'color',
			'label' => __("Background color (on hover)", 'mgom_ml'),
			'def' => '#ffffff',
			'optional' => true
		),
		'color' => array(
			'type' => 'color',
			'label' => __("Color", 'mgom_ml'),
			'def' => '#222222'
		),
		'color_h' => array(
			'type' => 'color',
			'label' => __("Color (on hover)", 'mgom_ml'),
			'def' => '#383838',
			'optional' => true
		),
		'opacity' => array(
			'type' => 'slider',
			'label' => __("Opacity", 'mgom_ml'),
			'min_val' => '0',
			'max_val' => '100',
			'step' => '10',
			'value' => '%',
			'def' => '70'
		),
		'opacity_h' => array(
			'type' => 'slider',
			'label' => __("Opacity (on hover)", 'mgom_ml'),
			'min_val' => '0',
			'max_val' => '100',
			'step' => '10',
			'value' => '%',
			'def' => '100',
			'optional' => true
		),
		
		'position' => array(
			'type' => 'select',
			'label' => __("Initial position", 'mgom_ml'),
			'opts' => mgom_positions()
		),
		'position_h' => array(
			'type' => 'select',
			'label' => __("Position (on hover)", 'mgom_ml'),
			'opts' => mgom_positions()
		),
		'icon_position' => array(
			'type' => 'select',
			'label' => __("Position", 'mgom_ml'),
			'opts' => mgom_icon_positions()
		),
		'corner_pos' => array(
			'type' => 'select',
			'label' => __("Corner", 'mgom_ml'),
			'opts' => mgom_corners()
		),
		'cross_pos' => array(
			'type' => 'select',
			'label' => __("Initial position", 'mgom_ml'),
			'opts' => mgom_positions(array('center', 'top', 'left', 'right', 'bottom', 'mouse_dir'))
		),
		'slice_pos' => array(
			'type' => 'select',
			'label' => __("Position", 'mgom_ml'),
			'opts' => mgom_positions(array('center', 'top', 'left', 'right', 'bottom', 'mouse_dir'))
		),
		'inner_icon' => array(
			'type' => 'select',
			'label' => __("Icon", 'mgom_ml'),
			'opts' => mgom_inner_icons()
		),
		'over_txt_block' => array(
			'type' => 'bool',
			'label' => __("Layer over text block?", 'mgom_ml'),
		),
		
		'img_zoom' => array(
			'type' => 'slider',
			'label' => __("Image zoom (on hover)", 'mgom_ml'),
			'min_val' => '0',
			'max_val' => '40',
			'step' => '5',
			'value' => '%',
			'def' => '0'
		),
		'grayscale' => array(
			'type' => 'bool',
			'label' => __("Grayscale (by default)", 'mgom_ml'),
		),
		'img_blur' => array(
			'type' => 'bool',
			'label' => __("Image blur (on hover)", 'mgom_ml'),
		),
		'img_no_borders' => array(
			'type' => 'bool',
			'label' => __("Remove borders (on hover)", 'mgom_ml'),
		),
		
		'font_size' => array(
			'type' => 'slider',
			'label' => __("Font size", 'mgom_ml'),
			'min_val' => '8',
			'max_val' => '50',
			'step' => '1',
			'value' => 'px',
			'def' => '14'
		),
		'font_size_h' => array(
			'type' => 'slider',
			'label' => __("Font size (on hover)", 'mgom_ml'),
			'min_val' => '8',
			'max_val' => '50',
			'step' => '1',
			'value' => 'px',
			'def' => '14',
			'optional' => true
		),
		
		'animation_time' => array(
			'type' => 'slider',
			'label' => __("Animation time", 'mgom_ml'),
			'min_val' => '0',
			'max_val' => '1500',
			'step' => '100',
			'value' => '<span title="milliseconds">ms</span>',
			'def' => '400'
		),
		'easing' => array(
			'type' => 'select',
			'label' => __("Animation easing", 'mgom_ml'),
			'opts' =>  mgom_easings()
		),
		'transitions' => array(
			'type' => 'select',
			'label' => __("Transitions", 'mgom_ml'),
			'opts' =>  mgom_transitions(),
			'multiple' => true,
			'optional' => true
		),
		
		'thickness' => array(
			'type' => 'slider',
			'label' => __("Thickness", 'mgom_ml'),
			'min_val' => '1',
			'max_val' => '4',
			'step' => '1',
			'value' => 'px',
			'def' => '1'
		),
		'sep_style' => array(
			'type' => 'select',
			'label' => __("Style", 'mgom_ml'),
			'opts' => mgom_border_styles(),
		),
		
		'socials_style' => array(
			'type' => 'select',
			'label' => __("Style", 'mgom_ml'),
			'opts' => mgom_social_btn_styles()
		),
		'socials_align' => array(
			'type' => 'select',
			'label' => __("Alignment", 'mgom_ml'),
			'opts' => mgom_socials_align()
		),
		
		'txt_behaviors' => array(
			'type' => 'select',
			'label' => __("Layers behavior <small>(only for bottom position)</small>", 'mgom_ml'),
			'opts' => mgom_txt_behaviors(),
		),
		'txt_visibility' => array(
			'type' => 'select',
			'label' => __("Texts visibility", 'mgom_ml'),
			'opts' =>  array(
				'always' 	=> __("always visible", 'mgom_ml'), 
				'hide' 		=> __("hidden by default", 'mgom_ml'), 
				'hide_h' 	=> __("hidden on hover", 'mgom_ml')
			),
		),
		'txt_vert_center' => array(
			'type' => 'bool',
			'label' => __("Text vertically centered?", 'mgom_ml'),
		),
		'txt_vert_center' => array(
			'type' => 'bool',
			'label' => __("Text vertically centered?", 'mgom_ml'),
		),
		'txt_padding' => array(
			'type' => 'padding_arr',
			'label' => __("Padding <small>(top right bottom left)</small>", 'mgom_ml'),
			'value' => 'px',
			'optional' => true
		),
		'txt_vert_margin' => array(
			'type' => 'vert_margin_arr',
			'label' => __("Vertical margins <small>(top bottom)</small>", 'mgom_ml'),
			'value' => 'px',
			'optional' => true
		),
		'txt_align' => array(
			'type' => 'select',
			'label' => __("Text alignment", 'mgom_ml'),
			'opts' => mgom_txt_align(),
		), 
		'line_height' => array(
			'type' => 'slider',
			'label' => __("Line-height", 'mgom_ml'),
			'min_val' => '10',
			'max_val' => '40',
			'step' => '1',
			'value' => 'px',
			'def' => '19'
		),
		'txt_styles' => array(
			'type' => 'select',
			'label' => __("Text styles", 'mgom_ml'),
			'opts' =>  array('bold' => __("bold", 'mgom_ml'), 'italic' => __("italic", 'mgom_ml'), 'uppercase' => __("uppercase", 'mgom_ml')),
			'multiple' => true,
			'optional' => true
		),
		'font_family' => array(
			'type' => 'text',
			'label' => __("Font family", 'mgom_ml'),
			'optional' => true
		),
		'btn_txt' => array(
			'type' => 'text',
			'label' => __("Text", 'mgom_ml')
		),
		'btn_full_width' => array(
			'type' => 'bool',
			'label' => __("Full width?", 'mgom_ml')
		),
		'btn_align' => array(
			'type' => 'select',
			'label' => __("Alignment", 'mgom_ml'),
			'opts' => mgom_txt_align(false),
		),
		'border_radius' => array(
			'type' => 'slider',
			'label' => __("Border radius", 'mgom_ml'),
			'min_val' => '0',
			'max_val' => '50',
			'step' => '1',
			'value' => 'px',
			'def' => '2'
		),
		'border_width' => array(
			'type' => 'slider',
			'label' => __("Border width", 'mgom_ml'),
			'min_val' => '0',
			'max_val' => '10',
			'step' => '1',
			'value' => 'px',
			'def' => '1'
		),
		'border_style' => array(
			'type' => 'select',
			'label' => __("Border Style", 'mgom_ml'),
			'opts' => mgom_border_styles(),
		),
		'border_color' => array(
			'type' => 'color',
			'label' => __("Border color", 'mgom_ml'),
			'def' => '#444444'
		),
		'border_color_h' => array(
			'type' => 'color',
			'label' => __("Border color (on hover)", 'mgom_ml'),
			'def' => '#666666',
			'optional' => true
		),
		'cust_txt' => array(
			'type' => 'textarea',
			'label' => __("Custom text", 'mgom_ml')
		),
		'full_img_padding' => array(
			'type' => 'slider',
			'label' => __("Padding", 'mgom_ml'),
			'min_val' => '0',
			'max_val' => '50',
			'step' => '1',
			'value' => 'px',
			'def' => '0'
		),
	);
	
	return $opts[$type];	
}


// fields for each type
function mgom_type_fields($type) {
	$opts = array(
		'full_img_layer' 	=> array('position', 'bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'full_img_padding', 'transitions', 'animation_time', 'easing'),
		'vert_split_layer' 	=> array('bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'animation_time', 'easing'),
		'horiz_split_layer' => array('bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'animation_time', 'easing'),
		'crossing_layer'	=> array('cross_pos', 'bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'over_txt_block', 'animation_time', 'easing'),
		'corner_slice'		=> array('slice_pos', 'bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'over_txt_block', 'animation_time', 'easing'),
		
		/*'top_bar' 	=> array('bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'over_txt_block', 'transitions', 'animation_time', 'easing'),
		'right_bar' => array('bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'over_txt_block', 'transitions', 'animation_time', 'easing'),
		'btm_bar' 	=> array('bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'over_txt_block', 'transitions', 'animation_time', 'easing'),
		'left_bar' 	=> array('bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'over_txt_block', 'transitions', 'animation_time', 'easing'),*/
		
		'central_shape' => array('cent_ol_shape', 'position','bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'inner_icon', 'color', 'over_txt_block', 'transitions', 'animation_time', 'easing'),
		'corner_shape' => array('corn_ol_shape', 'corner_pos', 'bg_color', 'opacity', 'opacity_h', 'inner_icon', 'color', 'over_txt_block', 'animation_time', 'easing'),
		'icon' => array('icon_type', 'icon_position', 'font_size', 'font_size_h', 'color', 'color_h', 'opacity', 'opacity_h', 'over_txt_block', 'transitions', 'animation_time', 'easing'),

		'img_fx' => array('img_zoom', 'grayscale', 'img_blur', 'img_no_borders', 'animation_time'),
		
		'title' 		=> array('txt_align', 'font_size', 'color', 'color_h', 'line_height', 'txt_styles', 'txt_vert_margin', 'font_family'),
		'descr' 		=> array('txt_align', 'font_size', 'color', 'color_h', 'line_height', 'txt_styles', 'txt_vert_margin', 'font_family'),
		'separator' 	=> array('color', 'thickness', 'sep_style', 'txt_vert_margin'),
		'button' 		=> array('btn_txt', 'font_size', 'line_height', 'btn_full_width', 'btn_align', 'txt_styles', 'font_family', 'txt_padding', 'border_width', 'border_style', 'border_color', 'border_color_h', 'border_radius', 'bg_color', 'bg_color_h', 'color', 'color_h', 'txt_vert_margin'),
		'socials' 		=> array('socials_style', 'socials_align', 'color', 'color_h', 'font_size', 'line_height', 'txt_vert_margin'),
		'custom_txt' 	=> array('cust_txt', 'txt_align', 'font_size', 'color', 'color_h', 'opacity', 'opacity_h', 'line_height', 'txt_styles', 'txt_vert_margin', 'font_family'),
		'txt_block'		=> array('position', 'txt_behaviors', 'txt_visibility', 'txt_vert_center', 'bg_color', 'bg_color_h', 'opacity', 'opacity_h', 'txt_padding', 'transitions', 'animation_time', 'easing'),
	);	
	
	return $opts[$type];	
}


// fields builder
function mgom_fields_builder($field, $value = '') {
	$data = mgom_types_opt($field);
	$pre_code = ($data['type'] == 'textarea') ? '<div class="mgom_full_field">' : '<div class="mgom_field">';
	$pre_code .= '<label>'.$data['label'].'</label>';
	
	$def_val = (isset($data['def'])) ? $data['def'] : '';
	if((empty($value) && $value !== '0') && isset($def_val)) {$value = $def_val;}
	
	$optional = (isset($data['optional'])) ? 'mgom_optional_f' : '';
	
	switch($data['type']) {

		case 'color':
			$code = '
			<div class="lcwp_colpick">
				<span class="lcwp_colblock" style="background-color: '.$value.';"></span>
				<input type="text" name="'.$field.'" value="'.$value.'" class="mgom_f_'.$field.' '.$optional.'" />
			</div>';
			break;
			
		case 'slider':
			$code = '
			<div class="lcwp_slider" step="'.$data['step'].'" max="'.$data['max_val'].'" min="'.$data['min_val'].'"></div>
			<input type="text" value="'.$value.'" name="'.$field.'" class="lcwp_slider_input mgom_f_'.$field.' '.$optional.'" />
			<span>'.$data['value'].'</span>';
			break;
		
		case 'select':
			if(isset($data['multiple'])) { 
				$multiple = 'multiple="multiple"';
				$mfn = '[]';
			} else {
				$multiple = '';
				$mfn = '';
			}
			
			$options = '';
			foreach($data['opts'] as $k => $v) {
				if(is_array($value)) {
					$sel = (in_array($k, $value)) ? 'selected="selected"' : ''; 
				} else {
					$sel = ($value == $k) ? 'selected="selected"' : '';	
				}
				
				$options .= '<option value="'.$k.'" '.$sel.'>'.$v.'</option>';
			}
			
			$code = '
			<select name="'.$field.$mfn.'" class="lcweb-chosen mgom_f_'.$field.' '.$optional.'" '.$multiple.' data-placeholder="" tabindex="2">
				'.$options.'
			</select> ';
			break;
			
		case 'bool':
			$sel = ($value == 1) ? 'checked="checked"' : '';
			$code = '<input type="checkbox" value="1" name="'.$field.'" class="ip-checkbox mgom_f_'.$field.'" '.$sel.' />';
			break;	
		
		case 'textarea':
			$code = '<textarea name="'.$field.'" class="mgom_f_'.$field.' '.$optional.'">'.$value.'</textarea>';
			break;	
			
		case 'padding_arr':
			if(!is_array($value)) {$value = array('','','','');}
			
			$code = '
			<input type="text" value="'.$value[0].'" name="'.$field.'[]" class="lcwp_slider_input mgom_f_'.$field.' '.$optional.'" maxlength="2" />
			<input type="text" value="'.$value[1].'" name="'.$field.'[]" class="lcwp_slider_input mgom_f_'.$field.' '.$optional.'" maxlength="2" />
			<input type="text" value="'.$value[2].'" name="'.$field.'[]" class="lcwp_slider_input mgom_f_'.$field.' '.$optional.'" maxlength="2" />
			<input type="text" value="'.$value[3].'" name="'.$field.'[]" class="lcwp_slider_input mgom_f_'.$field.' '.$optional.'" maxlength="2" />
			<span>'.$data['value'].'</span>';
			break;
			
		case 'vert_margin_arr':
			if(!is_array($value)) {$value = array('','');}
			
			$code = '
			<input type="text" value="'.$value[0].'" name="'.$field.'[]" class="lcwp_slider_input mgom_f_'.$field.' '.$optional.'" maxlength="2" />
			<input type="text" value="'.$value[1].'" name="'.$field.'[]" class="lcwp_slider_input mgom_f_'.$field.' '.$optional.'" maxlength="2" />
			<span>'.$data['value'].'</span>';
			break;	

		default : // text
			$code = '<input type="text" name="'.$field.'" class="mgom_f_'.$field.' '.$optional.'" value="'.$value.'" />';
			break;
	}
	
	return $pre_code . $code . '</div>';
}


// type block builder
function mgom_type_block($type, $values = false) {
	$name = mgom_types($type);
	$fields = mgom_type_fields($type);
	
	$commands = ($type == 'txt_block') ? '' : '<span class="lcwp_move_row"></span><span class="lcwp_del_row"></span>';
	
	$code = '
	<div class="mgom_type_block tb_'.$type.'" rel="'.$type.'">
	<h4>
		'. $name .' 
		<div class="mgom_css_selector">  |  '. __('CSS selector', 'mgom_ml') .' <span></span></div>
		<div class="mgom_cmd">
			<small class="mgom_ec">(<em class="collapse">'. __('collapse', 'mgom_ml') .'</em><em class="expand" style="display: none;">'. __('expand', 'mgom_ml') .'</em>)</small>
			'.$commands.'
		</div>
	</h4>';

	foreach($fields as $field) {
		$val = (isset($values[$field])) ? $values[$field] : ''; 
		$code .= mgom_fields_builder($field, $val);
	}
	
	return $code . '<div class="mgom_btm_border_fix"></div></div>';
}


// overlay saved data to blocks
function mgom_saved_to_blocks($layers) {
	if(!is_array($layers)) {return '';}
	if(isset($layers['txt_block'])) {unset($layers['txt_block']);}
	
	$code = '';
	foreach($layers as $type => $values) {
		if($type != 'txt_block') {
			$code .= mgom_type_block($type, $values);
		}
	}
	
	return $code;
}


// JS ajax array to PHP proper array
function mgom_js_ajax_sanitize($data) {
	require_once(MG_DIR . '/functions.php');
	
	// base
	$init_arr = array(
		"graphic" => $data->graphic,
		"txt" => $data->txt,
	);
	
	$final_arr = array(
		"graphic" => array(),
		"txt" => array(),
	);
	
	foreach($init_arr as $subj => $values) {
		foreach($values as $type => $vals) {
			foreach($vals as $val) {

				if(strpos($val->name, '[]') === false) {
					$index = $val->name;
					$val = mg_sanitize_input($val->value);
				}
				else {
					$index = str_replace('[]', '', $val->name);
					$val = array( mg_sanitize_input($val->value) );
				}
				
				if(isset($final_arr[$subj][$type][$index])) {
					$final_arr[$subj][$type][$index][] = $val[0];
				} else {
					$final_arr[$subj][$type][$index] = $val;	
				}
			}
		}
	}
	
	
	return $final_arr;	
}


// recalculate serialized elements length - fix for DB get issues 
function mgom_fix_serialization($string) {
	//return preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $string); // global chars recalculation
	return str_replace('&amp;', '&', $string);	
}

////////////////////////////////////////////////////////////////////////////




// litteral easing to CSS code
function mgom_easing_to_css($easing) {
	switch($easing) {
		case 'ease' : $code = 'ease'; break;
		case 'linear' : $code = 'linear'; break;
		case 'ease-in' : $code = 'ease-in'; break;
		case 'ease-out' : $code = 'ease-out'; break;
		case 'ease-in-out' : $code = 'ease-in-out'; break;
		case 'ease-in-back' : $code = 'cubic-bezier(0.600, -0.280, 0.735, 0.045)'; break;
		case 'ease-out-back' : $code = 'cubic-bezier(0.175, 0.885, 0.320, 1.275)'; break;
		case 'ease-in-out-back' : $code = 'cubic-bezier(0.680, -0.550, 0.265, 1.550)'; break;
	}
	
	return $code;
}

// litteral easing to CSS code - old webkit (safari on Win)
function mgom_easing_to_css_ow($easing) {
	switch($easing) {
		case 'ease' : $code = 'ease'; break;
		case 'linear' : $code = 'linear'; break;
		case 'ease-in' : $code = 'ease-in'; break;
		case 'ease-out' : $code = 'ease-out'; break;
		case 'ease-in-out' : $code = 'ease-in-out'; break;
		case 'ease-in-back' : $code = 'cubic-bezier(0.600, 0, 0.735, 0.045)'; break;
		case 'ease-out-back' : $code = 'cubic-bezier(0.175, 0.885, 0.320, 1)'; break;
		case 'ease-in-out-back' : $code = 'cubic-bezier(0.680, 0, 0.265, 1)'; break;
	}
	
	return $code;
}


// transitions css rules
function mgom_transitions_css($val, $on_hover = false) {
	if(!is_array($val) || count($val) == 0) {return '';}
	$bc = array();
	
	if(!$on_hover) {
		if(in_array('zoom-in', $val)) {$bc[] = 'scale(0.5)';}
		if(in_array('zoom-out', $val)) {$bc[] = 'scale(1.5)';}
		if(in_array('slide-vert', $val)) {$bc[] = 'rotateY(270deg)';}
		if(in_array('slide-horiz', $val)) {$bc[] = 'rotateX(270deg)';}
		if(in_array('flip-vert', $val)) {$bc[] = 'rotateY(0deg)';}
		if(in_array('flip-horiz', $val)) {$bc[] = 'rotateX(0deg)';}
		if(in_array('rotate', $val)) {$bc[] = 'rotate(0deg)';}
	} 
	else {
		if(in_array('zoom-in', $val)) {$bc[] = 'scale(1.0)';}
		if(in_array('zoom-out', $val)) {$bc[] = 'scale(1.0)';}
		if(in_array('slide-vert', $val)) {$bc[] = 'rotateY(360deg)';}
		if(in_array('slide-horiz', $val)) {$bc[] = 'rotateX(360deg)';}
		if(in_array('flip-vert', $val)) {$bc[] = 'rotateY(360deg)';}
		if(in_array('flip-horiz', $val)) {$bc[] = 'rotateX(360deg)';}
		if(in_array('rotate', $val)) {$bc[] = 'rotate(360deg)';}
	}

	$subj = array('transform:', '-ms-transform:', '-webkit-transform:');
	$final_code = '';
	
	foreach($subj as $rule) {
		$final_code .= $rule.' '.implode(' ', $bc).'; ';
	}
	
	return $final_code;
}


// dynamic css builder - layer opts to css rules
function mgom_opt_to_css($opt, $val, $all_vals, $on_hover = false) {
	if(!empty($val) || $val === '0') {
		
		// default state rules
		if(!$on_hover) {
			$rule = '';
			
			switch($opt) {
				case 'bg_color' : $rule = '
					background-color: '.$val.';'; break;
					
				case 'color' : $rule = '
					color: '.$val.';'; break;
						
				case 'opacity' 	: 
					$rule = 'opacity: '.($val / 100).'; filter: alpha(opacity='.$val.');
					'; break;
					
				case 'position' :
					if($val == 'top') 				{$rule = 'top: -100%; left: 0px;';}
					elseif($val == 'top-right') 	{$rule = 'top: -100%; right: -100%;';}
					elseif($val == 'right') 		{$rule = 'top: 0px; right: -100%;';}
					elseif($val == 'bottom-right') 	{$rule = 'bottom: -100%; right: -100%;';}
					elseif($val == 'bottom') 		{$rule = 'bottom: -100%; left: 0px;';}
					elseif($val == 'bottom-left') 	{$rule = 'bottom: -100%; left: -100%;';}
					elseif($val == 'left') 			{$rule = 'top: 0px; left: -100%;';}
					elseif($val == 'top-left') 		{$rule = 'top: -100%; left: -100%;';}
					elseif($val == 'center') 		{$rule = 'top: 0px; left: 0px;';}
					break;
					
				case 'icon_position' :
					if($val == 'top-right') 		{$rule = 'top: 15px; right: 15px;';}
					elseif($val == 'bottom-right') 	{$rule = 'bottom: 15px; right: 15px;';}
					elseif($val == 'bottom-left') 	{$rule = 'bottom: 15px; left: 15px;';}
					elseif($val == 'top-left') 		{$rule = 'top: 15px; left: 15px;';}
					elseif($val == 'center') 		{$rule = 'top: 50%; left: 50%;';}
					break;
					
				case 'corner_pos' : 
					if($val == 'top-right') 		{$rule = 'top: -150px; right: -150px;';}
					elseif($val == 'bottom-right') 	{$rule = 'bottom: -150px; right: -150px;';}
					elseif($val == 'bottom-left') 	{$rule = 'bottom: -150px; left: -150px;';}
					elseif($val == 'top-left') 		{$rule = 'top: -150px; left: -150px;';}
					break;	
					
				case 'font_size' : $rule = 'font-size: '.$val.'px;
					'; break;

				case 'easing' :  // all the transition block
					$duration = (isset($all_vals['animation_time'])) ? (int)$all_vals['animation_time'] : '350'; 

					$rule = '
					transition: all '.$duration.'ms '. mgom_easing_to_css($val) .' 0s;
					-webkit-transition: all '.$duration.'ms '. mgom_easing_to_css_ow($val) .' 0s; /* older webkit */
					-ms-transition: all '.$duration.'ms '. mgom_easing_to_css($val) .' 0s;
					';
					break;		
				
				case 'transitions' : $rule = mgom_transitions_css($val, false);
					break;
						
				case 'txt_align' : $rule = 'text-align: '.$val.';
					'; break;	
				
				case 'line_height' : $rule = 'line-height: '.$val.'px;
					'; break;
					
				case 'txt_styles' : 
					if(in_array('bold', $val)) {$rule .= 'font-weight: bold;';}
					if(in_array('italic', $val)) {$rule .= 'font-style: italic;';}
					if(in_array('uppercase', $val)) {$rule .= 'text-transform: uppercase;';}
					break;			
					
				case 'font_family' : $rule = 'font-family: '. str_replace(array('&apos;', '?'), array('\'', ''), utf8_decode ($val)) .';
					'; break;	
					
				case 'sep_style': // separator/border full style
					$size = (isset($all_vals['thickness'])) ? $all_vals['thickness'] : 1; 
					$color = (isset($all_vals['color'])) ? $all_vals['color'] : '#333333'; 

					$rule = '
					border-bottom: '.$size.'px '.$val.' '.$color.';
					';
					break;
				
				case 'border_width' : // button - full border code
					if($val) {
						$style = (isset($all_vals['border_style'])) ? $all_vals['border_style'] : 'solid'; 
						$color = (isset($all_vals['border_color'])) ? $all_vals['border_color'] : '#444'; 
						
						$rule = '
						border: '.$val.'px '.$style.' '.$color.';
						';
					}
					break;
				
				case 'border_radius' : $rule = 'border-radius: '. $val .'px;
					'; break;	
					
				case 'btn_full_width' : 
					if($val) {$rule = 'display: block;
					';
					}
					break;	
				
				case 'btn_align' : 
					if(!isset($all_vals['btn_full_width']) || !$all_vals['btn_full_width']) {
						if($val == 'right') {$rule = 'float: right; clear: both;
						';
						}
						else if($val == 'center') {$rule = 'display: table; margin: auto;
						';
						}
					}
					break;	
					
				case 'txt_padding': // txt wrap custom padding
					if(!is_array($val)) {$rule = ''; break;}
					$rule = '';
					
					if(!empty($val[0])) {$rule .= 'padding-top: '.$val[0].'px; ';}
					if(!empty($val[1])) {$rule .= 'padding-right: '.$val[1].'px; ';}
					if(!empty($val[2])) {$rule .= 'padding-bottom: '.$val[2].'px; ';}
					if(!empty($val[3])) {$rule .= 'padding-left: '.$val[3].'px; ';}
					break;
					
				case 'txt_vert_margin': // txt elements custom margin
					if(!is_array($val)) {$rule = ''; break;}
					$rule = '';
					
					if(!empty($val[0])) {$rule .= 'margin-top: '.$val[0].'px !important; ';}
					if(!empty($val[1])) {$rule .= 'margin-bottom: '.$val[1].'px !important; ';}
					break;	
					
				case 'full_img_padding'	: // full image layer - simulated padding
					if(!$val) {$rule = ''; break;}
					
					
					$rule = '
					padding: '.$val.'px;
					background-clip: content-box;
					';
					break;	
			}
		}
		
		// hover state rules
		else {
			$rule = '';
			
			switch($opt) {
				case 'bg_color_h' : $rule = '
					background-color: '.$val.';'; break;
					
				case 'color_h' 	: $rule = '
					color: '.$val.';'; break;
				
				case 'border_color_h' 	: $rule = '
					border-color: '.$val.';'; break;
					
				case 'opacity_h' 	: 
					$rule = 'opacity: '.($val / 100).'; filter: alpha(opacity='.$val.');
					'; break;
				
				case 'position' :
					if($val == 'top') 				{$rule = 'top: 0px;';}
					elseif($val == 'top-right') 	{$rule = 'top: 0px; right: 0px;';}
					elseif($val == 'right') 		{$rule = 'top: 0px; right: 0px;';}
					elseif($val == 'bottom-right') 	{$rule = 'bottom: 0px; right: 0px;';}
					elseif($val == 'bottom') 		{$rule = 'bottom: 0px; left: 0px;';}
					elseif($val == 'bottom-left') 	{$rule = 'bottom: 0px; left: 0px;';}
					elseif($val == 'left') 			{$rule = 'top: 0px; left: 0px;';}
					elseif($val == 'top-left') 		{$rule = 'top: 0px; left: 0px;';}
					elseif($val == 'center') 		{$rule = 'top: 0px; left: 0px;';}
					break;
				
				case 'corner_pos' 	: 
					if($val == 'top-right') 		{$rule = 'top: -80px; right: -80px;';}
					elseif($val == 'bottom-right') 	{$rule = 'bottom: -80px; right: -80px;';}
					elseif($val == 'bottom-left') 	{$rule = 'bottom: -80px; left: -80px;';}
					elseif($val == 'top-left') 	{$rule = 'top: -80px; left: -80px;';}
					break;
					
					
				case 'font_size_h' : $rule = 'font-size: '.$val.'px;
					'; break;
				
				case 'transitions' : $rule = mgom_transitions_css($val, true);
					break;
			}	
		}

		return $rule;
	} 
	else {return '';}
}


// create dynamic css file for all the overlays
function mgom_create_ol_css() {	
	ob_start();
	require_once(MGOM_DIR.'/frontend_css.php');
	
	$css = ob_get_clean();
	if(trim($css) != '') {
		if(!@file_put_contents(MGOM_DIR.'/css/overlays.css', $css, LOCK_EX)) {$error = true;}
	}
	else {
		if(file_exists(MGOM_DIR.'/css/'.$ol_id.'.css'))	{ unlink(MGOM_DIR.'/css/overlays.css'); }
	}
	
	if(isset($error)) {return false;}
	else {return true;}
}
