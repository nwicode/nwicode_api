<?php


	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use App\Models\Application;
	use App\Models\Application_Languages;


	
	
	//get available app languages
	$languages = new Application_Languages();
	$languages->setApplication($component_data['application']);
	$aplication_translations = $languages->getLanguages();
	

	
	//assing translations
	$langs = [];
	$langs_for_json = [];	//for left button multilang strings dialog
	foreach($aplication_translations as $aplication_translation) {
		

		//left button
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['TEXT'])) $langs[$aplication_translation->code]['TEXT'] = $component_data['TRANSLATIONS'][$aplication_translation->code]['TEXT']; else $langs[$aplication_translation->code]['TEXT'] =  "Some text....";
		if (isset($component_data['TRANSLATIONS'][$aplication_translation->code]['TEXT'])) $langs_for_json[$aplication_translation->code] = $component_data['TRANSLATIONS'][$aplication_translation->code]['TEXT']; else $langs_for_json[$aplication_translation->code] =  "Some text....";

	}
?>

 <form id="default_button">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12"><div class="h3">Text settings</div></div>
		</div>
		<div class="row  mt-3 mb-3">
			<div class="col-sm-12"><button id="text-button" string-values='<?php echo json_encode($langs_for_json)?>' text-dialog class="btn btn-warning btn-shadow-hover font-weight-bold mr-2"><i class="fas fa-pen"></i> Change text</button></div>
		</div>

		<?php foreach ($langs as $code=>$item) {?>
		<div class="row">
			<div class="col-sm-12"><div class="h3">[<?php echo $code?>]:</div></div>
			<input type="hidden" name="TRANSLATIONS[<?php echo $code?>][TEXT]" value='<?php echo$item['TEXT']?>'  />
			<div class="col-sm-12 m-2" style="border: 1px solid #ddd" id="TRANSLATIONS_<?php echo $code?>_TEXT"><?php echo$item['TEXT']?></div>
		</div>
		<?php } ?>
 </form>
 <!--end::Form-->


 