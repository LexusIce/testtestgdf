<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    public $table   = "user";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id','Nama','Username','Email','Password','Status','No_Telp'];
    public function Insert($Nama,$Username,$Email,$Password,$Status,$Job)
    {
        $new = new UserModel();
        $new->Nama = $Nama;
        $new->Username = $Username;
        $new->Email = $Email;
        $new->Password = $Password;
        $new->Status = $Status;
        $new->Job = $Job;
        $new->save();
    }
}
