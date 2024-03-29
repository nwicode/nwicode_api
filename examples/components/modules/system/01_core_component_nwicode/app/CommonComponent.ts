/***
 * Общий модуль для подключения остальных модулей
 */

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { TranslateLoader, TranslateModule } from '@ngx-translate/core';
import { ReplacePipe } from './_services/pipes/replace.pipe';

@NgModule({
  imports: [
    CommonModule,
    RouterModule,
    TranslateModule
  ],
  declarations: [ReplacePipe],
  exports: [TranslateModule,ReplacePipe],
  providers: []
})
export class CommonComponent {


}