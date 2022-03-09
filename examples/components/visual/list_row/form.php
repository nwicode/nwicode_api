<?php


	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use App\Models\Application;
	use App\Models\Application_Languages;
	use App\Models\ApplicationContentType;


	$content_type = "-";
	if (isset($component_data['content_type'])) $content_type = $component_data['content_type'];

	$title_column_name = "-";
	if (isset($component_data['title_column_name'])) $title_column_name = $component_data['title_column_name'];
	
	$subtitle_column_name = "-";
	if (isset($component_data['subtitle_column_name'])) $subtitle_column_name = $component_data['subtitle_column_name'];

	$preview_column_name = "-";
	if (isset($component_data['preview_column_name'])) $preview_column_name = $component_data['preview_column_name'];

	$image_column_name = "-";
	if (isset($component_data['image_column_name'])) $image_column_name = $component_data['image_column_name'];
	
	$visibility_column_name = "-";
	if (isset($component_data['visibility_column_name'])) $visibility_column_name = $component_data['visibility_column_name'];
	
	$sort_column_name = "-";
	if (isset($component_data['sort_column_name'])) $sort_column_name = $component_data['sort_column_name'];

	$note_column_name = "-";
	if (isset($component_data['note_column_name'])) $note_column_name = $component_data['note_column_name'];
	
	$rows_count = "20";
	if (isset($component_data['rows_count'])) $rows_count = $component_data['rows_count'];


	$sort_direction = "ASC";
	if (isset($component_data['sort_direction'])) $sort_direction = $component_data['sort_direction'];
	
	$image_type = "thumbnail";
	if (isset($component_data['image_type'])) $image_type = $component_data['image_type'];

	$store_first = "yes";
	if (isset($component_data['store_first'])) $store_first = $component_data['store_first'];


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

	

	//get content list and types
	$content_types_all = [];
	foreach (ApplicationContentType::where('app_id', $component_data['application']->id)->get() as $c) {
		
		$fields = ApplicationContentType::getContentTypeFields($c->id);
		$content_types_all[] = ["name"=>$c->name, "id"=>$c->id, 'fields'=>$fields];
	}
	
	//current content
	$fieds = [];
	$fieds[]= ["field"=>"-","name"=>"-"];
	if ($content_type!="" && $content_type!="") {
		foreach($content_types_all as $c) {
			if ($c['id']==$content_type) {
				
				//fill current fields
				foreach($c['fields'] as $field) {
					$fieds[]= ["field"=>$field->db_field,"name"=>$field->name];
				}
				
			}
		}
	}
	
	$button_action = "-";
	if (isset($component_data['button_action'])) $button_action = $component_data['button_action'];
	//print_r($fieds);
