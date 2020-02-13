import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { EditarPerfilProfessorPage } from './editar-perfil-professor.page';

const routes: Routes = [
  {
    path: '',
    component: EditarPerfilProfessorPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class EditarPerfilProfessorPageRoutingModule {}
