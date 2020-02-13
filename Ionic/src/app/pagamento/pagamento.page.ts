import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';
import { UserService } from '../services/user.service';

@Component({
  selector: 'app-pagamento',
  templateUrl: './pagamento.page.html',
  styleUrls: ['./pagamento.page.scss'],
})
export class PagamentoPage implements OnInit {
  id;
  teacher;
  times;
  user;

  constructor(public userService: UserService, public router: Router, public route: ActivatedRoute) {
    this.id = this.route.snapshot.paramMap.get('id');

   }

  ngOnInit() {
  }
  getUser(){
     this.user = localStorage.getItem('token');
     console.log(this.user);
     this.userService.getDetailsStudent(this.user).subscribe((res) => {
          console.log(res);
          this.user = res;
          console.log(this.times);
     });
  }
  getTeacher(id:any):any{
    this.userService.showTeacher(id).subscribe( (resposta) =>{
      console.log(resposta);
      this.teacher = resposta.teacher;
      console.log(this.teacher);
    } );

  }
  comprar()
  previous(){
    this.router.navigate(['/contrato', this.id])
  }

  ionViewWillEnter(){
    this.getTeacher(this.id);
    console.log(this.id);
  }
}
