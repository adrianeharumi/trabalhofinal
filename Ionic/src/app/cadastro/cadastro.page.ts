import { Component, OnInit, ViewChild } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { IonSlides } from '@ionic/angular';

import { Router } from '@angular/router';
// import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.page.html',
  styleUrls: ['./cadastro.page.scss'],

})
export class CadastroPage implements OnInit  {

  @ViewChild('slides', {static: true}) slides: IonSlides;

	registerForm: FormGroup;

  passwordError: boolean;

  constructor(public formbuilder: FormBuilder, public router: Router) {

  	this.registerForm = this.formbuilder.group({
  		name: [null, [Validators.required, Validators.minLength(3)]],
  		email:[null, [Validators.required, Validators.email]],
  		password: [null, [Validators.required, Validators.minLength(6)]],
      password_confirmation: [null, [Validators.required, Validators.minLength(6)]],
  		instruments: [null],
      zone: [null],
      certification: [null],
  	});


   }



  ngOnInit() {
  }


  submit( form ) {
    console.log(form.value);

    // if ( form.status == "VALID" ) {
    //   //MANDAREMOS A REQUISICAO PARA A api
    //   this.authService.registrarUsuario( form.value ).subscribe(
    //     ( res ) => {
    //       console.log( res );
    //       this.router.navigate(['/login'])
    //     }
      // )
    //}
  }

 goToProf(){
  this.slides.slideTo(2,500);
  }

 goToAluno(){
  this.slides.slideTo(3,500);
  }

  checkPassword(form){
    if(form.value.password != form.value.password_confirmation){
      this.passwordError = true;
    }
    else{
      this.passwordError = false;
    }
  }

}
