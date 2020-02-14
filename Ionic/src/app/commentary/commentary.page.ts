import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { UserService } from '../services/user.service';
import {Router, ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-commentary',
  templateUrl: './commentary.page.html',
  styleUrls: ['./commentary.page.scss'],
})
export class CommentaryPage implements OnInit {

  student;
  commentForm: FormGroup;
  constructor(public formbuilder: FormBuilder, public router: Router, public userService:UserService ) { }

  ngOnInit() {
  }
getUser(){
  let token = localStorage.getItem('token');
  this.userService.getDetailsStudent(token).subscribe((res)=>{
  this.student = res;
  console.log(res);})
    
}  

ionViewWillEnter(){
  this.getUser();
}
}
