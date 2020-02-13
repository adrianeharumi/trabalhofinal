import { Component } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import {Router} from '@angular/router';
import { UserService } from '../services/user.service';

@Component({
  selector: 'app-tab3',
  templateUrl: 'tab3.page.html',
  styleUrls: ['tab3.page.scss']
})
export class Tab3Page {

  editForm: FormGroup;

  constructor(public formbuilder: FormBuilder, public router: Router, public userService:UserService) {
    this.editForm = this.formbuilder.group({
      name: [null],
      email:[null],
      CPF:[null],
      birth:[null],
      number:[null],
      district: [null],
      zone: [null],
      credit_card:[null],
      due_date:[null],
      cvv:[null],
      owner_name:[null],
  });

}

submit(form){
  console.log(form);
  console.log(form.value);
  this.router.navigate(['/tabs/tab1']);
}

}

