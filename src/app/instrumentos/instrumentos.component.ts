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
  "Piano"
];

images:string[]=[
  "../../assets/cello.png" ,
  "https://www.google.com/url?sa=i&url=https%3A%2F%2Fsuper.abril.com.br%2Fciencia%2Fpor-que-alguns-animais-sao-tao-rapidos-esta-formula-explica%2F&psig=AOvVaw3ftcIhzPDxf0Wh0v-u6R7X&ust=1581188882687000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPiJvOORwOcCFQAAAAAdAAAAABAJ",
  "https://www.google.com/url?sa=i&url=https%3A%2F%2Fpleno.news%2Fbrasil%2Fcidades%2Frj-tem-aumento-de-denuncias-de-maus-tratos-a-animais.html&psig=AOvVaw3ftcIhzPDxf0Wh0v-u6R7X&ust=1581188882687000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPiJvOORwOcCFQAAAAAdAAAAABAO"
]

cards:any[]=[{
  text:"Cello",
  image:"../../assets/cello.png"
  },
  {
  text:"Sax",
  image:"https://www.google.com/url?sa=i&url=https%3A%2F%2Fsuper.abril.com.br%2Fciencia%2Fpor-que-alguns-animais-sao-tao-rapidos-esta-formula-explica%2F&psig=AOvVaw3ftcIhzPDxf0Wh0v-u6R7X&ust=1581188882687000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPiJvOORwOcCFQAAAAAdAAAAABAJ",
  },
  {
  text:"Piano",
  image:"https://www.google.com/url?sa=i&url=https%3A%2F%2Fpleno.news%2Fbrasil%2Fcidades%2Frj-tem-aumento-de-denuncias-de-maus-tratos-a-animais.html&psig=AOvVaw3ftcIhzPDxf0Wh0v-u6R7X&ust=1581188882687000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPiJvOORwOcCFQAAAAAdAAAAABAO"
  }
];

  constructor() { }

  ngOnInit() {}

}
