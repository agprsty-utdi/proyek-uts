<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterSiswa extends Model
{
    use HasFactory;

    protected $table = 'register_siswas';
    protected $primaryKey = 'no_pendaftaran';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_pendaftaran',
        'nama',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'asal_sekolah',
        'agama',
        'nilai_ind',
        'nilai_ipa',
        'nilai_mtk',
        'total_nilai',
    ];

    static function listAgama()
    {
        return array(
            1=>'Islam',
            2=>'Katholik',
            3=>'Protestan',
            4=>'Hindu',
            5=>'Budha',
            6=>'Konghucu'
        );
    }

    public function getAgama()
    {
        if ($this->agama=="1")
            return "Islam";
        elseif($this->agama=="2")
            return "Katholik";
        elseif($this->agama=="3")
            return "Protistan";
        elseif($this->agama=="4")
            return "Hindu";
        elseif($this->agama=="5")
            return "Budha";
        elseif($this->agama=="6")
            return "Konghucu";
        else
            return "Tidak diketahui";
    }
}
