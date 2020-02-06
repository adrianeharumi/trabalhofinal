import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
// import { Storage } from '@ionic/storage';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.page.html',
  styleUrls: ['./cadastro.page.scss'],
})
export class CadastroPage implements OnInit {

	registerForm: FormGroup;

  constructor(public formbuilder: FormBuilder) {

  	this.registerForm = this.formbuilder.group({
  		name: [null, [Validators.required, Validators.minLength(3)]],
  		email:[null, [Validators.required, Validators.email]],
      phone: [null, [Validators.required]],
  		password: [null, [Validators.required, Validators.minLength(6)]],
  		genre: [null, [Validators.required]]
  	});

    // this.get();

   }



  ngOnInit() {
  }

  submit(form){
  	console.log(form);
  	console.log(form.value);
    // this.storage.set('name',form.value.name);
  }

  // get(){
  //   this.storage.get('name').then((res) => {
  //     console.log('Seu nome é', res);
  //   });
  // }

}
 