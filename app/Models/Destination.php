<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    use HasFactory;

    protected $table = 'destinations';

    protected $fillable = [
        "name",
        "description",
        "price",
        "duration",
        "image",
    ];

    public static function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        return $imageName;
    }
}
