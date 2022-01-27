import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ApplicationBlockedPage } from './application-blocked.page';

const routes: Routes = [
  {
    path: '',
    component: ApplicationBlockedPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ApplicationBlockedPageRoutingModule {}
