import { Component } from '@angular/core';
import { CategoriasService } from '../core/services/categorias.service';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-categorias',
  imports: [CommonModule],
  templateUrl: './categorias.html',
  styleUrl: './categorias.css'
})
export class Categorias {

  categorias:any[]= [];

  constructor(private categoriasService:CategoriasService){

  }

  ngOnInit(): void{
    this.listarCategorias();
  }


  listarCategorias(){
    this.categoriasService.listarCategorias().subscribe({
      next:(rows)=>{
        this.categorias=rows as any[];

        console.log(this.categorias);
      }
    });
  }
}
