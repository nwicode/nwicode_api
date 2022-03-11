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
	
	$card_background_color = $component_data['component']['card_background_color'];
	$card_background_color_value = "";
	$card_border_color = $component_data['component']['card_border_color'];
	$card_border_color_value = "";

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
			if ($color->color_name==$card_background_color) $card_background_color_value = $color->color_value;
			if ($color->color_name==$card_border_color) $card_border_color_value = $color->color_value;
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
	
	$position_horizontal= "end";
	if (isset($component_data['position_horizontal'])) $position_horizontal = $component_data['position_horizontal'];
	
	$position_vertical= "top";
	if (isset($component_data['position_vertical'])) $position_vertical = $component_data['position_vertical'];
	
	$position_edge= "true";
	if (isset($component_data['position_edge'])) $position_edge = $component_data['position_edge'];
	
	$position_slot= "fixed";
	if (isset($component_data['position_slot'])) $position_slot = $component_data['position_slot'];
	if ($position_slot=="float") $position_slot==""; else $position_slot='slot="fixed"';

	$position_size= "default";
	if (isset($component_data['position_size'])) $position_size = $component_data['position_size'];

	//create buttons list
	$buttons = [
		"top"=> ["name" => "Top button list", "side"=>"top", "enabled"=>isset($component_data["buttons_top_enabled"])?$component_data["buttons_top_enabled"]:"no", "buttons"=>[]],
		"bottom"=> ["name" => "Bottom button list", "side"=>"bottom", "enabled"=>isset($component_data["buttons_bottom_enabled"])?$component_data["buttons_bottom_enabled"]:"no",  "buttons"=>[]],
		"start"=> ["name" => "Start button list", "side"=>"start", "enabled"=>isset($component_data["buttons_start_enabled"])?$component_data["buttons_start_enabled"]:"no",  "buttons"=>[]],
		"end"=> ["name" => "End button list", "side"=>"end", "enabled"=>isset($component_data["buttons_end_enabled"])?$component_data["buttons_end_enabled"]:"no",  "buttons"=>[]],
	];

	//add default values
	foreach($buttons as $key=>$button) {
		for ($i=0; $i<5;$i++) {
			$buttons[$key]['buttons'][]=[
				"icon"=>isset($component_data["buttons_{$key}_buttons_{$i}_icon"])?$component_data["buttons_{$key}_buttons_{$i}_icon"]:"add",
				"icon_color"=>isset($component_data["buttons_{$key}_buttons_{$i}_icon_color"])?$component_data["buttons_{$key}_buttons_{$i}_icon_color"]:"primary",
				"icon_color_value"=>isset($component_data["buttons_{$key}_buttons_{$i}_icon_color_value"])?$component_data["buttons_{$key}_buttons_{$i}_icon_color_value"]:"#000000",
				"color"=>isset($component_data["buttons_{$key}_buttons_{$i}_color"])?$component_data["buttons_{$key}_buttons_{$i}_color"]:"primary",
				"color_value"=>isset($component_data["buttons_{$key}_buttons_{$i}_color_value"])?$component_data["buttons_{$key}_buttons_{$i}_color_value"]:"#FFFFFF",
				"action"=>isset($component_data["buttons_{$key}_buttons_{$i}_action"])?$component_data["buttons_{$key}_buttons_{$i}_action"]:"-",
			];
		}
	}

?>
<div id="page_fab_<?php echo $component_data['page_component_id']?>" class="component_inner_wrapper <?php echo $component_data['component']['css_class']?>" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
	<ion-fab vertical="<?php echo $position_vertical?>" horizontal="<?php echo $position_horizontal?>" <?php echo $position_slot?>>
		<ion-fab-button size="<?php echo $position_size?>" style="--background: <?php echo $left_button_color_value?>;">
			<ion-icon style="color: <?php echo $left_button_icon_color_value?>" name="<?php echo $left_button_icon; ?>"></ion-icon>
		</ion-fab-button>
		<?php foreach($buttons as $key=>$button) if ($button['enabled']=="yes"){?>
			<ion-fab-list side="<?php echo $button['side']?>">
				<?php foreach($button['buttons'] as $fab) if ($fab['action']!="-") {?>
					<ion-fab-button style="--background: <?php echo $fab['color_value']?>;"><ion-icon style="color: <?php echo $fab['icon_color_value']?>;" name="<?php echo $fab['icon']?>"></ion-icon></ion-fab-button>
				<?php }?>
			</ion-fab-list>
			
		<?php }?>
	</ion-fab>
</div>
