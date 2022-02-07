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
	
?>
<div style="left: <?php echo $component_data['component']['x0']?>px; top: <?php echo $component_data['component']['y0']?>px; height: <?php echo $component_data['component']['height']?>px; width: <?php echo $component_data['component']['width']?>px; " id="simple_image_<?php echo $component_data['page_component_id']?>" class="component-resizeble-hv component-draggable component_inner_wrapper <?php echo $component_data['component']['css_class']?>" <?php if (isset($component_data['page_component_id'])) {?>component-id="<?php echo $component_data['page_component_id']?>"<?php } ?>>
	<ion-img src="<?php echo $use_url?>"></ion-img>
	
</div>