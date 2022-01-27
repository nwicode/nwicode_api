import { Injectable } from '@angular/core';
import { NavController } from '@ionic/angular';

@Injectable({
  providedIn: 'root'
})
export class NavigateService {

  constructor(public navCtrl: NavController) { }

  /**
   * navigate and set root
   * @param page page url
   */
  public topage(page:string) {
    this.navCtrl.navigateRoot(page);
  }


  
  /**
   * navigate forward
   * @param page page url
   */
   public topageforward(page:string) {
    this.navCtrl.navigateForward(page);
  }
  
  /**
   * navigate back
   * @param page page url
   */
   public topageback(page:string) {
    this.navCtrl.navigateBack(page);
  }
}
