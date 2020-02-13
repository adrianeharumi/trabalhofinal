import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { EditarPerfilProfessorPageRoutingModule } from './editar-perfil-professor-routing.module';

import { EditarPerfilProfessorPage } from './editar-perfil-professor.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    IonicModule,
    EditarPerfilProfessorPageRoutingModule
  ],
  declarations: [EditarPerfilProfessorPage]
})
export class EditarPerfilProfessorPageModule {}
