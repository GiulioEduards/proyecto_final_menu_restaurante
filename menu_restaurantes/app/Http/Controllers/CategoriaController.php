<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        


        // $categorias = Categoria::all();
        // return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        // $request->validate([
        //     'nombre' => 'required|max:255',
        //     'descripcion' => 'nullable',
        //     'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);

        // $data = $request->all();

        // if ($request->hasFile('imagen')) {
        //     $imagePath = $request->file('imagen')->store('categorias', 'public');
        //     $data['imagen'] = $imagePath;
        // }

        // Categoria::create($data);

        // return redirect()->route('categorias.index')
        //     ->with('success', 'Categoría creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
 


        // return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        // return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       


        // $request->validate([
        //     'nombre' => 'required|max:255',
        //     'descripcion' => 'nullable',
        //     'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);

        // $data = $request->all();

        // if ($request->hasFile('imagen')) {
        //     // Eliminar imagen anterior si existe
        //     if ($categoria->imagen) {
        //         Storage::disk('public')->delete($categoria->imagen);
        //     }
        //     $imagePath = $request->file('imagen')->store('categorias', 'public');
        //     $data['imagen'] = $imagePath;
        // }

        // $categoria->update($data);

        // return redirect()->route('categorias.index')
        //     ->with('success', 'Categoría actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        // if ($categoria->imagen) {
        //     Storage::disk('public')->delete($categoria->imagen);
        // }

        // $categoria->delete();

        // return redirect()->route('categorias.index')
        //     ->with('success', 'Categoría eliminada exitosamente');
    }
}
