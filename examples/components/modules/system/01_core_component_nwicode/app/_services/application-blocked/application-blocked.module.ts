import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ApplicationBlockedPageRoutingModule } from './application-blocked-routing.module';
import { CommonComponent} from '../CommonComponent';
import { ApplicationBlockedPage } from './application-blocked.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CommonComponent,
    ApplicationBlockedPageRoutingModule
  ],
  declarations: [ApplicationBlockedPage]
})
export class ApplicationBlockedPageModule {}
