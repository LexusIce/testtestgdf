<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class stock extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table   = "stock";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id','fk_barang','kode','Created_at','update_at','deleted_at'];
    protected $dates = ['deleted_at'];
    function addstock($fkbarang,$kode){
        $newstock = new stock();
        $newstock->fk_barang = $fkbarang;
        $newstock->kode = $kode;
        $newstock->save();
    }
}
