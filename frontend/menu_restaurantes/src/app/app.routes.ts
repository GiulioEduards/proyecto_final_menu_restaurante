import { Routes } from '@angular/router';
import { Layout } from './layout/layout';
import { Home } from './home/home';
import { Categorias } from './categorias/categorias';

export const routes: Routes = [

    {
        path: '',
        component:Layout,
        children:[
            {
                path: '',
                component:Home,
                title: 'Inicio'
            },
            {
                path: 'categorias',
                component:Categorias,
                title: 'categorias'
            }
        ]
    }
];
