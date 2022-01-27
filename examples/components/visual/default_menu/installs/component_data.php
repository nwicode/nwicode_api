<?php

$component_data['*.component.ts'] = [
    "import" => "import { MenuController } from '@ionic/angular';",
    "variables" => "public menuItems: any[] = [];",
    "constructor_objects" => "public menu: MenuController",
    "constructor" => "",
    "ngOnInit" => "this.menuItems = this.systemSettingsService.getMenu(); console.log('menu');console.log(this.menuItems);",
    "ngOnDestroy" => "",
    "ionViewWillEnter" => "",
    "ionViewDidEnter" => "",
    "ionViewWillLeave" => "",
    "ionViewDidLeave" => "",
    "body" => "

//call function by name
call_menu_item(item:any) {
	if(~item.indexOf('console.log')) eval(item);
	else eval('this.'+item);
}
",
];
