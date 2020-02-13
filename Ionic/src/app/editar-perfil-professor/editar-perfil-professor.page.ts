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
  abc = 'abc';

  constructor(public formbuilder: FormBuilder, public router: Router, public userService:UserService ) { 
    this.editForm = this.formbuilder.group({
      name: [this.abc],
      email:[null],
      CPF:[null],
      birth:[null],
      number:[null],
      district: [null],
      zone: [null],
      certification: [null],
      instruments: [null],
      lesson_price: [null],
      rent_price: [null],
      video:[null],
  		owner_name: [null],
  		bank:[null],
  		agency: [null],
      account: [null],
  	});

  }

  ngOnInit() {
  }

  submit(form){
    console.log(form);
    console.log(form.value);
    this.router.navigate(['/tabs/tab1']);
  }


}
