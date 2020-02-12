import { Injectable } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  //A URL da API
  apiUrl: string = "http://localhost:8000/api/";

  //AS HEADERS DA REQUISICAO
  httpHeaders: any = {
    headers: {
      'Content-Type':'application/json',
      'Accept':'application/json'
    }
  }



  //Login cadastroUsuario
  // logarUsuario(form): Observable<any> {
  //   return this.http.post(this.apiUrl + 'login', form, this.httpHeaders);
  // }

  constructor() { }
}
