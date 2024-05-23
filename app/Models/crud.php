<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    use HasFactory;
    protected $table='registration';
    protected $primaryKey = 'id';
    public $fillable=['name','phone_no','email','state','address'];
}
