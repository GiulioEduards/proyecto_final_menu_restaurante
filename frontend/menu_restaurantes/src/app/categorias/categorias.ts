
import { Component } from '@angular/core';
import { CategoriasService } from '../core/services/categorias.service';
import { CommonModule } from '@angular/common';
import { Categoria } from '../../models/categoria.models';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-categorias',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './categorias.html',
  styleUrl: './categorias.css'
})
export class Categorias {

  categorias: Categoria[] = [];

  // Control del modal
  mostrarModal = false;
  esEdicion = false;
  
  categoriaEnEdicionId: number | null = null;

  // Formulario temporal
  formCategoria: Omit<Categoria, 'id'> = { 
    name: '', 
    description: '', 
    image: '' 
  };

  constructor(private categoriasService: CategoriasService) {}

  ngOnInit(): void {
    this.listarCategorias();
  }

  listarCategorias(): void {
    this.categoriasService.listarCategorias().subscribe({
      next: (rows) => {
        this.categorias = rows as Categoria[];
        // console.log(this.categorias);
      }
    });
  }

  // 🔹 Abrir modal
  abrirModal(): void {
    console.log('✅ abrirModal ejecutado');
    this.mostrarModal = true;
    this.esEdicion = false;
    this.formCategoria = { name: '', description: '', image: '' };
    this.categoriaEnEdicionId = null;
  }

  // 🔹 Cerrar modal
  cerrarModal(): void {
    this.mostrarModal = false;
  }

  // 🔹 Guardar categoría (crear o editar)
  guardarCategoria(): void {
    if (this.esEdicion && this.categoriaEnEdicionId !== null) {
      // Editar
      this.categoriasService.modificarCategoria(this.categoriaEnEdicionId, this.formCategoria)
        .subscribe({
          next: (categoriaActualizada) => {
            const index = this.categorias.findIndex(c => c.id === categoriaActualizada.id);
            if (index !== -1) this.categorias[index] = categoriaActualizada;
            this.cerrarModal();
          }
        });
    } else {
      // Crear nueva
      this.onCrearCategoria(this.formCategoria);
      this.cerrarModal();
    }
  }

  // 🔹 Lógica de crear
  onCrearCategoria(nuevaCategoria: Omit<Categoria, 'id'>): void {
    this.categoriasService.crearCategoria(nuevaCategoria).subscribe({
      next: (categoriaCreada) => {
        this.categorias.push(categoriaCreada);
      }
    });

  }

  // 🔹 Preparar edición
  editarCategoria(categoria: Categoria): void {
    this.esEdicion = true;
    this.mostrarModal = true;
    this.categoriaEnEdicionId = categoria.id;
    this.formCategoria = {
      name: categoria.name,
      description: categoria.description,
      image: categoria.image
    };
  }

  // 🔹 Eliminar
  eliminarCategoria(id: number): void {
    if (confirm('¿Estás seguro de eliminar esta categoría?')) {
      this.categoriasService.eliminarCategoria(id).subscribe(() => {
        this.categorias = this.categorias.filter(c => c.id !== id);
      });
    }
  }
}
