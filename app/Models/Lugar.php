<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Lugar
{
    /**
     * Obtiene todos los destinos turísticos del archivo JSON.
     */
    public static function all()
    {
        $path = storage_path('app/lugares.json');

        if (!File::exists($path)) {
            return collect([]);
        }

        $json = File::get($path);
        $data = json_decode($json, true);

        return collect($data);
    }

    /**
     * Busca un destino específico por su ID.
     */
    public static function find($id)
    {
        return self::all()->firstWhere('id', (int) $id);
    }
}