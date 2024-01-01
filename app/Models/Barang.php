<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $table   = "barang";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;
    public $fillable = ['id','Nama','Harga','Gambar','Create_at_Barang','Update_at_Barang'];
    const CREATED_AT = 'Create_at_Barang';
    const UPDATED_AT = 'Update_at_Barang';
    public function InsertBarang($nama,$harga,$namagambar,$gambar,$tanggal)
    {
        $NewBarang = new Barang();
        $NewBarang->Nama = $nama;
        $NewBarang->Harga = $harga;
        $NewBarang->Gambar = $namagambar;
        $NewBarang->Create_at_Barang = $tanggal;
        $gambar->move("Product",$namagambar);
        $NewBarang->save();
    }
}
