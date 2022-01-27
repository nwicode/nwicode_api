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
			$text = $component_data['TRANSLATIONS'][$key]['HEADER_TITLE']; break;
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
			$lbtext = $component_data['TRANSLATIONS'][$key]['HEADER_LB_TITLE']; break;
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
			$rbtext = $component_data['TRANSLATIONS'][$key]['HEADER_RB_TITLE']; break;
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
	$lbtitle_langs = [];	//for left button multilang strings dialog
	$rbtitle_langs = [];	//for left button multilang strings dialog
	foreach($aplication_translations as $aplication_translation) {
		
		//title
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_TITLE'])) $langs[$aplication_translation->code]['HEADER_TITLE'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_TITLE']; else $langs[$aplication_translation->code]['HEADER_TITLE'] =  "Title";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_TITLE'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_TITLE']; else $title_langs[$aplication_translation->code] =  "Title";

		//left button
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_LB_TITLE'])) $langs[$aplication_translation->code]['HEADER_LB_TITLE'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_LB_TITLE']; else $langs[$aplication_translation->code]['HEADER_LB_TITLE'] =  "Click";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_LB_TITLE'])) $lbtitle_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_LB_TITLE']; else $lbtitle_langs[$aplication_translation->code] =  "Click";
		
		//right button
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_RB_TITLE'])) $langs[$aplication_translation->code]['HEADER_RB_TITLE'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_RB_TITLE']; else $langs[$aplication_translation->code]['HEADER_RB_TITLE'] =  "Click";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_RB_TITLE'])) $rbtitle_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['HEADER_RB_TITLE']; else $rbtitle_langs[$aplication_translation->code] =  "Click";
	}

?>
<div id="page_HEADER_0315" class="component-selectable" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
    <ion-header <?php if ($no_border) echo 'class="ion-no-border"';?>>
		<ion-toolbar style="text-align: <?php echo $text_align;?>; --background: <?php echo $background_color_value?>;">
			<?php if ($use_left_button) {?>
			<ion-buttons slot="start">

				<ion-button

					<?php if ($left_button_type=="outline") {?>
						style="--border-color: <?php echo $left_button_color_value?>; --border-radius: <?php echo $left_button_border_radius?>px;"
					<?php } else if ($left_button_type=="solid") {?>
						style="--background: <?php echo $left_button_color_value?>; --border-radius: <?php echo $left_button_border_radius?>px;"
					<?php } else {?>
						style="--border-radius: <?php echo $left_button_border_radius?>px;"
					<?php } ?>
				  	fill="<?php echo $left_button_type?>"
				>
				
				<?php if ($left_button_icon!="" && $lbtext!="") {?> 
					<ion-icon style="color: <?php echo $left_button_icon_color_value?>" slot="start" name="<?php echo $left_button_icon; ?>"></ion-icon><ion-text style="color: <?php echo $left_button_text_color_value?>"><?php echo $lbtext;?></ion-text>
				<?php }else if ($left_button_icon!="" && $lbtext=="") {?> 
					<ion-icon style="color: <?php echo $left_button_icon_color_value?>" slot="icon-only" name="<?php echo $left_button_icon; ?>"></ion-icon>
				<?php }else if ($left_button_icon=="" && $lbtext=="") {?> 
					
				<?php } ?> 
				</ion-button>

			</ion-buttons>			
			<?php }?>
			<ion-title><ion-text style="font-size: <?php echo $font_size;?>px; color: <?php echo $text_color_value?>" color="<?php echo $text_color_value?>"><?php echo $text?></ion-text></ion-title>
		
			<?php if ($use_right_button) {?>
				<ion-buttons slot="end">
				<ion-button 

					<?php if ($right_button_type=="outline") {?>
						style="--border-color: <?php echo $right_button_color_value?>; --border-radius: <?php echo $right_button_border_radius?>px;"
					<?php } else if ($right_button_type=="solid") {?>
						style="--background: <?php echo $right_button_color_value?>;  --border-radius: <?php echo $right_button_border_radius?>px;"
					<?php } else {?>
						style="--border-radius: <?php echo $right_button_border_radius?>px;"
					<?php } ?>
				  	fill="<?php echo $right_button_type?>"
					  
				>
				
				<?php if ($right_button_icon!="" && $rbtext!="") {?> 
					<ion-icon style="color: <?php echo $right_button_icon_color_value?>" slot="end" name="<?php echo $right_button_icon; ?>"></ion-icon><ion-text style="color: <?php echo $right_button_text_color_value?>"><?php echo $rbtext;?></ion-text>
				<?php }else if ($right_button_icon!="" && $rbtext=="") {?> 
					<ion-icon style="color: <?php echo $right_button_icon_color_value?>" slot="icon-only" name="<?php echo $right_button_icon; ?>"></ion-icon>
				<?php }else if ($right_button_icon=="" && $rbtext=="") {?> 

				<?php } ?> 
				</ion-button>
		</ion-buttons>			
		<?php }?>		
		</ion-toolbar>
	</ion-header>
</div>