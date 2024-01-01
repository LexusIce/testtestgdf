@extends('TemplateAdmin')
@section('contents')
{{-- @dd(session()->get("DataCart")) --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Transaksi</div>
                <div class="card-body">
                    @include('alert')
                    <form action="{{url('/admin/CekKode')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Kode</label>
                            <input type="text" id="KodeBarang" class="form-control" name="KodeBarang">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                    {{-- <hr> --}}
                    {{-- @if (session()->has('DetailBarang'))
                        <form action="{{url('/admin/Cart')}}" method="post">
                            @php
                                $databarang = session()->get('DetailBarang');
                            @endphp
                            @csrf
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Nama</label>
                                <input type="text" id="KodeBarang" class="form-control" name="NamaBarang" value="{{$databarang[0]->Nama}}">
                                <input type="hidden" name="Kode" value="{{$databarang[0]->kode}}">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Harga</label>
                                <input type="number" id="Harga" class="form-control" name="Harga" value="{{$databarang[0]->Harga}}">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Jumlah</label>
                                <input type="number" id="Jumlah" class="form-control" name="Jumlah" value="0">
                            </div>
                            <span id="total">Rp.0,--</span><br>
                            <input type="hidden" id="Total" name="Total">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </form>
                    @else
                    <form action="{{url('/admin/Cart')}}" method="post">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Nama</label>
                            <input type="text" id="KodeBarang" class="form-control" name="NamaBarang">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Harga</label>
                            <input type="number" id="Harga" class="form-control" name="Harga">
                        </div>
                        <div class="form-group">
                            <label for="company" class=" form-control-label">Jumlah</label>
                            <input type="number" id="Jumlah" class="form-control" name="Jumlah" value="0">
                        </div>
                        <span id="total">Rp.0,--</span><br>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                    </form>
                    @endif --}}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Barang</div>
                <div class="card-body">
                    <div class="table-responsive table-data">

                            <a href="{{url('/admin/Checkout')}}">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                            </a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>Harga</td>
                                        <td>Jumlah</td>
                                        <td>Total</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @if (session()->has('DataCart'))
                                            @foreach (session()->get('DataCart'); as $key=> $datacart )
                                                    <tr>
                                                        <td>{{$datacart['NamaBarang']}}</td>
                                                        <td>{{"Rp. ".number_format($datacart['Harga'])}}</td>
                                                        <td><input type="number" name="qty" id="qty" value="{{$datacart['Jumlah']}}"></td>
                                                        <td>{{"Rp. ".number_format($datacart['TotalPrice'])}}</td>
                                                        <td>
                                                            <a href="{{url('/admin/DeleteBarangCart/'.$key)}}"><div  class="btn btn-danger btn-sm">Delete</div></a>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </form>
                            </table>
                        @php
                            $grandtot = 0;
                            if(session()->has('DataCart')){
                                $data = session()->get('DataCart');
                                foreach ($data as $key => $value) {
                                    $grandtot += $value['TotalPrice'];
                                }
                            }
                        @endphp
                        <span>{{"Rp. ".number_format($grandtot)}},--</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @foreach (session()->get('DataCart') as $key=>$cart )
<div class="modal fade" id="exampleModal.<?php echo $key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endforeach --}}
@push('ScannerBarcode')
<script>
    $(document).ready(function(){
        $("#Jumlah").change(function(){
            var test1 = parseInt($('#Harga').val());
            var test2 = parseInt($('#Jumlah').val());
            var tot = test1*test2;
            document.getElementById("total").innerHTML = "Rp."+tot+",--"
            document.getElementById("Total").value = tot;
        });
    });
</script>
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
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{env('MIDTRANS_SERVER_KEY')}}"></script>
<script>
    $(document).ready(function() {
        $("#checkout").click(function() {
            alert("ketekan")
            $.ajax({
                url:"{{url("/admin/getsnapToken")}}",
                type:"POST",
                data:{"_token":"{{csrf_token()}}"},
                success:function(res){
                    snap.pay(res, {
                onSuccess: function(result){console.log('success');console.log(result);
                $.ajax({
                    url:"{{url("/admin/Checkout")}}",
                    type:"POST",
                    data:{"_token":"{{csrf_token()}}",status:"lunas",snap_token:res},
                    success:function(res){
                        window.location.href="{{url("/Histori")}}";
                    }
                })
              },
              onPending: function(result){console.log('pending');console.log(result);
                $.ajax({
                    url:"{{url("/admin/checkout")}}",
                    type:"POST",
                    data:{"_token":"{{csrf_token()}}",status:"pending",snap_token:res},
                    success:function(res){
                        window.location.href="{{url("/Histori")}}";
                    }
                })
              },
              onError: function(result){console.log('error');console.log(result);},
              onClose: function(){console.log('customer closed the popup without finishing the payment');}
            });
                }
            });
        })
    });
</script>
@endpush
