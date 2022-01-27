import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { OneSignalPushModalPageRoutingModule } from './one-signal-push-modal-routing.module';

import { OneSignalPushModalPage } from './one-signal-push-modal.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    OneSignalPushModalPageRoutingModule
  ],
  declarations: [OneSignalPushModalPage]
})
export class OneSignalPushModalPageModule {}
