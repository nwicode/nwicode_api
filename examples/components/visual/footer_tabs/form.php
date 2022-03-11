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
		$buttons[$tab_no] = [
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
			"action"=>isset($component_data["buttons_{$tab_no}_action"])?$component_data["buttons_{$tab_no}_action"]:"-",
		];


	}

?>

<form-tab name="Color settings">

	<div class="form-group" id="background-color-block">
		<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $background_color_value;?>">
			<!--begin::Title-->
			<input type="hidden" name="text_color" value="<?php echo $text_color?>" class="color_text">
			<input type="hidden" name="background_color" value="<?php echo $background_color?>" class="background_color">
			<button id="background-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>

		</div>
	</div>
</form-tab>

<?php foreach($buttons as $key=>$button) { ?>
	<form-tab name="Tab <?php echo $key+1;?>">

		<div class="form-group pb-3">
			<label>Tab is enabled?<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="buttons_<?php echo $key?>_enabled" id="buttons_<?php echo $key?>_enabled">
				<option value="yes" <?php if ($buttons[$key]['enabled']=="yes") echo "selected='selected'";?>>Yes</option>	
				<option value="no" <?php if ($buttons[$key]['enabled']=="no") echo "selected='selected'";?>>No</option>		
			</select>
		</div>

		<div class="form-group">
			<label>Show text?<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="buttons_<?php echo $key?>_use_text" id="buttons_<?php echo $key?>_use_text">
				<option value="yes" <?php if ($buttons[$key]['use_text']=="yes") echo "selected='selected'";?>>Yes</option>	
				<option value="no" <?php if ($buttons[$key]['use_text']=="no") echo "selected='selected'";?>>No</option>		
			</select>
		</div>

		<div class="form-group">
			<label>Show ICON/Image?<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="buttons_<?php echo $key?>_use_image" id="buttons_<?php echo $key?>_use_image">
				<option value="yes" <?php if ($buttons[$key]['use_image']=="yes") echo "selected='selected'";?>>Yes</option>	
				<option value="no" <?php if ($buttons[$key]['use_image']=="no") echo "selected='selected'";?>>No</option>		
			</select>
		</div>

		<?php foreach($aplication_translations as $aplication_translation) { ?>
			<div class="form-group">
			<label>Tab name (<?php echo $aplication_translation->code?>)<span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="TRANSLATIONS[<?php echo $aplication_translation->code?>][BUTTON_<?php echo $key?>_TEXT]" value="<?php echo $langs[$aplication_translation->code]["BUTTON_{$key}_TEXT"]?>">
		</div>		
		<?php }?>

		<div class="form-group">
			<label>Action<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="buttons_<?php echo $key?>_action">
				<option value="-" <?php if ($buttons[$key]['action']=="-") echo "selected='selected'";?>>-</option>	
				<?php if (isset($component_data['actions'])) foreach($component_data['actions'] as $action) {?>
					<option value="<?php echo $action['code']?>" <?php if ($buttons[$key]['action']==$action['code']) echo "selected='selected'";?>><?php echo $action['description']?></option>	
				<?php }?>
			</select>
			<span class="form-text text-muted">If action is "-" then button not show</span>
		</div>

		<!-- icon and icon color -->
		<div class="form-group" id="buttons_<?php echo $key?>_buttons">
				<label>Color and Icon<span class="text-danger">*</span></label>
				<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $background_color_value;?>">
					<!--begin::Title-->
					<div class="d-flex flex-column flex-grow-1 mr-2">
						<span  class="font-weight-bold font-size-lg mb-1"><ion-icon style="color: <?php echo $buttons[$key]['icon_color_value'];?>" id="buttons_<?php echo $key?>_icon_2" name="<?php echo $buttons[$key]['icon'];?>" size="large"></ion-icon></span>
						
						<input id="buttons_<?php echo $key?>_icon" type="hidden" name="buttons_<?php echo $key?>_icon" value="<?php echo $buttons[$key]['icon'];?>">
						<input id="buttons_<?php echo $key?>_icon_color" type="hidden" name="buttons_<?php echo $key?>_icon_color" value="<?php echo $buttons[$key]['icon_color'];?>">
						<input id="buttons_<?php echo $key?>_icon_color_value" type="hidden" name="buttons_<?php echo $key?>_icon_color_value" value="<?php echo $buttons[$key]['icon_color_value'];?>">
					</div>
					<button id="buttons_<?php echo $key?>_icon_button" icon-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-icons"></i></button>
					<button id="buttons_<?php echo $key?>_icon_color_button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
				</div>	
			</div>		

	</form-tab>
<?php }?>