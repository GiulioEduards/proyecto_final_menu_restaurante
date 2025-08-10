<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'is_active',
        'category_id'
    ];


    /**
     * Relación con la categoría
     */
    public function category()
    {
        return $this->belongsTo(Categoria::class);
    }

}
