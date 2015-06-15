<?php require_once(MG_DIR . '/functions.php'); ?>
<?php require_once(MGOM_DIR . '/functions.php'); ?>

<div class="wrap lcwp_form">  
	<div class="icon32"><img src="<?php echo MG_URL.'/img/mg_icon.png'; ?>" alt="mediagrid" /><br/></div>
    <?php echo '<h2 class="lcwp_page_title" style="border: none;">Media Grid - ' . __( 'Overlay Manager', 'mgom_ml') . "</h2>"; ?>  

	<div id="ajax_mess"></div>
	
    <div id="poststuff" class="metabox-holder has-right-sidebar" style="overflow: hidden;">
    	
        <?php // SIDEBAR ?>
        <div id="side-info-column" class="inner-sidebar">
          <form class="form-wrap">	
           
           <div class="postbox lcwp_sidebox_meta">
            	<h3 class="hndle"><?php _e('Add Overlay', 'mgom_ml') ?></h3> 
				<div class="inside">
                	<input type="text" name="mgom_name" value="" id="mgom_name" maxlenght="100" style="width: 205px;" placeholder="Overlay Name" />
                    <input type="button" name="add_ol" id="add_ol" value="<?php _e('Add', 'mgom_ml') ?>" class="button-primary" style="width: 35px; margin-left: 5px;" />
                </div>
            </div>
           
            <div id="mg_ol_box" class="postbox lcwp_sidebox_meta">
            	<h3 class="hndle"><?php _e('Overlays List', 'mgom_ml') ?></h3> 
				<div class="inside"></div>
            </div>

            <div id="mgom_preview" class="postbox lcwp_sidebox_meta" style="display: none; overflow: hidden;">
            	<h3 class="hndle">
					<?php _e('Preview', 'mgom_ml') ?> 
                    <a id="mgom_txt_under_toggle" href="javascript:void(0)"><?php _e('text-under', 'mgom_ml') ?> <span>OFF</span></a>
                </h3> 
				<div class="inside" style="overflow: hidden;"></div>
                <div id="mgom_save_to_preview"><span><?php _e('save to preview the overlay', 'mgom_ml') ?></span></div>
            </div>
            
            <div id="save_ol_box" class="postbox lcwp_sidebox_meta" style="display: none; background: none; border: none; position: relative; box-shadow: none;">
            	<input type="button" name="save-overlay" value="<?php _e('Save overlay', 'mgom_ml') ?>" class="button-primary" />
                <div style="width: 30px; padding: 0 0 0 7px; float: right;"></div>
            </div>
          </form>	 
        </div>
    	
        <?php // PAGE CONTENT ?>
        
        <div id="post-body">
        <div id="post-body-content" class="mgom_builder lcwp_table">
            <p><?php _e('Select an overlay', 'mgom_ml') ?> ..</p>
        </div>
        </div>
        
        <br class="clear">
    </div>
    
</div>  

