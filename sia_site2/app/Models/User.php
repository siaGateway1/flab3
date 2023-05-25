<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    public $timestamps = false;
protected $table = 'person';
protected $primaryKey = 'id';
// column sa table
protected $fillable = [ 
 'firstName', 'lastName'
];
}