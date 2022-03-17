import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { Http, HttpHeaders, HttpOptions } from '@capacitor-community/http';
import  { from, Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class RequestWrapperService {

  constructor() { }

  public get(route:string, data:any) {
    let new_data = data;
    new_data.sb = environment.appId;  
    let httpOptions: HttpOptions = {
      url: environment.api + route,
      method: 'GET',
      //responseType: 'json',
      params: new_data,      
    };
    
    return from(Http.get(httpOptions));
  }


  public post(route:string, data:any = {}):Observable<any> {
    let new_data = data;
    new_data.sb = environment.appId;
    let httpOptions: HttpOptions = {
      url: environment.api + route,
      method: 'POST',
      data: new_data,
      responseType: "json",
      headers: { 'Content-Type': 'application/json' }
    };
    return from(Http.request(httpOptions));    
  }

}
