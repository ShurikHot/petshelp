<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
//    use HasFactory;

    protected $fillable = [
        'name',
        'age_month',
        'species',
        'sex',
        'breed',
        'color',
        'sterilization',
        'vaccination',
        'special',
        'guardianship',
        'city',
        'phone_number',
        'story',
        'peculiarities',
        'wishes',
        'photo',
        'patrons',
        'adopted',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function patrons()
    {
        return $this->belongsTo(Patron::class);
    }

    public static function uploadPhoto($data)
    {
        if ($data['base64image'] || $data['base64image'] != 0) {
            if (str_starts_with($data['base64image'], 'images')) {
                return $data['base64image'];
            } else {
                $image_parts = explode(";base64,", $data['base64image']);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                $folderPath = public_path() . '/uploads/images/' . date('Y-m') . '/';
                $filename = time() . '.' . $image_type;
                $file = $folderPath . $filename;
                file_put_contents($file, $image_base64);

                return 'images/' . date('Y-m') . '/' . $filename;
            }
        }
    }

    public static function agePet($age)
    {
        $forms_y = ['рік', 'роки', 'років'];
        $forms_m = ['місяць', 'місяця', 'місяців'];

        $y = round($age / 12);
        $m = $age % 12;

        $years = ($y % 10 == 1 && $y % 100 != 11) ? $forms_y[0] : ($y % 10 >= 2 && $y % 10 <= 4 && ($y % 100 < 10 || $y % 100 >= 20) ? $forms_y[1] : $forms_y[2]);
        $month = ($m % 10 == 1 && $m % 100 != 11) ? $forms_m[0] : ($m % 10 >= 2 && $m % 10 <= 4 && ($m % 100 < 10 || $m % 100 >= 20) ? $forms_m[1] : $forms_m[2]);

        return ($y != 0 ? ($y . ' ' . $years . ' ') : '') . ($y != 0 && $m != 0 ? ' і ' : '') . ($m != 0 ? ($m . ' ' . $month) : '');
    }

    public static function speciesPet($species)
    {
        switch ($species) {
            case 'Собака':
                $spec = 'dog';
                break;
            case 'Кіт':
                $spec = 'cat';
                break;
            case 'Гризун':
                $spec = 'rodent';
                break;
            case 'Пташка':
                $spec = 'bird';
                break;
            case 'Інше':
                $spec = 'ets';
                break;
        }
        return asset("assets/front/images/icon-{$spec}.png");
    }



}
