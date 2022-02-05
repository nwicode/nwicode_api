<?php

/**
	Массив возвращает данные, которые вставляются в код страницы на устройстве.
*/

$component_data = [];

//app.module data
$component_data['app.module.ts'] = [
	"import" => ["import { NgModule} from '@angular/core';","import { BrowserModule } from '@angular/platform-browser';", "import { RouteReuseStrategy } from '@angular/router';","import { IonicModule, IonicRouteStrategy } from '@ionic/angular';","import { AppComponent } from './app.component';","import { AppRoutingModule } from './app-routing.module'; ", "import { TranslateModule, TranslateLoader } from '@ngx-translate/core';", "import {FormsModule, ReactiveFormsModule} from '@angular/forms';"],
	"declarations" => "AppComponent",
	"entryComponents" => "",
	"imports" => ["BrowserModule","IonicModule.forRoot()","AppRoutingModule","TranslateModule.forRoot()", "FormsModule", "ReactiveFormsModule"],
	"providers" => "{ provide: RouteReuseStrategy, useClass: IonicRouteStrategy }",
	"bootstrap" => "AppComponent",
];

//app.component data
$component_data['app.component.ts'] = [
	"import" => ["import { Component } from '@angular/core';","import { Capacitor } from '@capacitor/core';"],
	"variables" => "",
	"constructor_objects" => "",
	"constructor" => "",
	"ngOnInit" => "",
	"ngOnDestroy" => "",
	"ionViewWillEnter" => "",
	"ionViewDidEnter" => "",
	"ionViewWillLeave" => "",
	"ionViewDidLeave" => "",
	"body" => '',
];


//app.component data
$component_data['app.routing-module.ts'] = [
	"{ path: 'network-error', loadChildren: () => import('./network-error/network-error.module').then( m => m.NetworkErrorPageModule)}",
	"{ path: 'application-blocked', loadChildren: () => import('./application-blocked/application-blocked.module').then( m => m.ApplicationBlockedPageModule)}",
	"{ path: 'start', loadChildren: () => import('./start/start.module').then( m => m.StartPageModule)}",
	"{path: '', redirectTo: 'start', pathMatch: 'full'}",
];


//wil be added to all pages
$component_data['*.routing-module.ts'] = [];

//wil be added to all pages
$component_data['*.module.ts'] = [
	"import" => ["import { CommonComponent} from '../CommonComponent';"],
	"declarations" => "",
	"entryComponents" => "",
	"imports" => ["CommonComponent"],
	"providers" => "",
	"bootstrap" => "",
];

//wil be added to all pages
$component_data['*.component.ts'] = [
	"import" => ["import {TranslationService} from './../_services/system/translation.service';", "import {NavigateService} from './../_services/system/navigate.service';", "import {SystemSettingsService} from './../_services/system/system-settings.service';"],
	"variables" => "",
	"constructor_objects" => ["public translationService: TranslationService","public navigateService: NavigateService","public systemSettingsService: SystemSettingsService"],
	"constructor" => "",
	"ngOnInit" => "",
	"ngOnDestroy" => "",
	"ionViewWillEnter" => "",
	"ionViewDidEnter" => "",
	"ionViewWillLeave" => "",
	"ionViewDidLeave" => "",
	"body" => '',
];

?>
