<?php



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\Application_Languages;
use App\Models\Application_IAP;
use App\Models\Application_Page;


class CrashlyticsInstall
{
    use HasFactory;
	
	//run after creating app.modulete.ts and app.component.ts
	public function afterAppModuleCreate(Application $app) {
		echo "afterAppModuleCreate fired on " . $app->name ."\n";
	}
	
	//run after copy /app folder to project
	public function afterCopyComponentSources(Application $app) {
		echo "afterCopySources fired on " . $app->name ."\n";
	}
	
	//run after add dependencies and devdependencies to package.json
	public function afterAddDependencies(Application $app) {
		echo "afterAddDependencies fired on " . $app->name ."\n";
	}
	
	//run after create google json file and plist.info file
	public function afterSaveFirebaseFiles(Application $app) {
		echo "afterSaveFirebaseFilesfired on " . $app->name ."\n";
	}
	
	//run after npm install
	public function afterInstallNpmDependencies(Application $app) {
		echo "afterInstallNpmDependencieson " . $app->name ."\n";
	}


}
