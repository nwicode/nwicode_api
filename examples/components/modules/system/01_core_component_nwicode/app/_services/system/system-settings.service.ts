import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import {RequestWrapperService} from './request-wrapper.service';
import { Observable, Subject } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class SystemSettingsService {


  // settings load error
  private settingsLoadError = new Subject<any>();

  // if application was blocked
  private appWasBlocked = new Subject<any>();
  
  
  constructor(private requestWrapperService: RequestWrapperService) { }


  /**
   * Error load settings event
   * @returns Observable
   */
   settingsLoadErrorEvent(): Observable<any> {
    return this.settingsLoadError.asObservable();
  }  

  /**
   * Load systems settins from core
   */
  public async loadSystemSettings() {
    let result = null;
    try {
      let response = await this.requestWrapperService.post("settings",{}).toPromise();
      localStorage.setItem("app_"+environment.appId+"_settings",JSON.stringify(response.data));
      result = response.data;
    } catch (err) {
      console.log("CORE FAULT! loadSystemSettings error!");
      this.settingsLoadError.next(err);
    }
    return result;
  }


  /**
   * get system settigns from local storage
   * @returns system settings or null
   */
  public getSettings() {
    let settings = JSON.parse(localStorage.getItem("app_"+environment.appId+"_settings"));
    return settings;
  }

  /**
   * get system menu
   */
  public getMenu() {
    let data = JSON.parse(localStorage.getItem("app_"+environment.appId+"_settings"));
    return data.settings.menu;
  }
}
