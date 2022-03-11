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
	if (isset($component_data['font_size'])) $font_size = $component_data['font_size'];
	if (isset($component_data['left_button_color'])) $left_button_color = $component_data['left_button_color'];
	if (isset($component_data['left_button_text_color'])) $left_button_text_color = $component_data['left_button_text_color'];
	if (isset($component_data['left_button_icon'])) $left_button_icon = $component_data['left_button_icon'];
	if (isset($component_data['left_button_icon_color'])) $left_button_icon_color = $component_data['left_button_icon_color'];
	if (isset($component_data['left_button_icon'])) $left_button_icon = $component_data['left_button_icon'];
	if (isset($component_data['left_button_action'])) $left_button_action = $component_data['left_button_action'];
	if (isset($component_data['left_button_type'])) $left_button_type = $component_data['left_button_type'];
	if (isset($component_data['left_button_border_radius'])) $left_button_border_radius = $component_data['left_button_border_radius'];
	
	//Colors
	if (isset($component_data['colors'])) {
		foreach($component_data['colors'] as $color) {

			if ($color->color_name==$left_button_color) $left_button_color_value = $color->color_value;
			if ($color->color_name==$left_button_text_color) $left_button_text_color_value = $color->color_value;
			if ($color->color_name==$left_button_icon_color) $left_button_icon_color_value = $color->color_value;
			
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
	

	$position_horizontal= "end";
	if (isset($component_data['position_horizontal'])) $position_horizontal = $component_data['position_horizontal'];
	$position_vertical= "top";
	if (isset($component_data['position_vertical'])) $position_vertical = $component_data['position_vertical'];
	$position_edge= "true";
	if (isset($component_data['position_edge'])) $position_edge = $component_data['position_edge'];
	$position_slot= "fixed";
	if (isset($component_data['position_slot'])) $position_slot = $component_data['position_slot'];

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
				"icon_color_value"=>isset($component_data["buttons_{$key}_buttons_{$i}_icon_color_value"])?$component_data["buttons_{$key}_buttons_{$i}_icon_color_value"]:"",
				"color"=>isset($component_data["buttons_{$key}_buttons_{$i}_color"])?$component_data["buttons_{$key}_buttons_{$i}_color"]:"primary",
				"color_value"=>isset($component_data["buttons_{$key}_buttons_{$i}_color_value"])?$component_data["buttons_{$key}_buttons_{$i}_color_value"]:"",
				"action"=>isset($component_data["buttons_{$key}_buttons_{$i}_action"])?$component_data["buttons_{$key}_buttons_{$i}_action"]:"-",
			];
		}
	}

?>
<form-tab name="Position and size">
	<div class="form-group">
		<label>Horizontal<span class="text-danger">*</span></label>
		<select class="form-control form-control-solid" name="position_horizontal" id="position_horizontal">
			<option value="end" <?php if ($position_horizontal=="end") echo "selected='selected'";?>>End</option>	
			<option value="start" <?php if ($position_horizontal=="start") echo "selected='selected'";?>>Start</option>	
			<option value="center" <?php if ($position_horizontal=="center") echo "selected='selected'";?>>Center</option>	
		</select>
	</div>

	<div class="form-group">
		<label>Vertical<span class="text-danger">*</span></label>
		<select class="form-control form-control-solid" name="position_vertical" id="position_vertical">
			<option value="bottom" <?php if ($position_vertical=="bottom") echo "selected='selected'";?>>End</option>	
			<option value="top" <?php if ($position_vertical=="top") echo "selected='selected'";?>>Top</option>	
			<option value="center" <?php if ($position_vertical=="center") echo "selected='selected'";?>>Center</option>	
		</select>
	</div>

	<div class="form-group">
		<label>Edge<span class="text-danger">*</span></label>
		<select class="form-control form-control-solid" name="position_edge" id="position_edge">
			<option value="true" <?php if ($position_edge=="true") echo "selected='selected'";?>>Yes</option>	
			<option value="false" <?php if ($position_edge=="false") echo "selected='selected'";?>>No</option>		
		</select>
		<span class="form-text text-muted">If true, the fab will display on the edge of the header if vertical is "top", and on the edge of the footer if it is "bottom". Should be used with a fixed slot.</span>
	</div>

	<div class="form-group">
		<label>Slot<span class="text-danger">*</span></label>
		<select class="form-control form-control-solid" name="position_slot" id="position_slot">
			<option value="fixed" <?php if ($position_slot=="fixed") echo "selected='selected'";?>>Fixed</option>	
			<option value="float" <?php if ($position_slot=="float") echo "selected='selected'";?>>No</option>		
		</select>
	</div>

	<div class="form-group">
		<label>Button size<span class="text-danger">*</span></label>
		<select class="form-control form-control-solid" name="position_size" id="position_size">
			<option value="small" <?php if ($position_size=="small") echo "selected='selected'";?>>Small</option>	
			<option value="default" <?php if ($position_size=="default") echo "selected='selected'";?>>Default</option>		
		</select>
	</div>
</form-tab>

