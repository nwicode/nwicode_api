<?php 

	// Dont forget set X and Y and width and HEIGHT
	$text = "Some text ...";
	if (isset($component_data['TRANSLATIONS'])) {
		foreach($component_data['TRANSLATIONS'] as $key=>$value) {
			$text = $component_data['TRANSLATIONS'][$key]['TEXT']; break;
		}
	}

?>
<div 
style="left: <?php echo $component_data['component']['x0']?>px; top: <?php echo $component_data['component']['y0']?>px; height: <?php echo $component_data['component']['height']?>px; width: <?php echo $component_data['component']['width']?>px; " 
id="simple_text_<?php echo $component_data['page_component_id']?>" class="component-resizeble-hv component-draggable component_inner_wrapper" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
<?php echo $text ;?>
</div>