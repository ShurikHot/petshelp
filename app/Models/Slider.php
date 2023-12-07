<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'tagline',
        'photo',
        'is_active',
    ];

    public static function uploadSlider($data)
    {
        if ($data['base64image'] || $data['base64image'] != 0) {
            if (str_starts_with($data['base64image'], 'front')) {
                return $data['base64image'];
            } else {
                $image_parts = explode(";base64,", $data['base64image']);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                $folderPath = public_path() . '/uploads/front/slider/';
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $filename = 'frontpage-' . time() . '.' . $image_type;
                $file = $folderPath . $filename;
                file_put_contents($file, $image_base64);

                return 'front/slider/' . $filename;
            }
        }
    }
}
