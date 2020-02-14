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
      return this.http.post(this.apiURL + 'login/', form);
    }

    logout(): Observable<any> {
    this.httpHeaders['headers']["Authorization"] = 'Bearer ' + localStorage.getItem("token");
    localStorage.removeItem('token');
    return this.http.get(this.apiURL + 'logout', this.httpHeaders)
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
    getDetailsTeacher(token:any): Observable<any>{
      this.httpHeaders['headers']["Authorization"] = 'Bearer ' + token;
      return this.http.get(this.apiURL + 'getDetailsTeacher', this.httpHeaders);
    }
    createContract(teacher_id:any, times:any, boolean:any, token:any): Observable<any>{

      this.httpHeaders['headers']["Authorization"] = 'Bearer ' + token;
      console.log(this.httpHeaders);
      return this.http.get(this.apiURL + 'createContract/' + teacher_id + '/' + times + '/' + boolean, this.httpHeaders);
    }
    updateStudent(token:any, form:any): Observable<any>{
      this.httpHeaders['headers']["Authorization"] = 'Bearer ' + token;
      return this.http.post(this.apiURL + 'updateStudent/', form, this.httpHeaders);
    }
    updateTeacher(token:any, form:any): Observable<any>{
      this.httpHeaders['headers']["Authorization"] = 'Bearer ' + token;
      return this.http.post(this.apiURL + 'updateTeacher/', form, this.httpHeaders);
    }
    delete(token: any, id: any): Observable<any>{
      this.httpHeaders['headers']["Authorization"] = 'Bearer ' + token;
      return this.http.delete(this.apiURL + 'deleteUser/' + id, this.httpHeaders);

    }
}
