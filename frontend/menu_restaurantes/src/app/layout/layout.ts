import { Component } from '@angular/core';
import { RouterModule, RouterOutlet } from '@angular/router';
import { Categorias } from '../categorias/categorias';

@Component({
  selector: 'app-layout',
  imports: [RouterModule, RouterOutlet],
  standalone: true, 
  templateUrl: './layout.html',
  styleUrl: './layout.css'
})
export class Layout {

}
