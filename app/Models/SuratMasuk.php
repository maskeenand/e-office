<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $dates = ['tgl_surat','tgl_diterima'];

    protected $table ='surat_masuk';
    protected $primaryKey = 'no_surat';

    public $incrementing = false;
    public $timestamps = true;

}
