<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    public function getDataAttribute()
    {
        if ($this->type == 'file' && $this->value != null) {
            return asset("storage/{$this->value}");
        }

        return $this->value;
    }
}
