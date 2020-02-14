import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';
import { UserService } from '../services/user.service';
import { ToastController } from '@ionic/angular'

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
  rent;

  constructor(
    public userService: UserService,
    public router: Router,
    public route: ActivatedRoute,
    public toastController: ToastController) {
    this.id = this.route.snapshot.paramMap.get('id');

   }

  ngOnInit() {
  }
  getUser(){
     this.user = localStorage.getItem('token');
     console.log(this.user);
     console.log(this.rent);
     this.userService.getDetailsStudent(this.user).subscribe((res) => {
          console.log(res);
          this.user = res;
          console.log(this.user);
     });
  }
  getTeacher(id:any):any{
    this.userService.showTeacher(id).subscribe( (resposta) =>{
      console.log(resposta);
      this.teacher = resposta.teacher;
      console.log(this.teacher);
    } );

  }
  comprar(){
    this.user = localStorage.getItem('token');
    console.log(this.user);
    if(this.rent == 1){
    this.userService.createContract(this.id, this.times, this.rent, this.user).subscribe( (resposta) =>{
      console.log(resposta);
      this.router.navigate(['/tabs/tab1'])
    } );
    }
    if(this.rent == 0){
      this.userService.createContract(this.id, this.times, this.rent, this.user).subscribe( (resposta) =>{
        console.log(resposta);
        this.router.navigate(['/tabs/tab1'])
      } );
    }

      async function presentToast(){
        const toast = await this.toastController.create({
          message: 'Compra Efetuada! Acesse seu email para mais informacoes.',
          duration: 10000
        });
        toast.present();
      }
  }
  previous(){
    this.router.navigate(['/contrato', this.id])
  }

  ionViewWillEnter(){
    this.getTeacher(this.id);
    console.log(this.id);
  }

  home(){
    this.router.navigate(['/tabs/tab1']);
  }



}
