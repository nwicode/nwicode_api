<?php


	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use App\Models\Application;
	use App\Models\Application_Languages;

	$click_action = "-";
	if (isset($component_data['click_action'])) $click_action = $component_data['click_action'];
	
	$local_url = "";
	if (isset($component_data['local_url'])) $local_url = $component_data['local_url'];	
	
	$local_url_full = "";
	if (isset($component_data['local_url_full'])) $local_url_full = $component_data['local_url_full'];
	
	$remote_url = "";
	if (isset($component_data['remote_url'])) $remote_url = $component_data['remote_url'];
?>

 <form id="default_button">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12"><div class="h3">Image settings</div></div>
		</div>
		<div class="row">
			<div class="row  mt-3 mb-3">
				<div class="col-sm-12"><button id="image-button" gallery-dialog class="btn btn-warning btn-shadow-hover font-weight-bold mr-2"><i class="fas fa-pen"></i> Load image from gallery</button></div>
			</div>
		</div>
		<div class="form-group">
			<label>URL (if image can be load from remote URL)</label>
			<div class="input-group">
				<input type="hidden" class="form-control" id="local_url" name="local_url" value="<?php echo $local_url?>">
				<input type="hidden" class="form-control" id="local_url_full" name="local_url_full" value="<?php echo $local_url_full?>">
				<input type="text" class="form-control" id="remote_url" name="remote_url" value="<?php echo $remote_url?>">
			</div>
		</div>
		
		<div class="form-group">
			<label>Image</label>
			<div class="input-group">
			<?php $use_url = $local_url_full; if ($remote_url!="") $use_url = $remote_url;?>
					<div class="symbol symbol-50 symbol-lg-120">
						<img id="use_url" src="<?php echo $use_url?>">
					</div>
			</div>
		</div>
		
		<div class="form-group">
			<label>Action (on click)<span class="text-danger"></span></label>
			<select class="form-control form-control-solid" name="click_action">
				<option value="-" <?php if ($click_action=="") echo "selected='selected'";?>>-</option>	
				<?php if (isset($component_data['actions'])) foreach($component_data['actions'] as $action) {?>
					<option value="<?php echo $action['code']?>" <?php if ($click_action==$action['code']) echo "selected='selected'";?>><?php echo $action['description']?></option>	
				<?php }?>
			</select>
		</div>
 </form>
 <!--end::Form-->


 