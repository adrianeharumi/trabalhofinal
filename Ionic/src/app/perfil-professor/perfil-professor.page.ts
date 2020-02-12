import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-perfil-professor',
  templateUrl: './perfil-professor.page.html',
  styleUrls: ['./perfil-professor.page.scss'],
})
export class PerfilProfessorPage implements OnInit {

  public teacher:any = 
    {
    name:"João Farias",
    instrument:"Cello",
    image:"../../assets/joao.png",
    average:"2.5",
    certification:"Professor Informal",
    district:"Tijuca",
    zone:"Norte",
    lesson_price:"R$70/H",
    rent_price:"0",
  }

  constructor() { }

  ngOnInit() {
  }

}
