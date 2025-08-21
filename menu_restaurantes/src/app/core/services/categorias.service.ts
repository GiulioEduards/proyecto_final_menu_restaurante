import { Injectable } from '@angular/core';
import { environment } from '../../../environments/environment.development';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CategoriasService {
  
  private base = environment.apiUrl;


  constructor(private http:HttpClient){

  }

  listarCategorias(){
    return this.http.get(`${this.base}/categorias`);
  }
  crearCategorias(){
    
  }
  modificarCategorias(){
    
  }
  eliminarCategorias(){
    
  }


}