<?php // SCRIPTS ?>
<script src="<?php echo MG_URL; ?>/js/functions.js" type="text/javascript"></script>
<script src="<?php echo MG_URL; ?>/js/chosen/chosen.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo MG_URL; ?>/js/lc-switch/lc_switch.min.js" type="text/javascript"></script>
<script src="<?php echo MG_URL; ?>/js/colpick/js/colpick.min.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf8" >
jQuery(document).ready(function($) {
	
	// var for the selected grid
	var sel_ol = 0;
	var ol_pag = 1;
	var bind_change = false;
	var txt_under = 0;
	
	// initial load
	mgom_load_ols();
	
	
	// add overlay
	jQuery('#add_ol').click(function() {
		var ol_name = jQuery('#mgom_name').val();
		
		if( jQuery.trim(ol_name) != '' ) {
			var data = {
				action: 'mgom_add_ol_term',
				ol_name: ol_name,
				'lcwp_nonce': '<?php echo wp_create_nonce('lcwp_nonce') ?>'
			};
			
			jQuery.post(ajaxurl, data, function(response) {
				var resp = jQuery.trim(response); 
				
				if(resp == 'success') {
					jQuery('#ajax_mess').empty().append('<div class="updated"><p><strong><?php echo mg_sanitize_input( __('Overlay added', 'mgom_ml')) ?></strong></p></div>');	
					jQuery('#mgom_name').val('');
					
					ol_pag = 1;
					mgom_load_ols();
					mgom_hide_wp_alert();
				}
				else {
					jQuery('#ajax_mess').empty().append('<div class="error"><p>'+resp+'</p></div>');
				}
			});	
		}
	});
	
	
	// load overlays list
	function mgom_load_ols() {
		jQuery('#mg_ol_box .inside').html('<div style="height: 30px;" class="lcwp_loading"></div>');
		
		
		var data = {
			'action': 'mgom_ol_list',
			'ol_page': ol_pag,
			'lcwp_nonce': '<?php echo wp_create_nonce('lcwp_nonce') ?>'
			//,'grid_src': src_str
		};
		jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: data,
			dataType: "json",
			success: function(response){	
				jQuery('#mg_ol_box .inside').empty();
				
				// get elements
				ol_pag = response.pag;
				var tot_pag = response.tot_pag;
				var overlays = response.overlays;	

				var a = 0;
				jQuery.each(overlays, function(k, v) {	
					if(sel_ol == v.id) {var sel = 'checked="checked"';}
					else {var sel = '';}
				
					jQuery('#mg_ol_box .inside').append('<div class="misc-pub-section-last">\
						<span><input type="radio" name="gl" value="'+ v.id +'" '+ sel +' /></span>\
						<span class="mg_grid_tit" style="padding-left: 7px;" title="ID '+ v.id +'">'+ v.name +'</span>\
						<span class="mg_del_grid" id="gdel_'+ v.id +'"></span>\
					</div>');
					
					a = a + 1;
				});
				
				if(a == 0) {
					jQuery('#mg_ol_box .inside').html('<p><?php echo mg_sanitize_input( __('No existing overlays', 'mgom_ml')) ?></p>');
					jQuery('#mg_ol_box h3.hndle').html('<?php echo mg_sanitize_input( __('Overlays List', 'mgom_ml')) ?>');
				}
				else {
					// manage pagination elements
					if(tot_pag > 1) {
						jQuery('#mg_ol_box h3.hndle').html('<?php echo mg_sanitize_input( __('Overlays List', 'mgom_ml')) ?> (<?php echo mg_sanitize_input( __('pag', 'mgom_ml')) ?> '+ ol_pag +' <?php echo mg_sanitize_input( __('of', 'mgom_ml')) ?> '+ _tot_pag +')\
						<span id="mgom_next_ols">&raquo;</span><span id="mgom_prev_ols">&laquo;</span>');
					} else {
						jQuery('#mg_ol_box h3.hndle').html('<?php echo mg_sanitize_input( __('Overlays List', 'mgom_ml')) ?>');	
					}
					
					// different cases
					if(ol_pag <= 1) { jQuery('#mgom_next_ols').hide(); }
					if(ol_pag >= tot_pag) {jQuery('#mgom_next_ols').hide();}	
				}
			}
		});	
	}
	
	
	// delete overlay
	jQuery('body').delegate('.mg_del_grid', 'click', function() {
		$subj = jQuery(this).parent(); 
		var ol_id  = jQuery(this).attr('id').substr(5);
		
		if(confirm('<?php echo mg_sanitize_input( __('Delete definitively the overlay?', 'mgom_ml')) ?>')) {
			var data = {
				action: 'mgom_del_ol_term',
				ol_id: ol_id
			};
			
			jQuery.post(ajaxurl, data, function(response) {
				var resp = jQuery.trim(response); 
				
				if(resp == 'success') {
					// if is this one opened
					if(sel_ol == ol_id) {
						jQuery('.mgom_builder ').html('<p><?php echo mg_sanitize_input( __('Select an overlay', 'mgom_ml')) ?> ..</p>');
						sel_ol = 0;
						
						// savegrid box
						jQuery('#save_ol_box, #mgom_preview, #save_ol_box').fadeOut();
					}
					
					$subj.slideUp(function() {
						jQuery(this).remove();
						
						if( jQuery('#mg_ol_box .inside .misc-pub-section-last').size() == 0) {
							jQuery('#mg_ol_box .inside').html('<p><?php echo mg_sanitize_input( __('No existing overlays', 'mgom_ml')) ?></p>');
						}
					});	
				}
				else {alert(resp);}
			});
		}
	});
	
	
	// select an overlay
	jQuery('body').delegate('#mg_ol_box input[type=radio]', 'click', function() {
		sel_ol = parseInt(jQuery(this).val());
		var ol_title = jQuery(this).parent().siblings('.mg_grid_tit').text();

		// hide overlay preview
		if(jQuery('#mgom_preview').is(':visible')) {
			jQuery('#mgom_preview, #mgom_save_to_preview').hide();
			jQuery('#mgom_preview').find('.inside').empty();	
			bind_change = false;
		}

		jQuery('.mgom_builder').html('<div style="height: 30px;" class="lcwp_loading"></div>');

		var data = {
			action: 'mgom_ol_builder',
			ol_id: sel_ol 
		};
		
		jQuery.post(ajaxurl, data, function(response) {
			jQuery('.mgom_builder').html(response);
			
			mgom_set_css_selectors();
			mgom_async_form();
			mgom_sort_layers();
			mg_colpick();
			
			// reset text under toggle
			txt_under = 0;
			jQuery('#mgom_txt_under_toggle').removeClass('mgom_active');
			jQuery('#mgom_txt_under_toggle span').text('OFF');
			
			// add the title
			jQuery('.mgom_builder > h2').html(ol_title);
			
			// text block - opacity on hover label
			jQuery('.tb_txt_block .mgom_f_opacity').parents('div.mgom_field').find('label').text('<?php _e('Background opacity', 'mgom_ml') ?>');
			jQuery('.tb_txt_block .mgom_f_opacity_h').parents('div.mgom_field').find('label').text('<?php _e('Background opacity (on hover)', 'mgom_ml') ?>');
			
			// text block - button - note to support transparent
			jQuery('.tb_button .mgom_f_bg_color, .tb_button .mgom_f_bg_color_h').parents('div.mgom_field').find('label').append(' <small>(<?php _e('supports "transparent"', 'mgom_ml') ?>)</small>');
			
			// save and preview boxes
			jQuery('#save_ol_box, #mgom_preview').fadeIn();
			
			mgom_live_preview();
			
			// preview
			jQuery('#mgom_save_to_preview').hide();	

			setTimeout(function() {
				bind_change = true;
			}, 1500);
		});	
	});
	
	
	
	// add a layer
	jQuery('body').delegate('.mgom_add_layer input', 'click', function() {
		var type = jQuery(this).parent().find('select').val();
		var $subj = jQuery(this).parents('form.form-wrap').find('.mgom_elements');
		var $loader = jQuery(this).next('span');
	
		// avoid duplicates
		if( $subj.find('.tb_'+type).size() > 0 ) {
			alert('<?php echo mg_sanitize_input( __('Element already inserted', 'mgom_ml')) ?>');
			return false;	
		}
		
		// add
		$loader.html('<div style="height: 25px;" class="lcwp_loading"></div>');
		var data = {
			action: 'mgom_add_layer',
			mgom_type: type 
		};
		
		jQuery.post(ajaxurl, data, function(response) {
			$subj.prepend(response);
			
			mgom_set_css_selectors();
			mgom_async_form();
			mgom_sort_layers();
			mg_colpick();
			mgom_blur_preview();
			
			// text block - button - note to support transparent
			if( type == 'button') {
				jQuery('.tb_button .mgom_f_bg_color, .tb_button .mgom_f_bg_color_h').parents('div.mgom_field').find('label').append(' <small>(<?php _e('supports "transparent"', 'mgom_ml') ?>)</small>');
			}
			
			$loader.empty();
		});
	});
	
	
	// save overlay
	jQuery('body').delegate('#save_ol_box input', 'click', function() {
		var types = ['mgom_graphic_layers', 'mgom_txt_layers'];
		var graph_ol = {};
		var txt_ol = {};
		
		// check against empty fields
		jQuery('#post-body-content .mgom_field > input').not('.mgom_optional_f').each(function() {
			if( jQuery.trim(jQuery(this).val()) == '' ) {
				alert('<?php echo mg_sanitize_input( __('One or more mandatory fields are empty', 'mgom_ml')) ?>');
				mgom_abort_saving = true;
				return false;	
			}
        });
		if(typeof(mgom_abort_saving) != 'undefined') {return false;}
		
		// get values
		jQuery.each(types, function(k, v) {
			
			// for each block
			jQuery('#'+v).find('.mgom_type_block').each(function() {
                var type = jQuery(this).attr('rel');
				vals = jQuery(this).find('input, select, textarea').serializeArray();

				if(v == 'mgom_graphic_layers') {
					graph_ol[type] = vals;
				} else {
					txt_ol[type] = vals;
				}	
            });
		});
		
		// wrap-up
		var final_data = encodeURIComponent( JSON.stringify( {'graphic':graph_ol, 'txt':txt_ol} ));
		
		// save
		jQuery('#save_ol_box div').html('<div style="height: 30px;" class="lcwp_loading"></div>');
		var data = {
			action: 'mgom_save_ol',
			ol_id: sel_ol,
			ol_data: final_data
		};
		
		jQuery.post(ajaxurl, data, function(response) {
			var resp = jQuery.trim(response); 
			jQuery('#save_ol_box div').empty();	
			
			if(resp == 'success') {
				jQuery('#ajax_mess').empty().append('<div class="updated"><p><strong><?php echo mg_sanitize_input( __('Overlay saved', 'mgom_ml')) ?></strong></p></div>');	
				mgom_hide_wp_alert();
				mgom_live_preview();
			}
			else {
				jQuery('#ajax_mess').empty().append('<div class="error"><p>'+resp+'</p></div>');
			}
		});
	});


	// show preview
	function mgom_live_preview() {
		$subj = jQuery('#mgom_preview .inside');
		jQuery('#mgom_save_to_preview').hide();
		$subj.slideDown().html('<div style="height: 40px; width: 100%;" class="lcwp_loading"></div>');
		
		var data = {
			action: 'mgom_live_preview',
			ol_id: sel_ol,
			txt_under: txt_under
		};
		jQuery.post(ajaxurl, data, function(response) {
			$subj.html(response);
		});	
	}

	
	// text under toggle
	jQuery('body').delegate('#mgom_txt_under_toggle', 'click', function() {
		if(!txt_under) {
			jQuery('#mgom_txt_under_toggle span').text('ON');
			txt_under = 1;
		} else  {
			jQuery('#mgom_txt_under_toggle span').text('OFF');
			txt_under = 0;	
		}
		
		jQuery('#mgom_txt_under_toggle').toggleClass('mgom_active');
		mgom_live_preview();
	});
	
	
	// blur preview on fields change
	jQuery('body').delegate('.mgom_type_block select', 'change', function() {
		if( jQuery('.mgom_type_block').size() > 0 && sel_ol != 0 && bind_change) {
			mgom_blur_preview();
		}
	});
	jQuery('body').delegate('.mgom_type_block input', 'lcs-statuschange', function() {
		if( jQuery('.mgom_type_block').size() > 0 && sel_ol != 0 && bind_change) {
			mgom_blur_preview();
		}
	});
	jQuery('body').delegate('.mgom_type_block input, .mgom_type_block textarea', 'keyup', function() {
		if( jQuery('.mgom_type_block').size() > 0 && sel_ol != 0 && bind_change) {
			mgom_blur_preview();
		}
	});
	function mgom_blur_preview() {
		jQuery('#mgom_save_to_preview').fadeIn('fast');	
	}
	
	
	//////////////////////////////////////////////
	
	// calculate CSS selector
	function mgom_set_css_selectors() {
		jQuery('.mgom_type_block').each(function(k, v) {
            jQuery(this).find('.mgom_css_selector span').text('.mgom_'+ sel_ol +'_'+ k);
        });	
	}
	
	
	// sort
	function mgom_sort_layers() { 
		jQuery('.mgom_elements').sortable({
			placeholder: {
				element: function(currentItem) {
					return jQuery('<div style="border: 1px solid #73BF26; background-color: #97dd52; height: 35px; margin-bottom: 10px; opacity: 0.8;"></div>')[0];	
				},
				update: function(container, p) {
					return;
				}
			},
			tolerance: 'pointer',
			handle: '.lcwp_move_row',
			items: '.mgom_type_block:not(.tb_txt_block)',
			opacity: 0.9,
			create: function() {
				jQuery(".mgom_elements input, .mgom_elements textarea").bind('mousedown.ui-disableSelection selectstart.ui-disableSelection', function(e) {
				  e.stopImmediatePropagation();
				});
			},
			stop: function () {
				jQuery(".mgom_elements input, .mgom_elements textarea").bind('mousedown.ui-disableSelection selectstart.ui-disableSelection', function(e) {
				  e.stopImmediatePropagation();
				});
				mgom_set_css_selectors();
			},
			update: function () {
				mgom_blur_preview();
			}
		}); 
	}
	
	
	// remove  layer
	jQuery('body').delegate('.mgom_type_block .lcwp_del_row', 'click', function() {
		if(confirm('<?php echo mg_sanitize_input( __('Remove layer?', 'mgom_ml')) ?>')) {
			jQuery(this).parents('.mgom_type_block').slideUp(function() {
				jQuery(this).remove();
				mgom_set_css_selectors();
				mgom_blur_preview();
			});
		}
	});
	
	
	// collapse/expand layer options
	jQuery('body').delegate('.mgom_ec', 'click', function() {
		var $subj = jQuery(this);
		
		if(jQuery(this).hasClass('collapsed')) {
			jQuery(this).parents('.mgom_type_block').css('height', '100%').css('overflow', 'visible');
			$subj.toggleClass('collapsed');
		} 
		else {
			jQuery(this).parents('.mgom_type_block').css('overflow', 'hidden').animate({'height' : 0}, 250);	
			
			setTimeout(function() {
				$subj.toggleClass('collapsed');
			}, 250);
		}
	});
	
	
	<!-- other -->
	
	// async form elements init
	function mgom_async_form() {
		mgom_live_chosen();
		mgom_live_ip_checks();
		mg_slider_opt();
		
		jQuery('.mColorPicker').each(function() {
            if(jQuery(this).parent().find('span.mColorPickerTrigger').size() == 0) {
				jQuery(this).mColorPicker();	
			}
        });
	}
	
	// init chosen for live elements
	function mgom_live_chosen() {
		jQuery('.lcweb-chosen').each(function() {
			var w = jQuery(this).css('width');
			jQuery(this).chosen({width: w}); 
		});
		jQuery(".lcweb-chosen-deselect").chosen({allow_single_deselect:true});
	}
	
	// live lcweb switch
	function mgom_live_ip_checks() {
		jQuery('.ip-checkbox').lc_switch('YES', 'NO');
	}
	
	// hide message after 3 sec
	function mgom_hide_wp_alert() {
		setTimeout(function() {
		 jQuery('#ajax_mess').empty();
		}, 3500);	
	}
	
	// visibility fix
	//jQuery('#poststuff').css('overflow', 'visible');
	
});
</script>
