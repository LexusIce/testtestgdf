<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtrans extends Model
{
    use HasFactory;
    public $table   = "dtrans";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id','fk_htrans','Nama_item',"Kode_Barang",'Harga','Jum','Total'];
    public function adddtrans($fkhtrans,$Namaitem,$kode,$harga,$jum,$tot)
    {
        $newdtrans = new dtrans();
        $newdtrans->fk_htrans = $fkhtrans;
        $newdtrans->Nama_item = $Namaitem;
        $newdtrans->Kode_Barang = $kode;
        $newdtrans->Harga = $harga;
        $newdtrans->Jum =$jum;
        $newdtrans->Total = $tot;
        $newdtrans->save();
    }
}
