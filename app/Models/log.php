<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    use HasFactory;
    public $table   = "log";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;
    public $fillable = ['id','Deskripsi','Created_at_log','Update_at_log'];
    const CREATED_AT = 'Created_at_log';
    const UPDATED_AT = 'Update_at_log';
    public function InsertLog($tanggal,$deskripsi)
    {
        $newlog = new log();
        $newlog->Created_at_log = $tanggal;
        $newlog->Deskripsi = $deskripsi;
        $newlog->save();
    }
}
