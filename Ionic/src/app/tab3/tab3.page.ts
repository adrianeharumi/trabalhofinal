import { Component } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import {Router} from '@angular/router';
import { UserService } from '../services/user.service';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-tab3',
  templateUrl: 'tab3.page.html',
  styleUrls: ['tab3.page.scss']
})
export class Tab3Page {
  student;
  firstname;
  email;
  CPF;
  birth;
  number;
  credit_card;
  due_date;
  cvv;
  owner_name;
  editForm: FormGroup;
  photo;

  constructor(public formbuilder: FormBuilder, public router: Router, public userService:UserService, public alertController: AlertController) {
    let user = localStorage.getItem('token');

    this.getUser(user);

    this.editForm = this.formbuilder.group({
      name: [this.firstname],
      email:[this.email],
      CPF:[null],
      birth:[null],
      number:[null],
      credit_card:[null],
      due_date:[null],
      cvv:[null],
      owner_name:[null],
  });

}
getUser(token:any):any{
  this.userService.getDetailsStudent(token).subscribe((res)=>{
    if(res == 'Erro de Autorização'){
      this.alerta();
    }
      this.student = res;
      console.log(this.student);
      this.firstname = this.student.usuario.name;
      this.email =this.student.usuario.email;
      this.birth = this.student.usuario.birth;
      this.CPF = this.student.usuario.CPF;
      this.number = this.student.usuario.number;
      this.credit_card = this.student.aluno.credit_card;
      this.due_date = this.student.aluno.due_date;
      this.cvv = this.student.aluno.cvv;
      this.owner_name = this.student.aluno.owner_name;
      this.photo =this.student.usuario.photo;

    });
}
async alerta() {
  if(!localStorage.getItem('token')){
    const alert = await this.alertController.create({
    header: 'Alerta',
    subHeader: 'Não Autorizado',
    message: 'Você não está logado.',
    buttons: ['OK']
  });
  this.router.navigate(['/inicio'])

  await alert.present();
}
  else{
    const alert = await this.alertController.create({
    header: 'Alerta',
    subHeader: 'Não Autorizado',
    message: 'Você não é Aluno.',
    buttons: ['OK']
  });
  this.router.navigate(['/tabs/tab1'])

  await alert.present();
  }
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
ngOnInit() {
  if(!localStorage.getItem('token')){
    this.alerta();
  }

}

logout(){
  this.userService.logout().subscribe((res)=>{console.log(res);
    });
    this.router.navigate(['/tabs/tab1']);
}

}
