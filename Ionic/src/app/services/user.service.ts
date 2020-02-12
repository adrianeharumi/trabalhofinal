import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UserService {

    apiURL: string = 'http://localhost:8000/api/'
    constructor(public http: HttpClient) { }
    
    registerStudent(form:any):Observable<any>{
      return this.http.post(this.apiURL + 'registerStudent/', form);
    }

    registerTeacher(form:any):Observable<any>{
      return this.http.post(this.apiURL + 'registerTeacher/', form);
    }
}
