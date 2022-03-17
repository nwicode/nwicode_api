import { Injectable } from '@angular/core';
import {TranslateService} from '@ngx-translate/core';
import { environment } from 'src/environments/environment';
import {SystemSettingsService} from "./system-settings.service";
import { NavController } from '@ionic/angular';
import { DomSanitizer } from '@angular/platform-browser';

@Injectable({
  providedIn: 'root'
})
export class TranslationService {

  public showLanguagesList:boolean = false;

  constructor(private nav: NavController, private systemSettingsService:SystemSettingsService, private translate: TranslateService, private sanitizer:DomSanitizer) { }


  /**
   * Set default application language
   */
  public setDefaultLanguage() {
    //try to get stored def language
    let default_language = localStorage.getItem("app_"+environment.appId+"_default_language");
    console.log("app default language:");
    console.log(default_language);
    if (default_language !== null && typeof default_language!== undefined && default_language!== 'undefined') {
      console.log("app default language:");
      this.translate.setDefaultLang(default_language);
      this.translate.use(default_language);
    } else {
      console.log("app default language not set");
      let settings = this.systemSettingsService.getSettings();
      if (settings!==null && typeof settings!= 'undefined') {
        console.log("set default language from settings");
        console.log(settings); 
        this.translate.setDefaultLang(settings.settings.default_language);
        this.translate.use(settings.settings.default_language);
        localStorage.setItem("app_"+environment.appId+"_default_language",settings.settings.default_language);
      } else {
        this.translate.setDefaultLang("en");
        this.translate.use("en");
        localStorage.setItem("app_"+environment.appId+"_default_language","en");
      }
    }

  }


  /**
   * Set current language
   * @param lang language code
   */
  public setCurrentLanguage(lang:string) {
    localStorage.setItem("app_"+environment.appId+"_default_language",lang);
    this.translate.setDefaultLang(lang);
    this.translate.use(lang);    
  }


  /**
   * Translate key to current language
   * @param key key
   * @param params additional params with variables
   * @returns string
   */
   public translatePhrase(key:string, params = []) {
    let s = this.translate.instant(key);
    return s;
  }

  /**
   * 
   * @returns languages list
   */
  public getLanguagesList() {
    let result = [];
    let data = this.systemSettingsService.getSettings();
    data.settings.languages.forEach(language => {
      let item:any = {
        code: language.language,
        text: 'LANGUAGE_'+language.language.toUpperCase()
      }
      result.push(item);
    });
    return result;
  }

  /**
   * Set current language
   * @param lang language code
   */
   public changeLanguageTo(lang:string) {
    localStorage.setItem("app_"+environment.appId+"_default_language",lang);
    this.translate.setDefaultLang(lang);
    this.translate.use(lang);
    this.showLanguagesList = false;
    this.nav.navigateRoot("/"); 
  }



    /**
   * Translate key to current language with HTML tags
   * @param key key
   * @param params additional params with variables
   * @returns string
   */
     public translatePhraseHTML(key:string, params:any) {
      let s = this.translate.instant(key);

      for (var key in params) {
        if (!params.hasOwnProperty(key)) {
            continue;
        }
      
          s = s.replace(key, params[key]);
      }

      return this.sanitizer.bypassSecurityTrustHtml(s);
    }
}
