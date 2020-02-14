import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-inicio',
  templateUrl: './inicio.page.html',
  styleUrls: ['./inicio.page.scss'],
})
export class InicioPage implements OnInit {

  constructor( public router: Router) { }

  login(){
    this.router.navigate(['/login']);
  }
  cadastro(){
    this.router.navigate(['/cadastro']);
  }

  ngOnInit() {
  }
  home(){
    this.router.navigate(['/tabs/tab1']);
  }
}
