<?php

$component_data['*.component.ts'] = [
    "import" => "import {ContentService} from './../_services/system/content.service'",
    "variables" => "/*simple_list_variable*/",
    "constructor_objects" => "public contentService:ContentService",
    "constructor" => "",
    "ngOnInit" => "/*simple_list_load_function*/",
    "ngOnDestroy" => "",
    "ionViewWillEnter" => "",
    "ionViewDidEnter" => "",
    "ionViewWillLeave" => "",
    "ionViewDidLeave" => "",
    "body" => "

/*load simple list component*/
load_simple_list(list_content_id:any, list_id:any, sort_field:string, sort_direction:string,limit:number = 0, store_first:string = 'no') {
	this.contentService.loadList(list_content_id, sort_field, sort_direction, limit).then (result =>{
		this['simple_list_'+list_id] = result;
		this['simple_list_loaded_'+list_id] = true;
		console.log(this['simple_list_'+list_id]);
		if (store_first=='yes') this.contentService.setCurrentContent('content_type_'+list_content_id, this['simple_list_'+list_id][0]);
	}).catch(err=> {
		console.error('load_simple_list error, list_content_id:'+list_content_id+', list_id:'+list_id);
		console.error(err);
	})
}	
	
	",
];
