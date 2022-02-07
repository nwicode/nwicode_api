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
	
	$use_url = $local_url_full; if ($remote_url!="") $use_url = $remote_url;
	
	//set button actions variable
	if (isset($component_data['actions']) && isset($component_data['click_action']))  {
		foreach ($component_data['actions'] as $action) {
			if ($action['code']==$component_data['click_action']) $click_action=$action['angular'];
		}
	}	
	
?>
<div style="left: <?php echo $component_data['component']['x0']?>px; top: <?php echo $component_data['component']['y0']?>px; height: auto; width: 100%; " id="simple_image_<?php echo $component_data['page_component_id']?>" class="component-resizeble-hv component-draggable component_inner_wrapper <?php echo $component_data['component']['css_class']?>" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
	<ion-img src="<?php echo $use_url?>" <?php if ($click_action!="-") echo '(click)="'.$click_action.'"'; ?>></ion-img>
	
</div>

