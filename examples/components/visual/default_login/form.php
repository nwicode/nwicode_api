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
$button_color = "--ion-color-primary";
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
if (isset($component_data['button_color'])) $button_color = $component_data['button_color'];
if (isset($component_data['no_border'])) $no_border = $component_data['no_border'];


//set colors value
$background_color_value = "";
$text_color_value = "";
$button_color_value = "";

if (isset($component_data['colors'])) {
    foreach($component_data['colors'] as $color) {
        if ($color->color_name==$background_color) $background_color_value = $color->color_value;
        if ($color->color_name==$text_color) $text_color_value = $color->color_value;
        if ($color->color_name==$button_color) $button_color_value = $color->color_value;
    }
}

//assing translations
$langs = [];
$button_langs = [];	//for login button multilang strings dialog
foreach($aplication_translations as $aplication_translation) {

    //login button
    if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['LOGIN_BUTTON'])) $langs[$aplication_translation->code]['LOGIN_BUTTON'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['LOGIN_BUTTON']; else $langs[$aplication_translation->code]['LOGIN_BUTTON'] =  "Login";
    if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['LOGIN_BUTTON'])) $button_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['LOGIN_BUTTON']; else $button_langs[$aplication_translation->code] =  "Login";
}

?>
 <form id="default_login">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12"><div class="h3">Login form settings</div></div>
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
			<label>Text align<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="text_align">
				<option value="left" <?php if ($text_align=="left") echo "selected='selected'";?>>Left</option>
				<option value="right" <?php if ($text_align=="right") echo "selected='selected'";?>>Right</option>
				<option value="center"  <?php if ($text_align=="center") echo "selected='selected'";?>>Center</option>
			</select>
		</div>

		<div class="form-group" id="background-color-block">
			<div class="d-flex align-items-center mb-9 rounded p-5 color-block" style="background-color: <?php echo $background_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<span href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Background color</span>
				</div>
				<input type="hidden" name="background_color" value="<?php echo $background_color?>" class="background_color">
				<button id="background-color-button" color-dialog class="btn btn-icon btn-warning btn-sm mr-2"><i class="flaticon2-edit"></i></button>

			</div>


		</div>

		<div class="form-group" id="text-color-block">
			<div class="d-flex align-items-center mb-9 rounded p-5 color-block" style="background-color: <?php echo $text_color_value;?>">
				<!--begin::Title-->
				<div class="d-flex flex-column flex-grow-1 mr-2">
					<span href="#" class="font-weight-bold text-dark-75 text-primary font-size-lg mb-1">Text color</span>
				</div>
				<input type="hidden" name="text_color" value="<?php echo $text_color?>" class="text-color">
				<button id="text-color-button" color-dialog class="btn btn-icon btn-warning btn-sm mr-2"><i class="flaticon2-edit"></i></button>
			</div>
		</div>

        <div class="form-group" id="button-color-block">
            <div class="d-flex align-items-center mb-9 rounded p-5 color-block" style="background-color: <?php echo $button_color_value;?>">
                <!--begin::Title-->
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <?php foreach($aplication_translations as $aplication_translation) { ?>
                        <span  class="font-weight-bold font-size-lg mb-1 text-color-block" style="color: <?php echo $text_color_value;?>"><?php echo $aplication_translation->code?>: <span id="TRANSLATIONS_<?php echo $aplication_translation->code?>_LOGIN_BUTTON"><?php echo $langs[$aplication_translation->code]['LOGIN_BUTTON']?></span></span>
                        <input type="hidden" name="TRANSLATIONS[<?php echo $aplication_translation->code?>][LOGIN_BUTTON]" value="<?php echo $langs[$aplication_translation->code]['LOGIN_BUTTON']?>"  />
                    <?php } ?>
                </div>

                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <span href="#" class="font-weight-bold text-dark-75 text-primary font-size-lg mb-1">Login button</span>
                </div>
                <input type="hidden" name="button_color" value="<?php echo $button_color?>" class="button_color">
                <button id="login-button" string-dialog string-values='<?php echo json_encode($button_langs)?>' class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-pen"></i></button>
                <button id="button-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="flaticon2-edit"></i></button>
            </div>
        </div>



 </form>
 <!--end::Form-->
