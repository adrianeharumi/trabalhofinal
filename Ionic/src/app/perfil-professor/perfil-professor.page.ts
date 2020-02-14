import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';
import { UserService } from '../services/user.service';

@Component({
  selector: 'app-perfil-professor',
  templateUrl: './perfil-professor.page.html',
  styleUrls: ['./perfil-professor.page.scss'],
})
export class PerfilProfessorPage implements OnInit {
  id;
  teacher;
  user;
  constructor(public userService: UserService, public route: ActivatedRoute, public router: Router) {
  	  this.id = this.route.snapshot.paramMap.get('id');
  }

  showTeacher(id:any):any{
  	this.userService.showTeacher(id).subscribe( (resposta) =>{
      console.log(resposta);
      this.teacher = resposta.teacher;
      console.log(this.teacher)
  	} );
  }
  contratar(id:any):any{
    if(localStorage.getItem('token')){
      this.router.navigate(['/contrato', id]);
    }
    if(localStorage.getItem('token') == null){
      this.router.navigate(['/inicio']);
    }

  }
  ngOnInit() {
  }
  ionViewWillEnter(){
    this.showTeacher(this.id);
    console.log(this.id);
  }
}
