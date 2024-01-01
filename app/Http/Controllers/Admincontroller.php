<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\dtrans;
use App\Models\htrans;
use App\Models\log;
use App\Models\Service;
use App\Models\stock;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Admincontroller extends Controller
{
    //
    public function Login()
    {
        return view('Login');
    }
    public function DashBoard()
    {

        return view('TemplateAdmin');
    }
    public function Logout()
    {
        return redirect('/');
    }
    public function Transaksi()
    {
        return view('Transaksi');
    }
    public function Service()
    {
        return view('Service');
    }
    function stock($id){
        $param['id'] = $id;
        return view('stock',$param);
    }
    public function MasterBarang()
    {
        $param['DataHistory'] = DB::select('select * from log');
        $param['DataBarang'] = DB::select('select b.id as id,b.Nama as nama,b.Harga as Harga ,COUNT(s.fk_barang) AS stocks from barang b , stock s WHERE b.id = s.fk_barang and s.deleted_at IS NULL GROUP by b.id,b.nama,b.Harga,s.fk_barang');
        return view('MasterBarang',$param);
    }
    public function ListService()
    {
        $param['DataService'] = DB::select("SELECT s.id as id, s.Nama_Pelanggan as Nama_Pelanggan, b.Nama as Nama, s.Deskripsi as Deskripsi, s.Status as Status FROM service s, stock st, barang b WHERE st.kode = s.Kode_Barang AND st.fk_barang = b.id");
        return view('ListService',$param);
    }
    public function ListTransaksi()
    {
        $param['DataTransaksi'] = DB::select("select * from htrans");
        $param['DataDtrans'] = DB::select('Select * from dtrans');
        return view('ListTransaksi',$param);
    }
    public function ListUsers()
    {
        $param['DataUser']= DB::select("select * from user");
        return view('ListUser',$param);
    }
    public function PLogin(Request $req)
    {
        $data = DB::select('select * from user');
        if(($req->Username == "Admin" || $req->Username == "admin") && ($req->Password == "Admin" || $req->Password == "admin")){
            //echo "Admin";
            session()->put('Login',"Admin");
            return redirect('/admin/DashBoard');
        }else{
            foreach ($data as $key => $value) {
                if ($value->Nama == $req->Username && $value->Password == $req->Password) {
                    //echo "Hai Admin Admin";
                    if($value->Status != 0){
                        session()->put('Login',$value->Username);
                        return redirect('/admin/DashBoard');
                    }
                    else{
                        return redirect()->back()->with('alert',"User TerBanned");
                    }
                }
            }
        }
    }
    public function TambahBarang(Request $req)
    {
        if($req->validate([
            "NamaBarang"=>['required'],
            "Harga"=>['required','numeric'],
            "gambar"=>['required']
        ])){
            $tgl = date_format(date_create('now'),'Y-m-d');
            $Nama = $req->NamaBarang;
            $Harga = $req->Harga;
            $gambar = $req->gambar;
            $namagambar = $gambar->getClientOriginalName();
            $NewBarang = new Barang();
            $NewBarang->InsertBarang($Nama,$Harga,$namagambar,$gambar,$tgl);
            $newlog = new log();
            $newlog->InsertLog($tgl,"Menambah Barang Baru".$Nama);
            return redirect()->back();
        }
    }

    public function UpdateBarang(Request $req)
    {
        $data = Barang::findorFail($req->id);
        //echo $data->Nama;
            $data->Harga = $req->HargaBaru;
            $data->save();
    }
    public function DeleteBarang($id)
    {
        $tgl = date_format(date_create('now'),'Y-m-d');
        $data = Barang::find($id);
        $newlog = new log();
        $newlog->InsertLog($tgl,"Menghapus".$data->Nama);
        $data->delete();
        return redirect()->back();
    }
    public function UpdateService($id)
    {
        //echo $id;
        $data = Service::findorFail($id);
        if($data->Status == 0){
            $data->Status = 1;
            $data->save();
        }
        else if($data->Status == 1){
            $data->Status = 2;
            $data->save();
        }
        return redirect()->back();
    }
    public function CekKode(Request $req)
    {
        $databarang = DB::select("SELECT b.id as id,s.id as idstock, b.Nama as Nama,b.Harga as Harga,s.kode as kode FROM barang b, stock s WHERE s.fk_barang = b.id and s.kode = '$req->KodeBarang'");
        //echo $databarang[0]->Nama;
        //session()->put('DetailBarang',$databarang);
        //print_r(session()->get('DetailBarang'));

        $datacart = [];
        if(session()->has('DataCart')){
            $datacart = session()->get('DataCart');
            foreach ($datacart as $key => $value) {
                $tot = 1 * $databarang[0]->Harga;
                    $datacart[] =[
                        'Kode'=>$databarang[0]->kode,
                        'idbarang'=>$databarang[0]->id,
                        'idstock' =>$databarang[0]->idstock,
                        'NamaBarang'=>$databarang[0]->Nama,
                        'Harga'=>$databarang[0]->Harga,
                        'Jumlah'=>1,
                        'TotalPrice'=>$tot
                    ];
            }
            //print_r(session()->get('DataCart'));
        }
        else{
            $tot = 1 * $databarang[0]->Harga;
            $datacart[] =[
                'Kode'=>$databarang[0]->kode,
                'idbarang'=>$databarang[0]->id,
                'idstock' =>$databarang[0]->idstock,
                'NamaBarang'=>$databarang[0]->Nama,
                'Harga'=>$databarang[0]->Harga,
                'Jumlah'=>1,
                'TotalPrice'=>$tot
            ];
        }
        session()->put('DataCart',$datacart);
        return redirect()->back();
    }
    public function Cart(Request $req)
    {
        $datacart = [];
        if(session()->has('DataCart')){
            $datacart = session()->get('DataCart');
            //print_r(session()->get('DataCart'));
        }
        $datacart[] =[
            'Kode'=>$req->Kode,
            'NamaBarang'=>$req->NamaBarang,
            'Harga'=>$req->Harga,
            'Jumlah'=>$req->Jumlah,
            'TotalPrice'=>$req->Total
        ];
        session()->forget('DetailBarang');
        session()->put('DataCart',$datacart);
        return redirect()->back();
        //print_r(session()->get('DataCart'));
    }
    public function DeleteBarangCart($kode)
    {
        $data= session()->get('DataCart');
        foreach ($data as $key => $value) {
            if ($key == $kode) {
                //echo $value['NamaBarang'];
                unset($data[$key]);
                session()->put('DataCart',$data);
                return redirect()->back();
            }
        }
    }
    public function CheckOut()
    {
        $status=0;
        $tgl = date_format(date_create('now'),'Y-m-d');
        $tgl2 = date_format(date_create('now'),'Ymd');
        $datatransaksi = DB::select("select * from htrans");
        $countdatatrans = count($datatransaksi)+1;
        $Kode = "";
        if($countdatatrans < 10){
            $Kode = $tgl2."000".$countdatatrans;
        }
        else if($countdatatrans >= 10){
            $Kode = $tgl2."00".$countdatatrans;
        }
        else if($countdatatrans >99){
            $Kode = $tgl2."0".$countdatatrans;
        }
        else if($countdatatrans > 999){
            $Kode = $tgl2.$countdatatrans;
        }
        $users = session()->get('Login');
        if($users == "Admin"){
            $id = 0;
        }
        else{
            $data = DB::select('select * from user');
            foreach ($data as $key => $value) {
                if ($users == $value->Username) {
                    $id = $value->id;
                }
            }
        }
        $total =0;
        $data = session()->get('DataCart');
        foreach ($data as $key => $value) {
            $total += $value['TotalPrice'];
        }
        //echo $id;
        $newhtrans = new htrans();
        $newhtrans->inserthtrans($Kode,$total,$id,$tgl,$status);
        $newdtrans = new dtrans();
        foreach (session()->get('DataCart') as $key => $value) {
            $newdtrans->adddtrans($Kode,$value['NamaBarang'],$value['Kode'],$value['Harga'],$value['Jumlah'],$value['TotalPrice']);
        }
        foreach (Session::get('DataCart') as $key => $value) {
            $delete = stock::find($value['idstock']);
            $delete->delete();
        }
        session()->forget('DataCart');
        return redirect()->back();
    }
    public function getSnapToken()
    {

        $tgl2 = date_format(date_create('now'),'Ymd');
        $datatransaksi = DB::select("select * from htrans");
        $countdatatrans = count($datatransaksi)+1;
        $Kode = "";
        if($countdatatrans < 10){
            $Kode = $tgl2."000".$countdatatrans;
        }
        else if($countdatatrans >= 10){
            $Kode = $tgl2."00".$countdatatrans;
        }
        else if($countdatatrans >99){
            $Kode = $tgl2."0".$countdatatrans;
        }
        else if($countdatatrans > 999){
            $Kode = $tgl2.$countdatatrans;
        }
        $dataBarang=[];
        foreach (Session::get("DataCart") as $key => $value) {
            $dataBarang[]=array(
                    "id"=> $value["idbarang"],
                    "price"=> $value["Harga"],
                    "quantity"=> $value["Jumlah"],
                    "name"=> $value["NamaBarang"],
                    "brand"=> "",
                    "category"=> "",
                    "merchant_name"=> ""
            );
        }
        if(Session::get('Login') == 'Admin'){
            $id = 0;
        }
        else{
            $username = Session::get('Login');
            $datauser = UserModel::where('Username','=',$username)->get();
            //$id = $datauser[0]->id;
        }
            \Midtrans\Config::$serverKey = env("MIDTRANS_SERVER_KEY");
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            $params = array(
                'transaction_details' => array(
                    'order_id' => $Kode,
                    'gross_amount' => 0,
                ),
                'customer_details' => array(
                    'first_name' => 'customer',
                    'last_name' => '',
                    'email' => 'customer@gmail.com',
                    'phone' => "blabla",
                    'adress'=>"blabla"
                ),
                'item_details' => $dataBarang
            );
            \Midtrans\Snap::getSnapToken($params);
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            echo $snapToken;
    }
    public function Ban($id)
    {
        //echo $id;
        $data = UserModel::findorFail($id);
        $data->Status = 0;
        $data->save();
        return redirect()->back();
    }
    public function UnBan($id)
    {
        //echo $id;
        $data = UserModel::findorFail($id);
        $data->Status = 1;
        $data->save();
        return redirect()->back();
        //print_r($data);
    }
    public function TambahService(Request $req)
    {
        //echo $req->NamaCustomer;
        $tgl = date_format(date_create('now'),'Y-m-d');
        $tgl2 = date_format(date_create('now'),'Ymd');
        $dataService = DB::select("select * from service");
        $countdata = count($dataService)+1;
        $Kode = "SB";
        if($countdata < 10){
            $Kode = $Kode.$tgl2."000".$countdata;
        }
        else if($countdata >= 10){
            $Kode = $Kode.$tgl2."00".$countdata;
        }
        else if($countdata > 99){
            $Kode = $Kode.$tgl2."0".$countdata;
        }
        else if($countdata > 999){
            $Kode = $Kode.$tgl2.$countdata;
        }
        //echo $Kode;
        $namacustomer = $req->NamaCustomer;
        $Tlp = $req->NoTlp;
        $Alamat = $req->Alamat;
        $Deskripsi = $req->Deskripsi;
        $newService = new Service();
        $newService->AddService($Kode,$Tlp,$namacustomer,$Deskripsi,$Alamat,$tgl);
        return redirect()->back();
    }
    function addstock(Request $req){
        $idbarang = $req->id;
        $kode = $req->KodeBarang;
        $tgl = date_format(date_create('now'),'Y-m-d');
        //$data = DB::select("select b.nama as Nama from barang b , stock s where b.id = s.fk_barang and s.kode = '$kode' ");
        $databarang = DB::select("select * from barang b , stock s where b.id = s.fk_barang and s.kode = '$kode' and b.id = '$idbarang'");
        if($databarang != null){
            return redirect()->back()->with('msg','Stock sudah terdaftar');
        }
        else{
            $data = Barang::where('id','=',$idbarang)->get();
            $newstock = new stock();
            $newstock->addstock($idbarang,$kode);
            $newlog = new log();
            $msg = "Berhasil Menambah Stock".$data[0]->Nama;
            $newlog->InsertLog($tgl,$msg);
            //echo $kode.",".$id;
            return redirect()->back()->with('msg','Berhasil Memasukan data');
        }
    }
    function test(){
        $datastock = stock::find(2);
        $datastock->delete();
    }
    function nota(){

    }
}
