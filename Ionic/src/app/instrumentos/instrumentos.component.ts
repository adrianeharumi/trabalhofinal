import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-instrumentos',
  templateUrl: './instrumentos.component.html',
  styleUrls: ['./instrumentos.component.scss'],
})
export class InstrumentosComponent implements OnInit {

cards:any[]=[{
  text:"Cello",
  image:"../../assets/cello.png",
  },
  {
  text:"Sax",
  image:"../../assets/sax.png",
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
