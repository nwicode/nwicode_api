import { Component, Input, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';

@Component({
  selector: 'app-one-signal-push-modal',
  templateUrl: './one-signal-push-modal.page.html',
  styleUrls: ['./one-signal-push-modal.page.scss'],
})
export class OneSignalPushModalPage implements OnInit {


  // Data passed in by componentProps
  @Input() text: string;
  @Input() title: string;
  @Input() img: string;

  constructor(private _modal: ModalController) { }

  ngOnInit() {

  }

  closeModal() {
    
    this._modal.dismiss();
  }
}
