<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Perusahaan extends Model
{
    use HasFactory;
    protected $guard = 'perusahaanLogin';
    protected $table = "perusahaan";
    protected $guarded = ["id"];

    public function lowongan(){
        return $this->hasMany(Lowongan::class);
    }
}