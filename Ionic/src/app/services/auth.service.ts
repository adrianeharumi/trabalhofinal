import { Injectable } from '@angular/core';

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

  //Registro de usuario
  registrarUsuario( form ): Observable<any> {
    return this.http.post( this.apiUrl + 'register', form, this.httpHeaders );
  }

  //Login cadastroUsuario
  logarUsuario(form): Observable<any> {
    return this.http.post(this.apiUrl + 'login', form, this.httpHeaders);
  }

  constructor() { }
}
