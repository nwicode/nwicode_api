import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import {RequestWrapperService} from './request-wrapper.service';
import { Observable, Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ContentService {

  public lists:any[] = [];
  private listActionSubject = new Subject<any>();  

  constructor(private requestWrapperService: RequestWrapperService) { }

  

  /**
   * Get content from system
   * @param list_id Content ID
   * @param start Start position
   * @param limit Limit
   * @param order order
   * @param sort order
   */
  public getList(list_id:any, start:number = 0, limit:number = 20, order:any = "", sort:any = "") {

  }


  public async getDynamicConent(list_id:any) {
    console.log(list_id);
    //let result = await this.loadList(list_id);
    //console.log(result);
    return [];
  }

  public async loadList(list_id:any, sort_field:string="", sort_direction:string="ASC", limit:any = "0"):Promise<any> {

    let promise = new Promise( (resolve,reject)=>{

      let response = this.requestWrapperService.post("loadList",{list_id:list_id,sort_field:sort_field,sort_direction:sort_direction,limit:limit}).toPromise().then( data =>{
        resolve (data.data);
      })

    })
    return promise;
  }
  


  /**
   * On current content change
   * @returns Observable
   */
   onCurrentContentChange(): Observable<any> {
    return this.listActionSubject.asObservable();
  }

/**
 * Call change current content event
 * @param content_id content identificator
 * @param item current item
 */

  public currentContentChange(content_id:string,item:any) {
    this.listActionSubject.next({content_id:content_id, item:item});
    this[content_id] = item;
  }
  
  
  
  /**
   * Store current content in localstorage with identificator
   * @param content_id content identifer
   * @param item current item
   */
  public setCurrentContent(content_id:string,item:any) {
    console.log("Store content to storag: "+content_id);
    console.log(item);
    localStorage.setItem("app_"+environment.appId+"_current_content_"+content_id,JSON.stringify(item));
    this.currentContentChange(content_id,item);
  }


  /**
   * Get current content from localstorage by identificator
   * @param content_id content identifer
   */
  public getCurrentContent(content_id:string) {

    if (this[content_id]!==undefined) {
      console.log("get stored content "+content_id+" from this variable");
      //console.log(this[content_id]);
      return this[content_id];
    } else {

      console.log("get stored content "+content_id+" from localstorage");
      let result = localStorage.getItem("app_"+environment.appId+"_current_content_"+content_id);
      //console.log(result);
      //console.log("app_"+environment.appId+"_current_content_"+content_id);
      if (result!==null) {
        this[content_id] = JSON.parse(result);
        return JSON.parse(result); 
      } else return null; 
    }
  }


}
