import { Component, OnInit } from '@angular/core';
import {SystemSettingsService} from "./../_services/system/system-settings.service";


@Component({
  selector: 'app-network-error',
  templateUrl: './network-error.page.html',
  styleUrls: ['./network-error.page.scss'],
})
export class NetworkErrorPage implements OnInit {

  loaded: boolean = false;
  has_translation: boolean = false;
  constructor(private systemSettingsService:SystemSettingsService, ) { }

  ngOnInit() {

    //try to load settings
    this.systemSettingsService.loadSystemSettings().then ((data)=>{
    
      if (data!=null) this.has_translation = true; else this.has_translation = false;
      this.loaded = true;
    });
  }

}
