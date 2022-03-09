<?php 
	$rows_count = 10;
	if (isset($component_data['rows_count'])) $rows_count = $component_data['rows_count'];
	if ($rows_count >20 ) $rows_count = 20;
	
	$image_type = "thumbnail";
	if (isset($component_data['image_type'])) $image_type = $component_data['image_type'];

	$title_column_name = "title_column_name";
	if (isset($component_data['title_column_name'])) $title_column_name = $component_data['title_column_name'];
	
	$subtitle_column_name = "subtitle_column_name";
	if (isset($component_data['subtitle_column_name'])) $subtitle_column_name = $component_data['subtitle_column_name'];

	$preview_column_name = "preview_column_name";
	if (isset($component_data['preview_column_name'])) $preview_column_name = $component_data['preview_column_name'];

	$image_column_name = "image_column_name";
	if (isset($component_data['image_column_name'])) $image_column_name = $component_data['image_column_name'];
	
	$sort_column_name = "";
	if (isset($component_data['sort_column_name'])) $sort_column_name = $component_data['sort_column_name'];

	$note_column_name = "note_column_name";
	if (isset($component_data['note_column_name'])) $note_column_name = $component_data['note_column_name'];	
	
	$divider_type = "inset";
	if (isset($component_data['divider_type'])) $divider_type = $component_data['divider_type'];	
	

	$divider_color = '--ion-color-light';
    if (isset($component_data['divider_color'])) $divider_color = $component_data['divider_color'];
	$divider_color_value = '';		
	if (isset($component_data['divider_color_value'])) $divider_color_value = $component_data['divider_color_value'];	
	
	
	//далее, создам массив, чтобы не заморачиваться обработкой кучи полей
	$text_fields = [
		["name"=>"Title","code"=>"title"],
		["name"=>"Subitle","code"=>"subtitle"],
		["name"=>"Preview text","code"=>"preview"],
		["name"=>"Note text","code"=>"note"],
	];
	
	foreach ($text_fields as $text_field) {
		$code = $text_field['code'];
		
		${$code."_wrap"} = "wrap";
		if (isset($component_data[$code."_wrap"])) ${$code."_wrap"} = $component_data[$code."_wrap"];

		${$code."_bold"} = "no";
		if (isset($component_data[$code."_bold"])) ${$code."_bold"} = $component_data[$code."_bold"];

		${$code."_color"} = "--ion-color-dark";
		if (isset($component_data[$code."_color"])) ${$code."_color"} = $component_data[$code."_color"];
		
		${$code."_color_value"} = "";
		if (isset($component_data[$code."_color_value"])) ${$code."_color_value"} = $component_data[$code."_color_value"];
		
		${$code."_font_size"} = "16";
		if ($code=="subtitle") ${$code."_font_size"} = "14";
		if ($code=="preview") ${$code."_font_size"} = "14";
		if ($code=="note") ${$code."_font_size"} = "11";

		if (isset($component_data[$code."_font_size"])) ${$code."_font_size"} = $component_data[$code."_font_size"];
		
		
	}
	

		
	
	//if user card
	$card_background_color = $component_data['component']['card_background_color'];
	$card_background_color_value = "";
	$card_border_color = $component_data['component']['card_border_color'];
	$card_border_color_value = "";
	
	//Colors
	if (isset($component_data['colors'])) {
		foreach($component_data['colors'] as $color) {
			if ($color->color_name==$card_background_color) $card_background_color_value = $color->color_value;
			if ($color->color_name==$card_border_color) $card_border_color_value = $color->color_value;
		}
	}	
	
	
