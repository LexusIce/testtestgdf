@extends('TemplateAdmin')
@section("contents")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Barang</div>
                <div class="card-body">
                    <form action="{{url('/admin/TambahBarang')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Nama</label>
                            <input type="text" id="company" class="form-control" name="NamaBarang">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Harga</label>
                            <input type="number" id="company" class="form-control" name="Harga">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Gambar</label>
                            <input type="file" id="company" class="form-control" name="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">History</div>
                <div class="card-body">
                    <div class="table-responsive table-data">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>Deskripsi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DataHistory as $Log )
                                    <tr>
                                        <td>{{$Log->Created_at_log}}</td>
                                        <td>{{$Log->Deskripsi}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Barang</div>
                <div class="card-body">
                    <div class="table-responsive table-data">
                        <table  class="table">
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td>Harga</td>
                                    <td>Jumlah Stock</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DataBarang as $barang)
                                    <tr>
                                        <td>{{$barang->nama}}</td>
                                        <td>{{"Rp. ".number_format($barang->Harga)}}</td>
                                        <td>{{$barang->stocks}}</td>
                                        <td>
                                            <Button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $barang->id?>">Edit</Button>
                                            <a href="{{url('/admin/stock/'.$barang->id)}}"><button class="btn btn-primary btn-sm">Stock</button></a>
                                            <a href="{{url('/admin/DeleteBarang/'.$barang->id)}}"><button class="btn btn-danger btn-sm">Delete</button></a>
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
@foreach ($DataBarang as $barangs)
<div class="modal fade" id="exampleModal<?php echo $barangs->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @php
                $id = $barangs->id;
                $data = \DB::select("select * from barang where id ='$id'");
            @endphp
          <form action="{{url('/admin/UpdateBarang')}}" method="post">
            @foreach ($data as $detailBarang)
                @csrf
                <div class="form-group">
                    <label for="company" class=" form-control-label">Nama Barang</label>
                    <input type="text" id="company" class="form-control" name="NamaBarang" value="{{$detailBarang->Nama}}">
                    <input type="hidden" name="id" value="{{$detailBarang->id}}">
                </div>
                <div class="form-group">
                    <label for="company" class=" form-control-label">Harga</label>
                    <input type="number" id="company" class="form-control" name="HargaBaru" placeholder="{{$detailBarang->Harga}}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            @endforeach
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
{{-- @push('ScannerBarcode')
<script>
    var barcode = '';
            var interval;
            document.addEventListener('keydown', function(evt) {
                if (interval)
                    clearInterval(interval);
                if (evt.code == 'Enter') {
                    if (barcode)
                        handleBarcode(barcode);
                    barcode = '';
                    return;
                }
                if (evt.key != 'Shift')
                    barcode += evt.key;
                interval = setInterval(() => barcode = '', 20);
            });

            function handleBarcode(scanned_barcode) {
                document.querySelector('#KodeBarang').value = scanned_barcode;
            }
</script>
@endpush --}}
