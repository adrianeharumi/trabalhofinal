import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';
import { UserService } from '../services/user.service';
import { DomSanitizer, SafeResourceUrl, SafeUrl} from '@angular/platform-browser';

@Component({
  selector: 'app-perfil-professor',
  templateUrl: './perfil-professor.page.html',
  styleUrls: ['./perfil-professor.page.scss'],
})
export class PerfilProfessorPage implements OnInit {
  id;
  teacher;
  user;
  lol;
  url: SafeResourceUrl;
  constructor(public userService: UserService, public route: ActivatedRoute, public router: Router, public sanitizer: DomSanitizer) {
  	  this.id = this.route.snapshot.paramMap.get('id');
  }

  showTeacher(id:any):any{
  	this.userService.showTeacher(id).subscribe( (resposta) =>{
      console.log(resposta);
      this.url = this.sanitizer.bypassSecurityTrustResourceUrl(resposta.teacher.video);
      console.log(this.url);
      this.teacher = resposta.teacher;
      console.log(this.teacher);
  	} );
  }
  contratar(id:any):any{
    if(localStorage.getItem('token') && !(this.user)){
      this.router.navigate(['/contrato', id]);
    }
    if(localStorage.getItem('token') == null){
      this.router.navigate(['/inicio']);
    }


  }
  ngOnInit() {
  }

  home(){
    this.router.navigate(['/tabs/tab1']);
  }

  getDetailsTeacher(){
    let token = localStorage.getItem('token');
    this.userService.getDetailsTeacher(token).subscribe((res)=>{
    if(res == 'Erro de Autorização'){
      this.user = false;
    }
    else{
      this.user =true;
      this.lol = res;
      console.log(this.lol);
    }
    });
}
perfilEditar(){
  this.router.navigate(['editar-perfil-professor']);
}
ionViewWillEnter(){
  this.getDetailsTeacher();
  this.showTeacher(this.id);

}

    previous(instruments:any){
      this.router.navigate(['/instruments/', instruments]);
    }
}
