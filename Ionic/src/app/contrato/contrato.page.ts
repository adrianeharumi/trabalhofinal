import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-contrato',
  templateUrl: './contrato.page.html',
  styleUrls: ['./contrato.page.scss'],
})
export class ContratoPage implements OnInit {

  constructor( public router: Router) { }

  ngOnInit() {
  }

  previous(){
    this.router.navigate(['/tabs/tab1']);
  }
  pagamento(){
    this.router.navigate(['/pagamento']);
  }
}