<form-tab name="Icon and color">
	<br>
	<div class="form-group" id="lb-color-block">
		<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $left_button_color_value;?>">
			<!--begin::Title-->
			<div class="d-flex flex-column flex-grow-1 mr-2">
				<span  class="font-weight-bold font-size-lg mb-1"><ion-icon style="color: <?php echo $left_button_icon_color_value;?>" id="left_button_icon_2" name="<?php echo $left_button_icon?>" size="large"></ion-icon></span>
				
				<input type="hidden" name="left_button_color" value="<?php echo $left_button_color;?>" class="background_color">				
				<input type="hidden" name="left_button_color_value" value="<?php echo $left_button_color_value;?>" class="background_color">				
				
				<input id="left_button_icon" type="hidden" name="left_button_icon" value="<?php echo $left_button_icon?>">
				<input id="left_button_icon_color" type="hidden" name="left_button_icon_color" value="<?php echo $left_button_icon_color?>">
				<input id="left_button_icon_color_value" type="hidden" name="left_button_icon_color_value" value="<?php echo $left_button_icon_color_value?>">

			</div>
			<button id="lb-icon-button" icon-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-icons"></i></button>
			<button id="lbicon-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
			<button id="lbbackground-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>
			
		</div>	
	</div>	
</form-tab>

<form-tab name="Click action">
	<div class="form-group">
		<label>Action<span class="text-danger">*</span></label>
		<select class="form-control form-control-solid" name="left_button_action">
			<option value="-" <?php if ($left_button_action=="") echo "selected='selected'";?>>-</option>	
			<?php if (isset($component_data['actions'])) foreach($component_data['actions'] as $action) {?>
				<option value="<?php echo $action['code']?>" <?php if ($left_button_action==$action['code']) echo "selected='selected'";?>><?php echo $action['description']?></option>	
			<?php }?>
		</select>
		<span class="form-text text-muted">Not work if buttons use with "buttons list"</span>
	</div>
</form-tab>

<?php foreach($buttons as $key=>$button) { ?>
	<form-tab name="<?php echo $button['name']?>">
		<div class="form-group pb-3">
			<label>List is enabled?<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="buttons_<?php echo $key?>_enabled" id="buttons_<?php echo $key?>_enabled">
				<option value="yes" <?php if ($buttons[$key]['enabled']=="yes") echo "selected='selected'";?>>Yes</option>	
				<option value="no" <?php if ($buttons[$key]['enabled']=="no") echo "selected='selected'";?>>No</option>		
			</select>
		</div>
		<?php for ($i=0; $i<5;$i++) {?>

			<div class="row">
				<div class="col-sm-12"><div class="h3">Button <?php echo $i+1?></div></div>
			</div>	
			<div class="separator separator-solid"></div>

			<div class="form-group">
				<label>Action<span class="text-danger">*</span></label>
				<select class="form-control form-control-solid" name="buttons_<?php echo $key?>_buttons_<?php echo $i?>_action">
					<option value="-" <?php if ($buttons[$key]['buttons'][$i]['action']=="-") echo "selected='selected'";?>>-</option>	
					<?php if (isset($component_data['actions'])) foreach($component_data['actions'] as $action) {?>
						<option value="<?php echo $action['code']?>" <?php if ($buttons[$key]['buttons'][$i]['action']==$action['code']) echo "selected='selected'";?>><?php echo $action['description']?></option>	
					<?php }?>
				</select>
				<span class="form-text text-muted">If action is "-" then button not show</span>
			</div>
			
			<div class="form-group" id="buttons_<?php echo $key?>_buttons_<?php echo $i?>">
				<label>Color and Icon<span class="text-danger">*</span></label>
				<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $buttons[$key]['buttons'][$i]['color_value'];?>">
					<!--begin::Title-->
					<div class="d-flex flex-column flex-grow-1 mr-2">
						<span  class="font-weight-bold font-size-lg mb-1"><ion-icon style="color: <?php echo $buttons[$key]['buttons'][$i]['icon_color_value'];?>" id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon_2" name="<?php echo $buttons[$key]['buttons'][$i]['icon'];?>" size="large"></ion-icon></span>
						
						<input id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon" type="hidden" name="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon" value="<?php echo $buttons[$key]['buttons'][$i]['icon'];?>">
						<input id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon_color" type="hidden" name="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon_color" value="<?php echo $buttons[$key]['buttons'][$i]['icon_color'];?>">
						<input id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon_color_value" type="hidden" name="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon_color_value" value="<?php echo $buttons[$key]['buttons'][$i]['icon_color_value'];?>">
						<input id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_color" type="hidden" name="buttons_<?php echo $key?>_buttons_<?php echo $i?>_color" value="<?php echo $buttons[$key]['buttons'][$i]['color'];?>">
						<input id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_color_value" type="hidden" name="buttons_<?php echo $key?>_buttons_<?php echo $i?>_color_value" value="<?php echo $buttons[$key]['buttons'][$i]['color_value'];?>">


					</div>
					<button id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon_button" icon-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-icons"></i></button>
					<button id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_icon_color_button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fas fa-paint-brush"></i></button>
					<button id="buttons_<?php echo $key?>_buttons_<?php echo $i?>_button_color_button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>
					
				</div>	
			</div>		

		<?php }?>


	</form-tab>
<?php }?>