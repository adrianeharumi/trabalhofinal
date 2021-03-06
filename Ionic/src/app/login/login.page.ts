import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Storage } from '@ionic/storage';
import { UserService } from '../services/user.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  loginForm: FormGroup;

  constructor(public formbuilder: FormBuilder, private storage: Storage,  public router: Router, public userService:UserService ) {

    this.loginForm = this.formbuilder.group({

      email: [null, [Validators.required, Validators.email]],
      password: [null, [Validators.required, Validators.minLength(6)]]

    });

   }

   cadastro(){
     this.router.navigate(['/cadastro']);
   }

  ngOnInit() {
  }

  submit(form){
    console.log(form);
    console.log(form.value);
    this.userService.loginUser(form.value).subscribe((res)=>{
        console.log(res);
        localStorage.setItem('token', res.success.token);
        localStorage.setItem('logout', 'true');
    });
      this.router.navigate(['/tabs/tab1']);
    }

    home(){
      this.router.navigate(['/tabs/tab1']);
    }

  }
