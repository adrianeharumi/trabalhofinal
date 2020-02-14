import { Component, OnInit } from '@angular/core';
import { UserService } from '../services/user.service';
import {Router, ActivatedRoute} from '@angular/router';


@Component({
  selector: 'app-cello',
  templateUrl: './cello.page.html',
  styleUrls: ['./cello.page.scss'],
})
export class CelloPage implements OnInit {
  instruments;
  cards;
  filterTeacherZone;
  constructor(public user: UserService, public route: ActivatedRoute, public router:Router) {
  	this.instruments = this.route.snapshot.paramMap.get('instruments');
  }

  getUsers(instruments:string):any{
  	this.user.listTeacherInstruments(instruments).subscribe( (resposta) =>{
  		console.log(resposta);
  		this.cards = resposta.array;
  	} );
  }
  filterTeacher(instruments:any){
    this.user.listTeacherInstrumentsByZone(instruments, this.filterTeacherZone).subscribe( (resposta) =>{
  		console.log(resposta);
  		this.cards = resposta.array;
  	} );
  }
  // nextPage(instruments:string){
  //   console.log(1);
  //   this.user.listTeacherInstruments(instruments).subscribe( (resposta) =>{
  // 		console.log(resposta);
  // 	} );
  // }
  ngOnInit() {
  }
  ionViewWillEnter(){
    this.getUsers(this.instruments);
    console.log(this.instruments);
  }
  home(){
    this.router.navigate(['/tabs/tab1']);
  }
}
