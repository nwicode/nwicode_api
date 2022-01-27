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
	if (isset($component_data['left_button_border_radius'])) $left_button_border_radius = $component_data['left_button_border_radius'];
	
	
	 
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
	if (isset($component_data['right_button_border_radius'])) $right_button_border_radius = $component_data['right_button_border_radius'];

	
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
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_TITLE'])) $langs[$aplication_translation->code]['FOOTER_TITLE'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_TITLE']; else $langs[$aplication_translation->code]['FOOTER_TITLE'] =  "Title";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_TITLE'])) $title_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_TITLE']; else $title_langs[$aplication_translation->code] =  "Title";

		//left button
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_LB_TITLE'])) $langs[$aplication_translation->code]['FOOTER_LB_TITLE'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_LB_TITLE']; else $langs[$aplication_translation->code]['FOOTER_LB_TITLE'] =  "Click";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_LB_TITLE'])) $lbtitle_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_LB_TITLE']; else $lbtitle_langs[$aplication_translation->code] =  "Click";
		
		//right button
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_RB_TITLE'])) $langs[$aplication_translation->code]['FOOTER_RB_TITLE'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_RB_TITLE']; else $langs[$aplication_translation->code]['FOOTER_RB_TITLE'] =  "Click";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_RB_TITLE'])) $rbtitle_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['FOOTER_RB_TITLE']; else $rbtitle_langs[$aplication_translation->code] =  "Click";
	}
