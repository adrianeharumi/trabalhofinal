import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '',
    loadChildren: () => import('./tabs/tabs.module').then(m => m.TabsPageModule)
  },  {
    path: 'cello',
    loadChildren: () => import('./cello/cello.module').then( m => m.CelloPageModule)
  },
  {
    path: 'perfil-professor',
    loadChildren: () => import('./perfil-professor/perfil-professor.module').then( m => m.PerfilProfessorPageModule)
  }

  
];
@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
