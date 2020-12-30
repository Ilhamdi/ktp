<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtktp extends Model
{
    use HasFactory;

    protected $fillable = [
        'propinsi_id','kota_id','nik','nama','tmpLahir','tglLahir','jenisKelamin','agama','alamat','status','pekerjaan','user_id'

    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
