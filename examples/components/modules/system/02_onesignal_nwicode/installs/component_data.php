<?php

/**
	Массив возвращает данные, которые вставляются в код страницы на устройстве.
*/

$component_data = [];
 
//app.module data
$component_data['app.module.ts'] = [
	"import" => "",
	"declarations" => "",
	"entryComponents" => "",
	"imports" => "",
	"imports_after" => "",
	"providers" => "",
	"bootstrap" => "",
];

//app.component data
$component_data['app.component.ts'] = [
	"import" => ["import { ModalController } from '@ionic/angular';","import OneSignal from 'onesignal-cordova-plugin'","import {OneSignalPushModalPage} from './_services/onesignal/one-signal-push-modal/one-signal-push-modal.page';"],
	"constructor_objects" => "private modalController: ModalController",
	"constructor" => "if (Capacitor.getPlatform()!='web') this.OneSignalInit();  else console.log('Platform is WEB - OneSignal not started');",
	"variables" => "",
	"ngOnInit" => "",
	"ngOnDestroy" => "",
	"ionViewWillEnter" => "",
	"ionViewDidEnter" => "",
	"ionViewWillLeave" => "",
	"ionViewDidLeave" => "",
	"body" => '


  //Call this function when your app starts
  OneSignalInit() {
    let _this = this;
    OneSignal.setAppId("fccc6b2a-231e-4ec4-bbe4-d0eab9c78496");
    OneSignal.setNotificationOpenedHandler(function (jsonData){
      console.log("setNotificationOpenedHandler fired");
      //console.log(jsonData);
      //_this.notificationOpenedCallback(jsonData);
      _this.openPushModalDefault(jsonData.notification.title,jsonData.notification.body,"").then( _modal =>{
        _modal.present();
      });
    });
    OneSignal.setNotificationWillShowInForegroundHandler(function (jsonData:any){
      //_this.notificationOpenedCallback(jsonData);
      console.log("setNotificationWillShowInForegroundHandler fired");
      //console.log(jsonData);
      _this.openPushModalDefault(jsonData.notification.title,jsonData.notification.body,"").then( _modal =>{
        _modal.present();
      });
    });
  }	
	
	    // Callback triggered on notification opens
  public notificationOpenedCallback(jsonData) {
     //console.log(">>> notificationOpenedCallback: " + JSON.stringify(jsonData));   
  };


  //open modal on push
  openPushModalDefault(title:string, text:string,img?:string){
    const modal = this.modalController.create({
      component: OneSignalPushModalPage,
      cssClass: "one-signal-push-modal-class",
      componentProps: {
        "title": title,
        "text": text,
        "img": img,
      }
    });
    return modal;
  }	
	
	',
];



?>