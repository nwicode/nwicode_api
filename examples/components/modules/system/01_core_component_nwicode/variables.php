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

	$variables = [];
	
	$variables[] = [
        "code" =>"[@appName]",
        "angular" =>"systemSettingsService.getAppName()",
        "description"=>"Application name"
    ];	 
	
	$variables[] = [
        "code" =>"[@appVersion]",
        "angular" =>"systemSettingsService.getAppVersion()",
        "description"=>"Application version"
    ];

    return $variables;