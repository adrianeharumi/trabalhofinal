import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-contrato',
  templateUrl: './contrato.page.html',
  styleUrls: ['./contrato.page.scss'],
})
export class ContratoPage implements OnInit {
  id;
  constructor(public router: Router, public alertController: AlertController) {
    this.id = this.route.snapshot.paramMap.get('id');
  }

  ngOnInit() {
  }

  previous(){
    this.router.navigate(['/tabs/tab1']);
  }
  pagamento(){
    this.router.navigate(['/pagamento', this.id]);
  }
//   async function pagamento() {
//   const alert = await alertController.create({
//     header: 'Confirmação!',
//     message: 'Seu pagamento foi confirmado, veja já seu email',
//     buttons: ['Voltar para Home']
//   });
//
//   // await alert.present();
// };
}
