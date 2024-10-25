<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'name',
        'link',
    ];

    public static function getAll()
    {
        $allSosmeds = self::all();
        $socials = [];
        foreach ($allSosmeds as $sosmed) {
            $socials[$sosmed->name] = $sosmed->link;
        }
        return $socials;
    }
}
