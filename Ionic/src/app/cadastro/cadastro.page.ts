import { Component, OnInit, ViewChild } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { IonSlides } from '@ionic/angular';
import { Storage } from '@ionic/storage';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.page.html',
  styleUrls: ['./cadastro.page.scss'],

})
export class CadastroPage implements OnInit  {

  @ViewChild('slides', {static: true}) slides: IonSlides;

	registerForm: FormGroup;

  passwordError: boolean;

  constructor(public formbuilder: FormBuilder, public storage: Storage, public router: Router) {

  	this.registerForm = this.formbuilder.group({
  		name: [null, [Validators.required, Validators.minLength(3)]],
  		email:[null, [Validators.required, Validators.email]],
  		password: [null, [Validators.required, Validators.minLength(6)]],
      confirmPass: [null, [Validators.required, Validators.minLength(6)]],
  		instruments: [null, [Validators.required]],
      location: [null, [Validators.required]],
      certification: [null],
  	});


   }



  ngOnInit() {
  }


  submit(form){
  	console.log(form);
  	console.log(form.value);
    this.storage.set('name',form.value.name);
    this.router.navigate(['/tabs/tab1']);
  }

  get(){
    this.storage.get('name').then((res) => {
      console.log('Seu nome é', res);
    });
  }

 goToProf(){
  this.slides.slideTo(2,500);
  }

 goToAluno(){
  this.slides.slideTo(3,500);
  }

  checkPassword(form){
    if(form.value.password != form.value.confirmPass){
      this.passwordError = true;
    }
    else{
      this.passwordError = false;
    }
  }

}
