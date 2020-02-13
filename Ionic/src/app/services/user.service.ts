import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UserService {

    apiURL: string = 'http://localhost:8000/api/'
    httpHeaders: object = {
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'Authorization': 'Bearer '
      }
    }

    constructor(public http: HttpClient) { }

    registerStudent(form:any):Observable<any>{
      return this.http.post(this.apiURL + 'registerStudent/', form);
    }

    registerTeacher(form:any):Observable<any>{
      return this.http.post(this.apiURL + 'registerTeacher/', form);
    }
    //Login cadastroUsuario
    loginUser(form): Observable<any> {
      return this.http.post(this.apiURL + 'login', form);
    }

    listTeacherInstruments(instruments:any): Observable<any>{
      return this.http.get(this.apiURL + 'listTeacherInstruments/' + instruments);
    }
    listTeacherInstrumentsByZone(instruments:any, zone:any): Observable<any>{
      return this.http.get(this.apiURL + 'listTeacherInstrumentsByZone/' + instruments + '/' + zone);
    }
    showTeacher(id:any): Observable<any>{
      return this.http.get(this.apiURL + 'showTeacher/' + id);
    }
    getDetailsStudent(token:any): Observable<any>{
      this.httpHeaders['headers']["Authorization"] = 'Bearer ' + token;
      return this.http.get(this.apiURL + 'getDetailsStudent', this.httpHeaders);
    }
}
