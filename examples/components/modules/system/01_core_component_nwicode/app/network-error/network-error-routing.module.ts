import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { NetworkErrorPage } from './network-error.page';

const routes: Routes = [
  {
    path: '',
    component: NetworkErrorPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class NetworkErrorPageRoutingModule {}
