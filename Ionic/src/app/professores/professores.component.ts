import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-professores',
  templateUrl: './professores.component.html',
  styleUrls: ['./professores.component.scss'],
})
export class ProfessoresComponent implements OnInit {

  @Input() public professor;

  constructor() { }

  ngOnInit() {}

}
