<?php
//defaule values
use App\Models\Application_Languages;

$font_size = 15;
$text_align = "center";
$background_color = "--ion-color-primary";
$text_color = "--ion-color-secondary";
$button_color = "--ion-color-primary";

//redefine
if (isset($component_data['font_size'])) $font_size = $component_data['font_size'];
if (isset($component_data['text_align'])) $text_align = $component_data['text_align'];
if (isset($component_data['background_color'])) $background_color = $component_data['background_color'];
if (isset($component_data['text_color'])) $text_color = $component_data['text_color'];
if (isset($component_data['button_color'])) $button_color = $component_data['button_color'];

//set colors value
$background_color_value = "";
$text_color_value = "";
$button_color_value = "";

if (isset($component_data) &&  is_array($component_data)) {
    foreach($component_data['colors'] as $color) {
        if ($color->color_name==$background_color) $background_color_value = $color->color_value;
        if ($color->color_name==$text_color) $text_color_value = $color->color_value;
        if ($color->color_name==$button_color) $button_color_value = $color->color_value;
    }
}


$login_text = "Login";
if (isset($component_data['TRANSLATIONS'])) {
    foreach($component_data['TRANSLATIONS'] as $key=>$value) {
        $login_text = $component_data['TRANSLATIONS'][$key]['LOGIN_BUTTON']; break;
    }
}
//print_r($component_data);
if (isset($component_data)) {
    foreach($component_data as $key=>$value) {
        if (preg_match("/languages_(.+?)_/",$key)) {$login_text = $value; break;}
    }
}

//get available app languages
$languages = new Application_Languages();
$languages->setApplication($component_data['application']);
$aplication_translations = $languages->getLanguages();

//assing translations
$langs = [];
$login_langs = [];	//for login multilang strings dialog
foreach($aplication_translations as $aplication_translation) {
    //login
    if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['LOGIN_BUTTON'])) $langs[$aplication_translation->code]['LOGIN_BUTTON'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['LOGIN_BUTTON']; else $langs[$aplication_translation->code]['LOGIN_BUTTON'] =  "Login";
    if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['LOGIN_BUTTON'])) $login_langs[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['LOGIN_BUTTON']; else $login_langs[$aplication_translation->code] =  "Login";
}

?>
<div  id="login_form_<?php echo $component_data['page_component_id']?>" class="component-selectable component-resizeble component_wrapper login_form" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
    <div class="component-resizeble component-draggable component_inner_wrapper">

                <ion-list>
                    

                <ion-item>
                    <ion-label position="floating" style="font-size: <?php echo $font_size;?>px; color: <?php echo $text_color_value?>">Email</ion-label>
                    <ion-input type="email" name="email" style="font-size: <?php echo $font_size;?>px; color: <?php echo $text_color_value?>"></ion-input>
                </ion-item>

                <ion-item>
                    <ion-label position="floating" style="font-size: <?php echo $font_size;?>px; color: <?php echo $text_color_value?>">Password</ion-label>
                    <ion-input type="password" name="password" style="font-size: <?php echo $font_size;?>px; color: <?php echo $text_color_value?>"></ion-input>
                </ion-item>

                <ion-button type="button" expand="full" style="font-size: <?php echo $font_size;?>px; --background: <?php echo $button_color_value?>; color:<?php echo $text_color_value?>"><?php echo $login_text?></ion-button>
                </ion-list>
    </div>
</div>