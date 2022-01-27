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
	if (isset($component_data['title_text_color'])) $font_size = $component_data['title_text_color'];

	//set colors value
	$background_color_value = "";
	$text_color_value = "";
	
	if (isset($component_data['colors'])) {
		foreach($component_data['colors'] as $color) {
			if ($color->color_name==$background_color) $background_color_value = $color->named;
			if ($color->color_name==$title_text_color) $title_text_color_value = $color->color_value;
		}
	}

	//defaule values
	$item_font_size = 15;
	if (isset($component_data['item_font_size'])) $item_font_size = $component_data['item_font_size'];

	$item_text_color = "--ion-color-light";
	if (isset($component_data['item_text_color'])) $item_text_color = $component_data['item_text_color'];  

	$item_icon_size = "30";
	if (isset($component_data['item_icon_size'])) $item_icon_size = $component_data['item_icon_size'];  
?>

<ion-menu side="start" content-id="main-content">
    <ion-content style="--background: var(<?php echo $background_color?>); ">

        <ion-list>
            <ion-list-header lines="none">
                <ion-label style="font-size: <?php echo $title_font_size?>px; color: var(<?php echo $title_text_color?>);">{{translationService.translatePhrase('PAGE_<?php echo $component_data['page_id']?>_MENU_TITLE')}}</ion-label>
              </ion-list-header>
            <div *ngFor="let item of menuItems">
                <ion-item *ngIf="item.image==''" button color="<?php echo $background_color_value?>"  (click)="call_menu_item(item.action)">
                    <ion-label style="font-size: <?php echo $title_font_size?>px; color: var(<?php echo $item_text_color?>);"> {{ item.name | translate}}</ion-label>
                </ion-item>
                <ion-item *ngIf="item.image!=''" button color="<?php echo $background_color_value?>" (click)="call_menu_item(item.action)">
                    <ion-thumbnail slot="start" style="width:<?php echo $item_icon_size?>px; height:<?php echo $item_icon_size?>px;">
                        <img [src]="'../../assets/'+item.image">
                    </ion-thumbnail>                    
                    <ion-label style="font-size: <?php echo $title_font_size?>px; color: var(<?php echo $item_text_color?>);"> {{ item.name | translate}}</ion-label>
                </ion-item>
            </div>

          </ion-list>
    </ion-content>
</ion-menu>