?>

 <form id="default_footer">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12"><div class="h3">Footer settings</div></div>
		</div>
		<div class="row">
		
			<div class="form-group col-sm-10">
				<label>Font size<span class="text-danger">*</span></label>
				<input type="range" class="form-control"  name="font_size" min="3" max="50" value="<?php echo $font_size?>" step="1" />
			</div>

			<div class="col-sm-2">
				<span class="label label-rounded label-primary label-pill label-inline align-middle m-auto "><span class="font_range_value"></span>px</span>
			</div>   
		</div>   

		<div class="form-group">
			<label class="checkbox"><input type="checkbox" <?php if ($no_border) echo "checked='checked'";?>  value="0" name="no_border" value="1"><span class="mr-3"></span>Dont show border</label>
		</div>		

		<div class="form-group">
			<label>Text align<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="text_align">
				<option value="left" <?php if ($text_align=="left") echo "selected='selected'";?>>Left</option>
				<option value="right" <?php if ($text_align=="right") echo "selected='selected'";?>>Right</option>
				<option value="center"  <?php if ($text_align=="center") echo "selected='selected'";?>>Center</option>
			</select>
		</div>

		<!-- text anbd bg color -->
		<div class="form-group" id="background-color-block">
			<label>Color and title settings<span class="text-danger">*</span></label>
			<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $background_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<?php foreach($aplication_translations as $aplication_translation) { ?>
						<span  class="font-weight-bold font-size-lg mb-1 text-color-block" style="color: <?php echo $text_color_value;?>"><?php echo $aplication_translation->code?>: <span id="TRANSLATIONS_<?php echo $aplication_translation->code?>_FOOTER_TITLE"><?php echo $langs[$aplication_translation->code]['FOOTER_TITLE']?></span></span>
					<input type="hidden" name="TRANSLATIONS[<?php echo $aplication_translation->code?>][FOOTER_TITLE]" value="<?php echo $langs[$aplication_translation->code]['FOOTER_TITLE']?>"  />
					<?php } ?>
				</div>
				<input type="hidden" name="text_color" value="<?php echo $text_color?>" class="color_text">
				<input type="hidden" name="background_color" value="<?php echo $background_color?>" class="background_color">
				<button id="title-button" string-dialog string-values='<?php echo json_encode($title_langs)?>' class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-pen"></i></button>
				<button id="text-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
				<button id="background-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>
				
			</div>			
		</div>


		<div class="separator separator-solid my-7"></div>
		<div class="row">
			<div class="col-sm-12"><div class="h3">Left button settings</div></div>
		</div>
		

		<!-- left button -->
		<div class="form-group">
			<label class="checkbox"><input type="checkbox" <?php if ($use_left_button) echo "checked='checked'";?>  value="0" name="use_left_button" value="1"><span class="mr-3"></span>Show left button</label>
		</div>		

		<div class="form-group" id="lb-color-block">
			<label>Button title and colors</label>
			<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $left_button_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<?php foreach($aplication_translations as $aplication_translation) { ?>
					<span  class="font-weight-bold font-size-lg mb-1 text-color-block" style="color: <?php echo $left_button_text_color_value;?>"><?php echo $aplication_translation->code?>: <span id="TRANSLATIONS_<?php echo $aplication_translation->code?>_FOOTER_LB_TITLE"><?php echo $langs[$aplication_translation->code]['FOOTER_LB_TITLE']?></span></span>
					<input type="hidden" name="TRANSLATIONS[<?php echo $aplication_translation->code?>][FOOTER_LB_TITLE]" value="<?php echo $langs[$aplication_translation->code]['FOOTER_LB_TITLE']?>"  />
				<?php } ?>
				</div>
				<input type="hidden" name="left_button_color" value="<?php echo $left_button_color;?>" class="background_color">				
				<input type="hidden" name="left_button_text_color" value="<?php echo $left_button_text_color;?>" class="background_color">				
				<button id="lb-title-button" string-dialog string-values='<?php echo json_encode($lbtitle_langs)?>' class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-pen"></i></button>
				<button id="lbtext-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
				<button id="lbbackground-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>
			</div>			
		</div>		

		<div class="form-group"  id="lb-icon-block">
			<label>Icon</label>
			<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $left_button_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<span  class="font-weight-bold font-size-lg mb-1"><ion-icon style="color: <?php echo $left_button_icon_color_value;?>" id="left_button_icon_2" name="<?php echo $left_button_icon?>" size="large"></ion-icon></span>
					<input id="left_button_icon" type="hidden" name="left_button_icon" value="<?php echo $left_button_icon?>">
					<input id="left_button_icon_color" type="hidden" name="left_button_icon_color" value="<?php echo $left_button_icon_color?>">

				</div>
				<button id="lb-icon-button" icon-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-icons"></i></button>
				<button id="lbicon-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
				<button id="lb-icon-clear" onclick="clearLeftIcon()" class="btn btn-icon btn-danger btn-xs mr-2"><i class="fas fa-times"></i></button>
				
			</div>			
		</div>

		<div class="form-group">
			<label>Button type<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="left_button_type">
				<option value="clear" <?php if ($left_button_type=="clear") echo "selected='selected'";?>>Button with a transparent background that resembles a flat button.</option>	
				<option value="outline" <?php if ($left_button_type=="outline") echo "selected='selected'";?>>Button with a transparent background and a visible border.</option>	
				<option value="solid" <?php if ($left_button_type=="solid") echo "selected='selected'";?>>Button with a filled background.</option>	
			</select>
		</div>

		<div class="form-group">
			<label>Action<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="left_button_action">
				<option value="-" <?php if ($left_button_action=="") echo "selected='selected'";?>>-</option>	
				<?php if (isset($component_data['actions'])) foreach($component_data['actions'] as $action) {?>
					<option value="<?php echo $action['code']?>" <?php if ($left_button_action==$action['code']) echo "selected='selected'";?>><?php echo $action['description']?></option>	
				<?php }?>
			</select>
		</div>

		<div class="row">
		
			<div class="form-group col-sm-10">
				<label>Border radius<span class="text-danger">*</span></label>
				<input type="range" class="form-control"  name="left_button_border_radius" min="3" max="50" value="<?php echo $left_button_border_radius?>" step="1" />
			</div>

			<div class="col-sm-2">
				<span class="label label-rounded label-primary label-pill label-inline align-middle m-auto "><span class="left_button_border_radius_value"></span>px</span>
			</div>   
		</div> 

		<div class="separator separator-solid my-7"></div>
		<div class="row">
			<div class="col-sm-12"><div class="h3">Right button settings</div></div>
		</div>
		

		<!-- right button -->
		<div class="form-group">
			<label class="checkbox"><input type="checkbox" <?php if ($use_right_button) echo "checked='checked'";?> name="use_right_button" value="0"><span class="mr-3"></span>Show right button</label>
		</div>		

		<div class="form-group" id="rb-color-block">
			<label>Button title and colors</label>
			<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $right_button_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<?php foreach($aplication_translations as $aplication_translation) { ?>
					<span  class="font-weight-bold font-size-lg mb-1 text-color-block" style="color: <?php echo $right_button_text_color_value;?>"><?php echo $aplication_translation->code?>: <span id="TRANSLATIONS_<?php echo $aplication_translation->code?>_FOOTER_RB_TITLE"><?php echo $langs[$aplication_translation->code]['FOOTER_RB_TITLE']?></span></span>
					<input type="hidden" name="TRANSLATIONS[<?php echo $aplication_translation->code?>][FOOTER_RB_TITLE]" value="<?php echo $langs[$aplication_translation->code]['FOOTER_RB_TITLE']?>"  />
				<?php } ?>
				</div>
				<input type="hidden" name="right_button_color" value="<?php echo $right_button_color;?>" class="background_color">				
				<input type="hidden" name="right_button_text_color" value="<?php echo $right_button_text_color;?>" class="background_color">				
				<button id="rb-title-button" string-dialog string-values='<?php echo json_encode($rbtitle_langs)?>' class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-pen"></i></button>
				<button id="rbtext-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
				<button id="rbbackground-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>
			</div>			
		</div>		

		<div class="form-group"  id="rb-icon-block">
			<label>Icon</label>
			<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $right_button_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<span  class="font-weight-bold font-size-lg mb-1"><ion-icon style="color: <?php echo $right_button_icon_color_value;?>" id="right_button_icon_2" name="<?php echo $right_button_icon?>" size="large"></ion-icon></span>
					<input id="right_button_icon" type="hidden" name="right_button_icon" value="<?php echo $right_button_icon?>">
					<input id="right_button_icon_color" type="hidden" name="right_button_icon_color" value="<?php echo $right_button_icon_color?>">

				</div>
				<button id="rb-icon-button" icon-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-icons"></i></button>
				<button id="rbicon-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
				<button id="rb-icon-clear" onclick="clearrightIcon()" class="btn btn-icon btn-danger btn-xs mr-2"><i class="fas fa-times"></i></button>
				
			</div>			
		</div>

		<div class="form-group">
			<label>Button type<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="right_button_type">
				<option value="clear" <?php if ($right_button_type=="clear") echo "selected='selected'";?>>Button with a transparent background that resembles a flat button.</option>	
				<option value="outline" <?php if ($right_button_type=="outline") echo "selected='selected'";?>>Button with a transparent background and a visible border.</option>	
				<option value="solid" <?php if ($right_button_type=="solid") echo "selected='selected'";?>>Button with a filled background.</option>	
			</select>
		</div>

		<div class="form-group">
			<label>Action<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="right_button_action">
				<option value="-" <?php if ($right_button_action=="") echo "selected='selected'";?>>-</option>	
				<?php if (isset($component_data['actions'])) foreach($component_data['actions'] as $action) {?>
					<option value="<?php echo $action['code']?>" <?php if ($right_button_action==$action['code']) echo "selected='selected'";?>><?php echo $action['description']?></option>	
				<?php }?>
			</select>
		</div>

		<div class="row">
		
			<div class="form-group col-sm-10">
				<label>Border radius<span class="text-danger">*</span></label>
				<input type="range" class="form-control"  name="right_button_border_radius" min="3" max="50" value="<?php echo $right_button_border_radius?>" step="1" />
			</div>

			<div class="col-sm-2">
				<span class="label label-rounded label-primary label-pill label-inline align-middle m-auto "><span class="right_button_border_radius_value"></span>px</span>
			</div>   
		</div>		


 </form>
 <!--end::Form-->


 