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

	$visibility_conditions = [];

	$languages = new Application_Languages();
	$languages->setApplication($component_data['application']);
	foreach($languages->getLanguages() as $language) {
		$visibility_conditions[] = [
			"code" =>"is_language_".$language->code,
			"angular" =>"translationService.is_language('".$language->code."')",
			"description"=>"If current language is".$language->name
		];
	}

    return $visibility_conditions;
