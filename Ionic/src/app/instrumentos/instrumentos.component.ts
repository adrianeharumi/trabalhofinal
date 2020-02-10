import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-instrumentos',
  templateUrl: './instrumentos.component.html',
  styleUrls: ['./instrumentos.component.scss'],
})
export class InstrumentosComponent implements OnInit {

texts:string[]=[
  "Cello",
  "Sax",
  "Piano",
  "Bateria",
  "Violino"
];

images:string[]=[
  "../../assets/cello.png" ,
  "../../assets/guitar.jpg" ,
  "../../assets/piano.png",
  "../../assets/drums.png",
  "../../assets/violin.png"
]

cards:any[]=[{
  text:"Cello",
  image:"../../assets/cello.png",
  },
  {
  text:"Sax",
  image:"../../assets/guitar.jpg",
  },
  {
  text:"Piano",
  image:"../../assets/piano.png",
  },
  {
    text:"Bateria",
  image:"../../assets/drums.png",
  },
  {
    text:"Violino",
  image:"../../assets/violin.png",
  }
];

  constructor() { }

  ngOnInit() {}

}