?>
<div style="left: <?php echo $component_data['component']['x0']?>px; top: <?php echo $component_data['component']['y0']?>px; height: <?php echo $component_data['component']['height']?>px; width: <?php echo $component_data['component']['width']?>px; " id="simple_text_<?php echo $component_data['page_component_id']?>" class="component-resizeble-hv component-draggable component_inner_wrapper <?php echo $component_data['component']['css_class']?>" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
<?php if ($component_data['component']['use_card']==1) { ?>
		<ion-card style="
		border-style: solid; 
		margin: 0px; 
		padding: <?php echo $component_data['component']['card_padding_top']?>px  <?php echo $component_data['component']['card_padding_left']?>px; 
			--background: <?php echo $card_background_color_value?><?php echo dechex(255/100*$component_data['component']['card_opacity'])?>; 
		border-color: <?php echo $card_border_color_value?>; 
		border-width: <?php echo $component_data['component']['card_border_width'];?>px; 
		border-radius: <?php echo $component_data['component']['card_border_radius'];?>px;
		-webkit-box-shadow: <?php echo $component_data['component']['card_shadow'];?>;
		box-shadow: <?php echo $component_data['component']['card_shadow'];?>;">
<?php }?>

<ion-list lines="<?php echo $divider_type?>">
          
	<?php for($i=1; $i<=$rows_count; $i++) {?>
          <ion-item style="--border-color: <?php echo $divider_color_value?>">
			<?php if ($image_column_name!="-") {?>
				<?php if ($image_type=="thumbnail") {?>
				<ion-thumbnail slot="start">
				  <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2ODApLCBxdWFsaXR5ID0gNjUK/9sAQwALCAgKCAcLCgkKDQwLDREcEhEPDxEiGRoUHCkkKyooJCcnLTJANy0wPTAnJzhMOT1DRUhJSCs2T1VORlRAR0hF/9sAQwEMDQ0RDxEhEhIhRS4nLkVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVF/8AAEQgAOAA4AwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A6rNQzvgE55A7U5nCgk1y97rj/apginbGwAz3IPNOT0CK1L2qXq2gF3GckDEijqR61St/GdlIyiQSR5PUjisHXdRkvMBchB2x0rEaRY0CsuCoxjuCP/r1knYto9LGs2k6GSOZDGOpzVI38kksbQ20jRFhmTAA/DJya5Lw8Va5GY1Zhzlz/TpXXRSedcJvwuG4XdnNO7uFtDUkOWSio3fM34UUySzcPiJjnHFcHeQyPLK6XDKNx4A5+ma7S8kIt2xXJW939nu2aRU2FjkE8inMIlvTreOU2YkjaW1uCqSOyDrnpkDgg89aq32l2ipPNcOUBbaNgBZu7YyRjjv71smG3utPlurR8vBh/KX7pYcj+vXvVGWzuE/0m6S3k8xeEZsiP6e/rWZZzXNhNugcAnlVbg4rX0W8kn1OIN2B59SeprL1GKTzi90yuSPl2HhR2ArQ8MIBd7yScL3piOtLnzj1PFFVjL+8Yg9BRTuIxrnVp3T5nOD2FVMQXBVSfmc+nNOFmGGGBI+tTRRGBlPllxghdvUVnG/U0lboNH2vSpUayuDjoSf61DcXuoSyMz8k8bx0rSjnhvMQzKyODxuGAarXcsdu5h35YdwucVV2ToYtyGZiZ5NxPPWn6XfQpKYg+D2zTJHjubnaQTjqwPWs660iVJN8LZB6ZoaT0YRbWqOtS49G/I0VnaYsgs1W5ILjoe+KKx5TbmRrCPHrk0bCVzuIC+g4/GiitEZMqyqkseUcgrgfe61OqGOzBLgvINwNFFMRkSI7SknAPU47mnLuXqRRRSe40TI2fWiiipKP/9k=" />
				</ion-thumbnail>
				<?php } else {?>
				<ion-avatar slot="start">
				  <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2ODApLCBxdWFsaXR5ID0gNjUK/9sAQwALCAgKCAcLCgkKDQwLDREcEhEPDxEiGRoUHCkkKyooJCcnLTJANy0wPTAnJzhMOT1DRUhJSCs2T1VORlRAR0hF/9sAQwEMDQ0RDxEhEhIhRS4nLkVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVFRUVF/8AAEQgAOAA4AwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A6rNQzvgE55A7U5nCgk1y97rj/apginbGwAz3IPNOT0CK1L2qXq2gF3GckDEijqR61St/GdlIyiQSR5PUjisHXdRkvMBchB2x0rEaRY0CsuCoxjuCP/r1knYto9LGs2k6GSOZDGOpzVI38kksbQ20jRFhmTAA/DJya5Lw8Va5GY1Zhzlz/TpXXRSedcJvwuG4XdnNO7uFtDUkOWSio3fM34UUySzcPiJjnHFcHeQyPLK6XDKNx4A5+ma7S8kIt2xXJW939nu2aRU2FjkE8inMIlvTreOU2YkjaW1uCqSOyDrnpkDgg89aq32l2ipPNcOUBbaNgBZu7YyRjjv71smG3utPlurR8vBh/KX7pYcj+vXvVGWzuE/0m6S3k8xeEZsiP6e/rWZZzXNhNugcAnlVbg4rX0W8kn1OIN2B59SeprL1GKTzi90yuSPl2HhR2ArQ8MIBd7yScL3piOtLnzj1PFFVjL+8Yg9BRTuIxrnVp3T5nOD2FVMQXBVSfmc+nNOFmGGGBI+tTRRGBlPllxghdvUVnG/U0lboNH2vSpUayuDjoSf61DcXuoSyMz8k8bx0rSjnhvMQzKyODxuGAarXcsdu5h35YdwucVV2ToYtyGZiZ5NxPPWn6XfQpKYg+D2zTJHjubnaQTjqwPWs660iVJN8LZB6ZoaT0YRbWqOtS49G/I0VnaYsgs1W5ILjoe+KKx5TbmRrCPHrk0bCVzuIC+g4/GiitEZMqyqkseUcgrgfe61OqGOzBLgvINwNFFMRkSI7SknAPU47mnLuXqRRRSe40TI2fWiiipKP/9k=" />
				</ion-avatar>			
				<?php } ?>
			<?php } ?>
			<?php if ($note_column_name!="-") {?>
				<ion-note slot="end" <?php if ($note_wrap=="wrap") echo "class='ion-text-wrap'";?> style="<?php if ($note_bold=="yes") echo "font-weight: bold;";?>  font-size:<?php echo $note_font_size?>px; color:<?php echo $note_color_value?>;">Note</ion-note>
			<?php } ?>			
            <ion-label>
				<?php if ($title_column_name!="-") {?>
					<h2 <?php if ($title_wrap=="wrap") echo "class='ion-text-wrap'";?> style="<?php if ($title_bold=="yes") echo "font-weight: bold;";?> font-size:<?php echo $title_font_size?>px; color:<?php echo $title_color_value?>;">Item title</h2>
				<?php } ?>
				<?php if ($subtitle_column_name!="-") {?>
					<h3 <?php if ($subtitle_wrap=="wrap") echo "class='ion-text-wrap'";?> style="<?php if ($subtitle_bold=="yes") echo "font-weight: bold;";?> font-size:<?php echo $subtitle_font_size?>px; color:<?php echo $subtitle_color_value?>;">Sub title</h3>
				<?php } ?>
				<?php if ($preview_column_name!="-") {?>
					<p <?php if ($preview_wrap=="wrap") echo "class='ion-text-wrap'";?> style="<?php if ($preview_bold=="yes") echo "font-weight: bold;";?>  font-size:<?php echo $preview_font_size?>px; color:<?php echo $preview_color_value?>;">Some preview text</p>
				<?php } ?>
            </ion-label>
          </ion-item>
	<?php }?>
</ion-list>

<?php if ($component_data['component']['use_card']==1) { ?>
		</ion-card>
<?php }?>


</div>