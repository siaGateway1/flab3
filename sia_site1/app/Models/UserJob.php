<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserJob extends Model{
    public $timestamps = false;
protected $table = 'tbluserjob';
protected $primaryKey = 'jobid';
// column sa table
protected $fillable = [
    'username', 'password','gender','jobid'
    ];
}