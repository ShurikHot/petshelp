<?php

namespace App\Models;

use App\Http\Requests\Pet\StoreRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Pet extends Model
{
    use HasFactory;
    use Searchable;

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
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
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

        $years = self::plural($forms_y, $y);
        $month = self::plural($forms_m, $m);

        return ($y != 0 ? "$y $years " : '') . ($y != 0 && $m != 0 ? ' і ' : '') . ($m != 0 ? "$m $month" : '');
    }

    public static function plural($forms, $num)
    {
        return ($num % 10 == 1 && $num % 100 != 11) ? $forms[0] : ($num % 10 >= 2 && $num % 10 <= 4 && ($num % 100 < 10 || $num % 100 >= 20) ? $forms[1] : $forms[2]);
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

    public static function boolParams(StoreRequest $request)
    {
        $bool_params = ['sterilization', 'vaccination', 'special', 'guardianship', 'adopted'];
        foreach ($bool_params as $param) {
            $request[$param] = isset($request[$param]);
        }
        return $request;
    }

    public function scopeNotAdopted(Builder $query)
    {
        $query->where('adopted', '=', '0');
    }

    public function searchableAs()
    {
        return 'pet_index';
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'species' => $this->species,
            'breed' => $this->breed,
            'city' => $this->city,
            'sex' => $this->sex,
            'sterilization' => $this->sterilization,
            'vaccination' => $this->vaccination,
            'special' => $this->special,
            'guardianship' => $this->guardianship,
        ];
    }
}
