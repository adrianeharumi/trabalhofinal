import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { CelloPageRoutingModule } from './cello-routing.module';

import { CelloPage } from './cello.page';

import { ProfessoresComponent } from '../professores/professores.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CelloPageRoutingModule
  ],
  declarations: [CelloPage,ProfessoresComponent]
})
export class CelloPageModule {}
