<?php


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Colors;
use App\Models\Application_Page;
use App\Models\Application_Languages;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


$actions = [];

//navigate actions
$pages = Application_Page::where("app_id",$component_data['application']->id)->where("type",'!=',"start")->get();
foreach($pages as $page) {
    $actions[] = [
        "code" =>"gotopageforward.page".$page->id,
        "angular" =>"navigateService.topageforward('page".$page->id."')",
        "description"=>"Go to Page ".$page->name ." (forward)"
    ];
    $actions[] = [
        "code" =>"gotopageback.page".$page->id,
        "angular" =>"navigateService.topageback('page".$page->id."')",
        "description"=>"Go to Page ".$page->name ." (back)"
    ];
    $actions[] = [
        "code" =>"gotopage.page".$page->id,
        "angular" =>"navigateService.topage('page".$page->id."')",
        "description"=>"Go to Page ".$page->name ." (and set as ROOT)"
    ];
}


//Open translate popover
$actions[] = [
        "code" =>"languagePopover",
        "angular" =>"translationService.showLanguagesList = true",
        "description"=>"Show language switcher"
];

$languages = new Application_Languages();
$languages->setApplication($component_data['application']);
foreach($languages->getLanguages() as $language) {
    $actions[] = [
        "code" =>"languageSwitchTo_".$language->code,
        "angular" =>"translationService.changeLanguageTo('".$language->code."')",
        "description"=>"Change language to ".$language->name
    ];
}

?>