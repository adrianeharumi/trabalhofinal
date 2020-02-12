import { Component, OnInit, Input } from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';
import { UserService } from '../services/user.service';

@Component({
  selector: 'app-professores',
  templateUrl: './professores.component.html',
  styleUrls: ['./professores.component.scss'],
})
export class ProfessoresComponent implements OnInit {

  @Input() public professor;

  constructor(public router: Router, public user: UserService) { }

  showTeacher(id:any){
    this.router.navigate(['/perfil-professor', id]);

  }
  ngOnInit() {}

}
