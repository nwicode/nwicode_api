<?php 

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use App\Models\Application;
	use App\Models\Application_Languages;

	//defaule values
	$font_size = 15;
	$text_align = "center";
	$background_color = "--ion-color-primary";
	$text_color = "--ion-color-light";
	$no_border = false;
	
	//redefine 
	if (isset($component_data['font_size'])) $font_size = $component_data['font_size'];
	if (isset($component_data['text_align'])) $text_align = $component_data['text_align'];
	if (isset($component_data['background_color'])) $background_color = $component_data['background_color'];
	if (isset($component_data['text_color'])) $text_color = $component_data['text_color'];

	//set colors value
	$background_color_value = "";
	$text_color_value = "";
	
	if (isset($component_data) &&  is_array($component_data)) {
		foreach($component_data['colors'] as $color) {
			if ($color->color_name==$background_color) $background_color_value = $color->color_value;
			if ($color->color_name==$text_color) $text_color_value = $color->color_value;
		}
	}
	
	$text = "Title";
	if (isset($component_data['TRANSLATIONS'])) {
		foreach($component_data['TRANSLATIONS'] as $key=>$value) {
			//$text = $component_data['TRANSLATIONS'][$key]['FOOTER_TITLE']; break;
		}
	}
	//print_r($component_data);
	if (isset($component_data)) {
		foreach($component_data as $key=>$value) {
			if (preg_match("/languages_(.+?)_/",$key)) {$text = $value; break;}
		}
	}

	//left button
	$use_left_button = false;
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
	if (isset($component_data['left_button_color'])) $left_button_color = $component_data['left_button_color'];
	if (isset($component_data['left_button_text_color'])) $left_button_text_color = $component_data['left_button_text_color'];
	if (isset($component_data['left_button_icon'])) $left_button_icon = $component_data['left_button_icon'];
	if (isset($component_data['left_button_icon_color'])) $left_button_icon_color = $component_data['left_button_icon_color'];
	if (isset($component_data['left_button_icon'])) $left_button_icon = $component_data['left_button_icon'];
	if (isset($component_data['left_button_action'])) $left_button_action = $component_data['left_button_action'];
	if (isset($component_data['left_button_type'])) $left_button_type = $component_data['left_button_type'];
	if (isset($component_data['left_button_border_radius'])) $left_button_border_radius = (int)$component_data['left_button_border_radius'];

	$lbtext = "";
	if (isset($component_data['TRANSLATIONS'])) {
		foreach($component_data['TRANSLATIONS'] as $key=>$value) {
			//$lbtext = $component_data['TRANSLATIONS'][$key]['FOOTER_LB_TITLE']; break;
		}
	}	

	
	//left button
	$use_right_button = false;
	$right_button_text = "Click";

	$right_button_icon = ""; 

	$right_button_color = "--ion-color-primary";
	$right_button_color_value = "";

	$right_button_text_color = "--ion-color-light";
	$right_button_text_color_value = "";

	$right_button_icon_color = "--ion-color-light";
	$right_button_icon_color_value = "";	

	$right_button_border_radius = 0;

	$right_button_action = "-";
	$right_button_type = "solid";

	if (isset($component_data['use_right_button']) && $component_data['use_right_button']==1) $use_right_button = true;
	if (isset($component_data['right_button_color'])) $right_button_color = $component_data['right_button_color'];
	if (isset($component_data['right_button_text_color'])) $right_button_text_color = $component_data['right_button_text_color'];
	if (isset($component_data['right_button_icon'])) $right_button_icon = $component_data['right_button_icon'];
	if (isset($component_data['right_button_icon_color'])) $right_button_icon_color = $component_data['right_button_icon_color'];
	if (isset($component_data['right_button_icon'])) $right_button_icon = $component_data['right_button_icon'];
	if (isset($component_data['right_button_action'])) $right_button_action = $component_data['right_button_action'];
	if (isset($component_data['right_button_type'])) $right_button_type = $component_data['right_button_type'];
	if (isset($component_data['right_button_border_radius'])) $right_button_border_radius = (int)$component_data['right_button_border_radius'];

	$rbtext = "";
	if (isset($component_data['TRANSLATIONS'])) {
		foreach($component_data['TRANSLATIONS'] as $key=>$value) {
			//$rbtext = $component_data['TRANSLATIONS'][$key]['FOOTER_RB_TITLE']; break;
		}
	}

	//Colors
	if (isset($component_data['colors'])) {
		foreach($component_data['colors'] as $color) {

			if ($color->color_name==$left_button_color) $left_button_color_value = $color->color_value;
			if ($color->color_name==$left_button_text_color) $left_button_text_color_value = $color->color_value;
			if ($color->color_name==$left_button_icon_color) $left_button_icon_color_value = $color->color_value;
			
			if ($color->color_name==$right_button_color) $right_button_color_value = $color->color_value;
			if ($color->color_name==$right_button_text_color) $right_button_text_color_value = $color->color_value;
			if ($color->color_name==$right_button_icon_color) $right_button_icon_color_value = $color->color_value;
		}
	}


	//right_button

	//get available app languages
	$languages = new Application_Languages();
	$languages->setApplication($component_data['application']);
	$aplication_translations = $languages->getLanguages();



	//redefine 
	if (isset($component_data['font_size'])) $font_size = $component_data['font_size'];
	if (isset($component_data['text_align'])) $text_align = $component_data['text_align'];
	if (isset($component_data['background_color'])) $background_color = $component_data['background_color'];
	if (isset($component_data['text_color'])) $text_color = $component_data['text_color'];
	if (isset($component_data['no_border'])) $no_border = $component_data['no_border'];

	//set colors value
	$background_color_value = "";
	$text_color_value = "";

	if (isset($component_data['colors'])) {
		foreach($component_data['colors'] as $color) {
			if ($color->color_name==$background_color) $background_color_value = $color->color_value;
			if ($color->color_name==$text_color) $text_color_value = $color->color_value;
		}
	}


	//assing translations
	$langs = [];
	$title_langs = [];	//for title multilang strings dialog
	foreach($aplication_translations as $aplication_translation) {

		//title
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_0_TEXT'])) $langs[$aplication_translation->code]['BUTTON_0_TEXT'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_0_TEXT']; else $langs[$aplication_translation->code]['BUTTON_0_TEXT'] =  "Title";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_0_TEXT'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_0_TEXT']; else $title_langs[$aplication_translation->code] =  "Title";
		//title
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_1_TEXT'])) $langs[$aplication_translation->code]['BUTTON_1_TEXT'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_1_TEXT']; else $langs[$aplication_translation->code]['BUTTON_1_TEXT'] =  "Title";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_1_TEXT'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_1_TEXT']; else $title_langs[$aplication_translation->code] =  "Title";
		//title
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_2_TEXT'])) $langs[$aplication_translation->code]['BUTTON_2_TEXT'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_2_TEXT']; else $langs[$aplication_translation->code]['BUTTON_2_TEXT'] =  "Title";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_2_TEXT'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_2_TEXT']; else $title_langs[$aplication_translation->code] =  "Title";
		//title
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_3_TEXT'])) $langs[$aplication_translation->code]['BUTTON_3_TEXT'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_3_TEXT']; else $langs[$aplication_translation->code]['BUTTON_3_TEXT'] =  "Title";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_3_TEXT'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_3_TEXT']; else $title_langs[$aplication_translation->code] =  "Title";
		//title
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_4_TEXT'])) $langs[$aplication_translation->code]['BUTTON_4_TEXT'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_4_TEXT']; else $langs[$aplication_translation->code]['BUTTON_4_TEXT'] =  "Title";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_4_TEXT'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_4_TEXT']; else $title_langs[$aplication_translation->code] =  "Title";
		
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_5_TEXT'])) $langs[$aplication_translation->code]['BUTTON_5_TEXT'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_5_TEXT']; else $langs[$aplication_translation->code]['BUTTON_5_TEXT'] =  "Title";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_5_TEXT'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['BUTTON_5_TEXT']; else $title_langs[$aplication_translation->code] =  "Title";
	}




	//create tabs array
	$buttons = [];
	for($tab_no=0;$tab_no<6;$tab_no++) {
		$tab = [
			"enabled"=>isset($component_data["buttons_{$tab_no}_enabled"])?$component_data["buttons_{$tab_no}_enabled"]:"yes",
			"use_text"=>isset($component_data["buttons_{$tab_no}_use_text"])?$component_data["buttons_{$tab_no}_use_text"]:"yes",
			"font_size"=>isset($component_data["buttons_{$tab_no}_font_size"])?$component_data["buttons_{$tab_no}_font_size"]:"12",
			"font_bold"=>isset($component_data["buttons_{$tab_no}_font_bold"])?$component_data["buttons_{$tab_no}_font_bold"]:"no",
			"use_image"=>isset($component_data["buttons_{$tab_no}_use_image"])?$component_data["buttons_{$tab_no}_use_image"]:"yes",
			"image_mode"=>isset($component_data["buttons_{$tab_no}_image_mode"])?$component_data["buttons_{$tab_no}_image_mode"]:"icon",
			"icon"=>isset($component_data["buttons_{$tab_no}_icon"])?$component_data["buttons_{$tab_no}_icon"]:"triangle-outline",
			"icon_color"=>isset($component_data["buttons_{$tab_no}_icon_color"])?$component_data["buttons_{$tab_no}_icon_color"]:"primary",
			"icon_color_value"=>isset($component_data["buttons_{$tab_no}_icon_color_value"])?$component_data["buttons_{$tab_no}_icon_color_value"]:"#000",
			"image"=>isset($component_data["buttons_{$tab_no}_image"])?$component_data["buttons_{$tab_no}_image"]:"",
		];
		foreach($aplication_translations as $aplication_translation) {
			$tab['text'] = $langs[$aplication_translation->code]["BUTTON_{$tab_no}_TEXT"];
			break;
		}
		$buttons[$tab_no] = $tab;
	}
	
	//calculate tabs width
	$column_count = 0;
	foreach($buttons as $item) if ($item['enabled']=="yes") $column_count++;
	$width = round(100 / $column_count, 3);
?>
<div id="page_footer_tabs_0315" class="component-selectable <?php echo $component_data['component']['css_class']?>" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
    <ion-footer <?php if ($no_border) echo 'class="ion-no-border"';?>>
		<ion-toolbar style="text-align: <?php echo $text_align;?>; --background: <?php echo $background_color_value?>;">
			<ion-grid>
				<ion-row  class="ion-justify-content-start">			
				<?php foreach ($buttons as $button) if ($button['enabled']=="yes"){?>
					<ion-col  class="ion-text-center" style="width: <?php echo $width?>%;">
						<ion-button fill="clear" class="footer-button" style="  width: 100%;">
							<div>
							<ion-icon slot="icon-only" name="<?php echo $button['icon']?>" size="large" style="color: <?php echo $button['icon_color_value']?>;"></ion-icon>
							<?php if ($button['use_text']=="yes") {?>
								<br>
								<span style="color: <?php echo $button['icon_color_value']?>;"><?php echo $button['text']?></span>
							<?php }?>
							
							</div>
						</ion-button>
					</ion-col>
				<?php } ?>
				</ion-row>
			</ion-grid>
		</ion-toolbar>
	</ion-footer>
</div>