?>

	<form-tab name="List data bindings">
	<div class="form-group">
			<label>Choose content<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="content_type" id="content_type" onchange='selectContent(this.value,<?php echo json_encode($content_types_all); ?>)'>
				<option value="-" <?php if ($content_type=="-") echo "selected='selected'";?>>-</option>	
				<?php if (isset($content_types_all)) foreach($content_types_all as $content_types) {?>
					<option value="<?php echo $content_types['id']?>" <?php if ($content_types['id']==$content_type) echo "selected='selected'";?>><?php echo $content_types['name']?></option>	
				<?php }?>
			</select>
		</div>
		
		<div class="form-group">
			<label>Item title source<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="title_column_name" id="title_column_name">
				<?php if (isset($fieds)) foreach($fieds as $fied) {?>
					<option value="<?php echo $fied['field']?>" <?php if ($fied['field']==$title_column_name) echo "selected='selected'";?>><?php echo $fied['name']?></option>	
				<?php }?>
			</select>
		</div>
		
		<div class="form-group">
			<label>Item subtitle source<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="subtitle_column_name" id="subtitle_column_name">
				<?php if (isset($fieds)) foreach($fieds as $fied) {?>
					<option value="<?php echo $fied['field']?>" <?php if ($fied['field']==$subtitle_column_name) echo "selected='selected'";?>><?php echo $fied['name']?></option>	
				<?php }?>			
			</select>
		</div>
		
		<div class="form-group">
			<label>Item preview source<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="preview_column_name" id="preview_column_name">
				<?php if (isset($fieds)) foreach($fieds as $fied) {?>
					<option value="<?php echo $fied['field']?>" <?php if ($fied['field']==$preview_column_name) echo "selected='selected'";?>><?php echo $fied['name']?></option>	
				<?php }?>			
			</select>
		</div>
		
		<div class="form-group">
			<label>Item icon<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="image_column_name" id="image_column_name">
				<?php if (isset($fieds)) foreach($fieds as $fied) {?>
					<option value="<?php echo $fied['field']?>" <?php if ($fied['field']==$image_column_name) echo "selected='selected'";?>><?php echo $fied['name']?></option>	
				<?php }?>			
			</select>
		</div>
		
		<div class="form-group">
			<label>Item note<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="note_column_name" id="note_column_name">
				<?php if (isset($fieds)) foreach($fieds as $fied) {?>
					<option value="<?php echo $fied['field']?>" <?php if ($fied['field']==$note_column_name) echo "selected='selected'";?>><?php echo $fied['name']?></option>	
				<?php }?>			
			</select>
		</div>
	</form-tab>

	<form-tab name="Filters and limits">
		
		<div class="form-group">
			<label>Item visible if this field not empty<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="visibility_column_name" id="visibility_column_name">
				<?php if (isset($fieds)) foreach($fieds as $fied) {?>
					<option value="<?php echo $fied['field']?>" <?php if ($fied['field']==$visibility_column_name) echo "selected='selected'";?>><?php echo $fied['name']?></option>	
				<?php }?>			
			</select>
		</div>	
		
		<div class="form-group">
			<label>Rows count<span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="rows_count" name="rows_count" value="<?php echo $rows_count?>">
			</select>
		</div>
	</form-tab>

	<form-tab name="Image settings">
		
		<div class="form-group">
			<label>Image type<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="image_type" id="image_type">
			<option value="thumbnail" <?php if ($image_type=="thumbnail") echo "selected";?>>Square</option>
			<option value="avatar" <?php if ($image_type=="avatar") echo "selected";?>>Round</option>
			</select>
		</div>	
	</form-tab>

	<form-tab name="Sorting">

		<div class="form-group">
			<label>Sort field<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="sort_column_name" id="sort_column_name">
				<?php if (isset($fieds)) foreach($fieds as $fied) {?>
					<option value="<?php echo $fied['field']?>" <?php if ($fied['field']==$sort_column_name) echo "selected='selected'";?>><?php echo $fied['name']?></option>	
				<?php }?>			
			</select>
		</div>
		
		<div class="form-group">
			<label>Sort direction<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="sort_direction" id="sort_direction">
			<option value="ASC" <?php if ($sort_direction=="ASC") echo "selected";?>>Ascending</option>
			<option value="DESC" <?php if ($sort_direction=="DESC") echo "selected";?>>Descending</option>
			</select>
		</div>		
	
	</form-tab>

	<form-tab name="Divider settings">
		<div class="form-group">
			<label>Divider type<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="divider_type" id="divider_type">
			<option value="full" <?php if ($divider_type=="full") echo "selected";?>>Full</option>
			<option value="inset" <?php if ($divider_type=="inset") echo "selected";?>>Inset</option>
			<option value="none" <?php if ($divider_type=="none") echo "selected";?>>None</option>
			</select>
		</div>	
		
        <div class="form-group" id="divider-color-block">
            <div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo $divider_color_value;?>">
                <!--begin::Title-->
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <span class="font-weight-bold font-size-lg mb-1 text-color-block">Divider color</span>
                </div>
                <input type="hidden" name="divider_color" value="<?php echo $divider_color;?>" class="line_color">
                <input type="hidden" name="divider_color_value" value="<?php echo $divider_color_value;?>" class="line_color">
                <button id="divider-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>
            </div>
        </div>
		</form-tab>
		<form-tab name="Item settings">
		<?php foreach ($text_fields as $text_field) {?>
		<?php $code = $text_field['code'];?>

			<div class="row pt-3">
				<div class="col-sm-12"><div class="h3"><?php echo $text_field['name']?></div></div>
			</div>
			<div class="separator separator-solid separator-border-1 separator-dark"></div>
			
			<div class="form-group">
				<label><?php echo $text_field['name']?> wrap<span class="text-danger">*</span></label>
				<select class="form-control form-control-solid" name="<?php echo $text_field['code']?>_wrap" id="<?php echo $text_field['code']?>_wrap">
				<option value="wrap" <?php if (${$code."_wrap"}=="wrap") echo "selected";?>>Wrap text</option>
				<option value="none" <?php if (${$code."_wrap"}=="none") echo "selected";?>>No wrap text</option>
				</select>
			</div>			
			<div class="form-group">
				<label><?php echo $text_field['name']?> font bold<span class="text-danger">*</span></label>
				<select class="form-control form-control-solid" name="<?php echo $text_field['code']?>_bold" id="<?php echo $text_field['code']?>_bold">
				<option value="yes" <?php if (${$code."_bold"}=="yes") echo "selected";?>>Yes</option>
				<option value="no" <?php if (${$code."_bold"}=="no") echo "selected";?>>No</option>
				</select>
			</div>	
			<div class="row">
				<div class="form-group col-sm-10">
					<label>Font size<span class="text-danger">*</span></label>
					<input type="range" class="form-control" name="<?php echo $code."_font_size"?>" min="5" max="30" value="<?php echo ${$code."_font_size"}?>" step="1" />
				</div>

				<div class="col-sm-2">
					<span class="label label-rounded label-primary label-pill label-inline align-middle m-auto "><span class="<?php echo $code."_font_size"?>_value"></span>px</span>
				</div>
			</div>		

			<div class="form-group" id="<?php echo $code;?>-color-block">
				<div class="d-flex align-items-center mb-9 rounded p-2 pl-5 pr-5 color-block" style="background-color: <?php echo ${$code."_color_value"};?>">
					<!--begin::Title-->
					<div class="d-flex flex-column flex-grow-1 mr-2">
						<span class="font-weight-bold font-size-lg mb-1 text-color-block"><?php echo $text_field['name']?> color</span>
					</div>
					<input type="hidden" name="<?php echo $code."_color";?>" value="<?php echo ${$code."_color"};?>" class="line_color">
					<input type="hidden" name="<?php echo $code."_color";?>_value" value="<?php echo ${$code."_color_value"};?>" class="line_color">
					<button id="<?php echo $code;?>-color-button" color-dialog class="btn btn-icon btn-warning btn-xs mr-2"><i class="fa fa-fill-drip"></i></button>
				</div>
			</div>			
		
		<?php }?>
	</form-tab>

	<form-tab name="Click action">
		<div class="form-group">
			<label>Action<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="button_action">
				<option value="-" <?php if ($button_action=="") echo "selected='selected'";?>>-</option>	
				<?php if (isset($component_data['actions'])) foreach($component_data['actions'] as $action) {?>
					<option value="<?php echo $action['code']?>" <?php if ($button_action==$action['code']) echo "selected='selected'";?>><?php echo $action['description']?></option>	
				<?php }?>
			</select>
		</div>	


		<div class="form-group">
			<label>Store first item in app<span class="text-danger">*</span></label>
			<select class="form-control form-control-solid" name="store_first" id="store_first">
			<option value="yes" <?php if ($store_first=="yes") echo "selected";?>>Yes</option>
			<option value="no" <?php if ($store_first=="no") echo "selected";?>>No</option>
			</select>
		</div>

	</form-tab>

 <!--end::Form-->


 