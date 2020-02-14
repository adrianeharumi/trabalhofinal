import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { IonSlides } from '@ionic/angular';
import {Router} from '@angular/router';
import { UserService } from '../services/user.service';

@Component({
  selector: 'app-editar-perfil-professor',
  templateUrl: './editar-perfil-professor.page.html',
  styleUrls: ['./editar-perfil-professor.page.scss'],
})
export class EditarPerfilProfessorPage implements OnInit {

  // @ViewChild('slides', {static: true}) slides: IonSlides;

	editForm: FormGroup;
  teacher;
  name;
  email;
  id;
  CPF;
  birth;
  number;
  district;
  zone;
  certification;
  instruments;
  lesson_price;
  rent_price;
  video;
  owner_name;
  bank;
  agency;
  account;
  photo;
  constructor(public formbuilder: FormBuilder, public router: Router, public userService:UserService ) {
    let user = localStorage.getItem('token');

    this.getUser(user);
    this.editForm = this.formbuilder.group({
      name: [this.name],
      email:[this.email],
      CPF:[this.CPF],
      birth:[this.birth],
      number:[this.number],
      district: [this.district],
      zone: [this.zone],
      certification: [this.certification],
      instruments: [this.instruments],
      lesson_price: [this.lesson_price],
      rent_price: [this.rent_price],
      video:[this.video],
  		owner_name: [this.owner_name],
  		bank:[this.bank],
  		agency: [this.agency],
      account: [this.account],
  	});

  }

  ngOnInit() {
  }
  getUser(token:any):any{
    this.userService.getDetailsTeacher(token).subscribe((res)=>{
        this.teacher = res;
        console.log(this.teacher);
        this.name = this.teacher.usuario.name;
        this.email =this.teacher.usuario.email;
        this.birth = this.teacher.usuario.birth;
        this.CPF = this.teacher.usuario.CPF;
        this.number = this.teacher.usuario.number;
        this.zone = this.teacher.professor.zone;
        this.certification = this.teacher.professor.certification;
        this.lesson_price = this.teacher.professor.lesson_price;
        this.rent_price = this.teacher.professor.rent_price;
        this.video = this.teacher.professor.video;
        this.account = this.teacher.professor.account;
        this.agency = this.teacher.professor.agency;
        this.bank = this.teacher.professor.bank;
        this.owner_name = this.teacher.professor.owner_name;
        this.photo =this.teacher.professor.photo;
        this.id = this.teacher.professor.id;
      });
  }
  submit(form){
    console.log(form);
    console.log(form.value);
    let token = localStorage.getItem('token');
    this.userService.updateStudent(token, form.value).subscribe((res)=>{
      console.log(res);
    });
    this.router.navigate(['/tabs/tab1']);
  }
  logout(){
    this.userService.logout().subscribe((res)=>{
      console.log(res);
      });
      this.router.navigate(['/tabs/tab1']);
  }
}
