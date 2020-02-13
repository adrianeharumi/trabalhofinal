import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { CelloPage } from './cello.page';

const routes: Routes = [
  {
    path: '',
    component: CelloPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class CelloPageRoutingModule {}
