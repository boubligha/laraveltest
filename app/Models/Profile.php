<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    // Define the table name if it's not the default 'profiles'
    // protected $table = 'your_custom_table_name';
    // Enable mass assignment for these attributes
    protected $fillable = ['name', 'email', 'password', 'bio'];
    // Disable timestamps if your table doesn't have 'created_at' and 'updated_at'
    // public $timestamps = false;
}
