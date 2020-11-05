<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable =['title', 'picture', 'desc', 'genre', 'fsk', 'platform', 'price', 'rating', 'release'];
}
