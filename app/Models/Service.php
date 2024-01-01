<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $table   = "service";
    public $primaryKey = "id";
    public $incrementing = false;
    public $timestamps = true;
    public $fillable = ['id','Tlp','Nama_Pelanggan','Deskripsi','Alamat','Status','Create_at_Service','Update_at_Service'];
    const CREATED_AT = 'Create_at_Service';
    const UPDATED_AT = 'Update_at_Service';
    public function AddService($id,$Tlp,$NamaPelanggan,$Deskripsi,$Alamat,$Tgl)
    {
        $newService = new Service();
        $newService->id = $id;
        $newService->Tlp = $Tlp;
        $newService->Nama_Pelanggan = $NamaPelanggan;
        $newService->Deskripsi = $Deskripsi;
        $newService->Alamat = $Alamat;
        $newService->Status = 0;
        $newService->Create_at_Service = $Tgl;
        $newService->save();
    }
}
