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
  constructor(public user: UserService, public route: ActivatedRoute) {
  	  this.id = this.route.snapshot.paramMap.get('id');
  }

  showTeacher(id:any):any{
  	this.user.showTeacher(id).subscribe( (resposta) =>{
      console.log(resposta);
      this.teacher = resposta.teacher;
      console.log(this.teacher)
  	} );
  }
  contrato(id:any):any{
    this.router.navigate(['/contrato', id]);
  }
  ngOnInit() {
  }
  ionViewWillEnter(){
    this.showTeacher(this.id);
    console.log(this.id);
  }
}
