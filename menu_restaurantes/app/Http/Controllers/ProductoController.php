<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->get();

        return response()->json([
            'data' => $productos,
            'total' => $productos->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
            'category_id' => 'required|exists:categorias,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Error de validación',
                'errores' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $data['disponible'] = $request->boolean('disponible');

        if ($request->hasFile('image')) {
            $imageName = Str::uuid() . '.' . $request->image->extension();
            $imagePath = $request->file('image')->storeAs('productos', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $producto = Producto::create($data);

        return response()->json([
            'mensaje' => 'Producto creado exitosamente',
            'data' => $producto
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'mensaje' => 'Producto no encontrado'
            ], 404);
        }

        return response()->json([
            'data' => $producto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'mensaje' => 'Producto no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
            'category_id' => 'required|exists:categorias,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Error de validación',
                'errores' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($producto->image) {
                Storage::disk('public')->delete($producto->imagen);
            }
            
            $imageName = Str::uuid() . '.' . $request->imagen->extension();
            $imagePath = $request->file('image')->storeAs('productos', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $producto->update($data);

        return response()->json([
            'mensaje' => 'Producto actualizado correctamente',
            'data' => $producto->fresh()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'mensaje' => 'Producto no encontrado'
            ], 404);
        }

        // Eliminar imagen asociada si existe
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return response()->json([
            'mensaje' => 'Producto eliminado correctamente'
        ]);
    }
}