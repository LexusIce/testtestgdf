@extends('TemplateAdmin');
@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Transaksi</div>
                <div class="card-body">
                    <div class="table-responsive table-data">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <td>Tgl</td>
                                    <td>Kode</td>
                                    <td>Grand Total</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DataTransaksi as $data)
                                    <tr>
                                        <td>{{$data->Create_at_htrans}}</td>
                                        <td>{{$data->id}}</td>
                                        <td>{{'Rp. '.number_format($data->Grand_Total)}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-md"data-toggle="modal" data-target="#exampleModal<?php echo $data->id?>">Detail</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@foreach ($DataTransaksi as $data)
<div class="modal fade" id="exampleModal<?php echo $data->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive table-data">
                <table class='table'>
                    <thead>
                        <tr>
                            <td>Nama Barang</td>
                            <td>Harga</td>
                            <td>Jumlah</td>
                            <td>Total</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($DataDtrans as $datas )
                            @if ($data->id == $datas->fk_htrans)
                                <tr>
                                    <td>{{$datas->Nama_item}}</td>
                                    <td>{{'Rp. '.number_format($datas->Harga)}}</td>
                                    <td>{{$datas->Jum}}</td>
                                    <td>{{"Rp. ".number_format($datas->Total)}}</td>
                                    @if ($datas->status == 0)
                                        <td>{{"Belum Lunas"}}</td>
                                    @else
                                        <td>{{"Lunas"}}</td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
