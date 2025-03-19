<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    //trait
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'email', 'password', 'bio','image'];

    public function getRouteKeyName(){
        return 'id';
    }
}
