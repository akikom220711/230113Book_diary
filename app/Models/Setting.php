<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mystery_color',
        'fantasy_color',
        'SF_color',
        'nonfiction_color',
        'others_color'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
