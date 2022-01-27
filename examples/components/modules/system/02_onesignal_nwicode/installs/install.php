<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\Application_Languages;
use App\Models\Application_IAP;
use App\Models\Application_Page;


class OneSignalInstall
{
    use HasFactory;
	
	//change one signal ID in app.module
	public function afterAppModuleCreate(Application $app) {
		$app_dir_template = public_path() . '/storage/application/' . $app->id . '-'.$app->unique_string_id.'/sources/src/app/';
		$content = file_get_contents($app_dir_template.'app.component.ts');
		$content = str_replace("{{ONE_SIGNAL_API}}",$app->one_signal_id,$content);
		$content = file_put_contents($app_dir_template.'app.component.ts', $content);
		
	}
	

	
}
