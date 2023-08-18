<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';
    protected $primarykey = 'id';
    protected $fillable = [ 'users_id','status'];

    public function users()
    {
      return $this->belongsTo(User::class);   
    }

}
