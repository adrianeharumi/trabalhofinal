import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { CelloPageRoutingModule } from './cello-routing.module';

import { CelloPage } from './cello.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CelloPageRoutingModule
  ],
  declarations: [CelloPage]
})
export class CelloPageModule {}
