<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usercontroller extends Controller
{
    //
    public function Register()
    {
        return view('Register');
    }
    public function Login()
    {
        return view('Login');
    }
    public function PRegister(Request $req)
    {
        if($req->validate([
            "Nama"=>["required"],
            "username"=>["required"],
            "password"=>["required","min:8"],
            "email"=>["required"],
            "NoTelp"=>["required"],
            "password_confirmation"=>["required"]
        ])){
            $nama = $req->Nama;
            $username= $req->username;
            $password = $req->password;
            $email = $req->email;
            $Notelp = $req->NoTelp;
            $NewUsers = new UserModel();
            $NewUsers->Insert($nama,$username,$email,$password,1,$Notelp);
            return redirect()->back();
            //echo $nama;
        }
    }
    public function CekService(Request $req)
    {
        //echo $req->cekService;
        $data = DB::select("select * from service where id = '$req->cekService'");
        //print_r($data);
        session()->put('CekService',$data);
        return redirect()->back();
    }
}
