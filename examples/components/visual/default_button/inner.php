<?php 
	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use App\Models\Application;
	use App\Models\Application_Languages;

	//left button
	$font_size = 15;
	$left_button_text = "Click";

	$left_button_icon = ""; 

	$left_button_color = "--ion-color-primary";
	$left_button_color_value = "";

	$left_button_text_color = "--ion-color-light";
	$left_button_text_color_value = "";

	$left_button_icon_color = "--ion-color-light";
	$left_button_icon_color_value = "";	

	$left_button_border_radius = 0;

	$left_button_action = "-";
	$left_button_type = "solid";

	if (isset($component_data['use_left_button']) && $component_data['use_left_button']==1) $use_left_button = true;
	if (isset($component_data['font_size'])) $font_size = $component_data['font_size'];
	if (isset($component_data['left_button_color'])) $left_button_color = $component_data['left_button_color'];
	if (isset($component_data['left_button_color_value'])) $left_button_color_value = $component_data['left_button_color_value'];
	if (isset($component_data['left_button_text_color'])) $left_button_text_color = $component_data['left_button_text_color'];
	if (isset($component_data['left_button_icon'])) $left_button_icon = $component_data['left_button_icon'];
	if (isset($component_data['left_button_icon_color'])) $left_button_icon_color = $component_data['left_button_icon_color'];
	if (isset($component_data['left_button_icon_color_value'])) $left_button_icon_color_value = $component_data['left_button_icon_color_value'];
	if (isset($component_data['left_button_text_color_value'])) $left_button_text_color_value = $component_data['left_button_text_color_value'];
	if (isset($component_data['left_button_icon'])) $left_button_icon = $component_data['left_button_icon'];
	if (isset($component_data['left_button_action'])) $left_button_action = $component_data['left_button_action'];
	if (isset($component_data['left_button_type'])) $left_button_type = $component_data['left_button_type'];
	if (isset($component_data['left_button_border_radius'])) $left_button_border_radius = (int)$component_data['left_button_border_radius'];

	$lbtext = "Click";
	if (isset($component_data['TRANSLATIONS'])) {
		foreach($component_data['TRANSLATIONS'] as $key=>$value) {
			$lbtext = $component_data['TRANSLATIONS'][$key]['FOOTER_LB_TITLE']; break;
		}
	}	

	//Colors
	if (isset($component_data['colors'])) {
		foreach($component_data['colors'] as $color) {

			if ($color->color_name==$left_button_color) $left_button_color_value = $color->color_value;
			if ($color->color_name==$left_button_text_color) $left_button_text_color_value = $color->color_value;
			if ($color->color_name==$left_button_icon_color) $left_button_icon_color_value = $color->color_value;
		}
	}


	//right_button

	//get available app languages
	$languages = new Application_Languages();
	$languages->setApplication($component_data['application']);
	$aplication_translations = $languages->getLanguages();

	//assing translations
	$langs = [];
	$title_langs = [];	//for title multilang strings dialog
	$lbtitle_langs = [];	//for left button multilang strings dialog
	foreach($aplication_translations as $aplication_translation) {

		//left button
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_LB_TITLE'])) $langs[$aplication_translation->code]['FOOTER_LB_TITLE'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_LB_TITLE']; else $langs[$aplication_translation->code]['FOOTER_LB_TITLE'] =  "Click";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_LB_TITLE'])) $lbtitle_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_LB_TITLE']; else $lbtitle_langs[$aplication_translation->code] =  "Click";

	}


	// Dont forget set X and Y and width and HEIGHT
?>
<div 
style="left: <?php echo $component_data['component']['x0']?>px; top: <?php echo $component_data['component']['y0']?>px; height: <?php echo $component_data['component']['height']?>px; width: <?php echo $component_data['component']['width']?>px; " 
id="page_button_<?php echo $component_data['page_component_id']?>" class="component-resizeble component-draggable component_inner_wrapper" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
	<ion-button expand​="block" style="width: 100%; margin:0px;  --background: <?php echo $left_button_color_value?>; --border-radius: <?php echo $left_button_border_radius?>px;" fill="solid">

	<?php if ($left_button_icon!="" && $lbtext!="") {?> 
	<ion-icon style="color: <?php echo $left_button_icon_color_value?>" slot="start" name="<?php echo $left_button_icon; ?>"></ion-icon><ion-text style="color: <?php echo $left_button_text_color_value?>"><?php echo $lbtext;?></ion-text>
	<?php }else if ($left_button_icon!="" && $lbtext=="") {?> 
	<ion-icon style="color: <?php echo $left_button_icon_color_value?>" slot="icon-only" name="<?php echo $left_button_icon; ?>"></ion-icon>
	<?php }else if ($left_button_icon=="" && $lbtext=="") {?> 

	<?php }else if ($left_button_icon=="" && $lbtext!="") {?> 
		<ion-text style="color: <?php echo $left_button_text_color_value?>"><?php echo $lbtext;?></ion-text>
	<?php } ?> 
	</ion-button>
</div>