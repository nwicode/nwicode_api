<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\Application_Languages;

	//defaule values
	$title_font_size = 15;
	if (isset($component_data['title_font_size'])) $title_font_size = $component_data['title_font_size'];

	$title_text_align = "center";
	if (isset($component_data['title_text_align'])) $title_text_align = $component_data['title_text_align'];

	$background_color = "--ion-color-primary";
	if (isset($component_data['background_color'])) $background_color = $component_data['background_color'];

	$title_text_color = "--ion-color-light";
	if (isset($component_data['title_text_color'])) $title_text_color = $component_data['title_text_color'];

	//defaule values
	$item_font_size = 15;
	if (isset($component_data['item_font_size'])) $item_font_size = $component_data['item_font_size'];

	$item_text_color = "--ion-color-light";
	if (isset($component_data['item_text_color'])) $item_text_color = $component_data['item_text_color'];  

	$item_icon_size = "30";
	if (isset($component_data['item_icon_size'])) $item_icon_size = $component_data['item_icon_size'];  	

	//set colors value
	$background_color_value = "";
	$text_color_value = "";
	$item_text_color_value = "";
	
	if (isset($component_data['colors'])) {
		foreach($component_data['colors'] as $color) {
			if ($color->color_name==$background_color) $background_color_value = $color->color_value;
			if ($color->color_name==$title_text_color) $title_text_color_value = $color->color_value;
			if ($color->color_name==$item_text_color) $item_text_color_value = $color->color_value;
		}
	}


	//get available app languages
	$languages = new Application_Languages();
	$languages->setApplication($component_data['application']);
	$aplication_translations = $languages->getLanguages();

	//assing translations
	$langs = [];
	$title_langs = [];	//for title multilang strings dialog
	foreach($aplication_translations as $aplication_translation) {
		
		//title
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['MENU_TITLE'])) $langs[$aplication_translation->code]['MENU_TITLE'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['MENU_TITLE']; else $langs[$aplication_translation->code]['MENU_TITLE'] =  "Menu";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['MENU_TITLE'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['MENU_TITLE']; else $title_langs[$aplication_translation->code] =  "Menu";
	}	

?>
 <form id="default_footer">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12"><div class="h3">Menu title settings</div></div>
		</div>
		<div class="row">

			<div class="form-group col-sm-10">
				<label>Title font size<span class="text-danger">*</span></label>
				<input type="range" class="form-control"  name="title_font_size" min="3" max="50" value="<?php echo $title_font_size?>" step="1" />
			</div>

			<div class="col-sm-2">
				<span class="label label-rounded label-primary label-pill label-inline align-middle m-auto "><span class="title_font_range_value"></span>px</span>
			</div>
		</div>


		<div class="form-group">
			<label>Text align<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="title_text_align">
				<option value="left" <?php if ($title_text_align=="left") echo "selected='selected'";?>>Left</option>
				<option value="right" <?php if ($title_text_align=="right") echo "selected='selected'";?>>Right</option>
				<option value="center"  <?php if ($title_text_align=="center") echo "selected='selected'";?>>Center</option>
			</select>
		</div>


		<!-- text anbd bg color -->
		<div class="form-group" id="background-color-block">
			<label>Color and title settings<span class="text-danger">*</span></label>
			<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $background_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<?php foreach($aplication_translations as $aplication_translation) { ?>
						<span  class="font-weight-bold font-size-lg mb-1 text-color-block" style="color: <?php echo $title_text_color_value;?>"><?php echo $aplication_translation->code?>: <span id="TRANSLATIONS_<?php echo $aplication_translation->code?>_MENU_TITLE"><?php echo $langs[$aplication_translation->code]['MENU_TITLE']?></span></span>
					<input type="hidden" name="TRANSLATIONS[<?php echo $aplication_translation->code?>][MENU_TITLE]" value="<?php echo $langs[$aplication_translation->code]['MENU_TITLE']?>"  />
					<?php } ?>
				</div>
				<input type="hidden" name="title_text_color" value="<?php echo $title_text_color?>" class="color_text">
				<input type="hidden" name="background_color" value="<?php echo $background_color?>" class="background_color">
				<button id="title-button" string-dialog string-values='<?php echo json_encode($title_langs)?>' class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-pen"></i></button>
				<button id="text-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
				<button id="background-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>
				
			</div>			
		</div>

		<div class="row">
			<div class="col-sm-12"><div class="h3">Menu item settings</div></div>
		</div>

		<!-- item text size -->
		<div class="row">

			<div class="form-group col-sm-10">
				<label>Item font size<span class="text-danger">*</span></label>
				<input type="range" class="form-control"  name="item_font_size" min="3" max="50" value="<?php echo $item_font_size?>" step="1" />
			</div>

			<div class="col-sm-2">
				<span class="label label-rounded label-primary label-pill label-inline align-middle m-auto "><span class="item_font_size_value"></span>px</span>
			</div>
		</div>	
		
		
		<div class="row">

			<div class="form-group col-sm-10">
				<label>Icon size<span class="text-danger">*</span></label>
				<input type="range" class="form-control"  name="item_icon_size" min="3" max="50" value="<?php echo $item_icon_size?>" step="1" />
			</div>

			<div class="col-sm-2">
				<span class="label label-rounded label-primary label-pill label-inline align-middle m-auto "><span class="item_icon_size_value"></span>px</span>
			</div>
		</div>

		<!-- text item color -->
		<div class="form-group" id="item-color-block">
			<label>Item settings<span class="text-danger">*</span></label>
			<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $background_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<span  class="font-weight-bold font-size-lg mb-1 text-color-block" style="color: <?php echo $item_text_color_value;?>"> Menu item</span>
				</div>
				<input type="hidden" name="item_text_color" value="<?php echo $item_text_color?>" class="color_text">

				
				<button id="item-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
				
			</div>			
		</div>

 </form>
 <!--end::Form-->
