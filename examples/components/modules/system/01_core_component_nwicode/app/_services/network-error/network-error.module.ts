import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { NetworkErrorPageRoutingModule } from './network-error-routing.module';
import { CommonComponent} from '../CommonComponent';
import { NetworkErrorPage } from './network-error.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CommonComponent,
    NetworkErrorPageRoutingModule
  ],
  declarations: [NetworkErrorPage]
})
export class NetworkErrorPageModule {}
