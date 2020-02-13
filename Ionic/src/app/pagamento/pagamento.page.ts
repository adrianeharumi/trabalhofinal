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
  constructor(public router: Router) {
    this.id = this.route.snapshot.paramMap.get('id');
   }

  ngOnInit() {
  }
  getTeacher(id:any):any{
    this.user.showTeacher(id).subscribe( (resposta) =>{
      console.log(resposta);
      this.teacher = resposta.teacher;
      console.log(this.teacher)
  	} );
  }
  previous(){
    this.router.navigate(['/contrato'])
  }
  ionViewWillEnter(){
    this.getTeacher(this.id);
    console.log(this.id);
  }
}
