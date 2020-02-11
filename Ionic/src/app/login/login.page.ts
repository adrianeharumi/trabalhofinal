import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  registerForm: FormGroup;

  constructor(public formbuilder: FormBuilder,  public router: Router) {

    this.registerForm = this.formbuilder.group({

      email: [null, [Validators.required, Validators.email]],
      password: [null, [Validators.required, Validators.minLength(6)]]

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
