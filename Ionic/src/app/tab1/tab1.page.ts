import { Component } from '@angular/core';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {
  cont;

  constructor() {}
  ionViewWillEnter(){
    if(this.cont && localStorage.getItem('logout')){
      this.cont = false;
      location.reload();
    }
    else{
        this.cont = true;
    }
  }
}
