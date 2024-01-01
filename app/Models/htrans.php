<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class htrans extends Model
{
    use HasFactory;
    public $table   = "htrans";
    public $primaryKey = "id";
    public $incrementing = false;
    public $timestamps = true;
    public $fillable = ['id','Grand_Total','fk_user','status','Create_at_htrans','Update_at_htrans'];
    const CREATED_AT = 'Create_at_htrans';
    const UPDATED_AT = 'Update_at_htrans';
    public function inserthtrans($id,$Grandtotal,$fkuser,$tgl,$status)
    {
        $newhtrans = new htrans();
        $newhtrans->id = $id;
        $newhtrans->Grand_Total = $Grandtotal;
        $newhtrans->fk_user = $fkuser;
        $newhtrans->Create_at_htrans = $tgl;
        $newhtrans->status = $status;
        $newhtrans->save();
    }
}
