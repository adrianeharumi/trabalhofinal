import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cello',
  templateUrl: './cello.page.html',
  styleUrls: ['./cello.page.scss'],
})
export class CelloPage implements OnInit {

  public cards:any = [
    {
    name:"João Farias",
    image:"../../assets/joao.png",
    average:"2.5",
    certification:"Professor Informal",
    district:"Tijuca",
    zone:"Norte",
    lesson_price:"R$70/H",
    rent_price:"0",
  },
  {
    name:"Mariana Lima",
    image:"../../assets/joao.png",
    average:"3.5",
    certification:"Músico pela OSB",
    district:"Leblon",
    zone:"Sul",
    lesson_price:"R$90/H",
    rent_price:"R$40/H",  
  },
  {
    name:"Maria Clara F.",
    image:"../../assets/joao.png",
    average:"4",
    certification:"Estudante de Música, UFF",
    district:"Barra da Tijuca",
    zone:"Oeste",
    lesson_price:"R$100/H",
    rent_price:"R$50/H",   
  },
  {
  name:"Eduardo Martins",
  image:"../../assets/joao.png",
  average:"3",
  certification:"Escola de Música, UFRJ",
  district:"Jardim Botânico",
  zone:"Sul",
  lesson_price:"R$120/H",
  rent_price:"0", 
  }
  ]
  constructor() { }

  ngOnInit() {
  }

}
