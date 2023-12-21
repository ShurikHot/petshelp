<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'rating',
    ];

    public function pet()
    {
        return $this->hasOne(Pet::class, 'id', 'pet_id');
    }

    public static function upRating($id)
    {
        $petRating = self::query()->where('pet_id', $id)->get();
        $rating = $petRating->pluck('rating')->toArray();
        if (!empty($rating)) {
            self::query()->where('pet_id', $id)->update(['rating' => $rating[0]+1]);
        } else {
            self::query()->create(['pet_id' => $id, 'rating' => 1]);
        }
    }

    public static function ratingTable()
    {
        return self::query()->get()->sortByDesc('rating')->pluck('rating', 'pet_id')->toArray();
    }
}
