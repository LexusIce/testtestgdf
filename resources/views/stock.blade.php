@extends('TemplateAdmin')
@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Barang</div>
                    <div class="card-body">
                        @include('alert')
                        <form action="{{url('/admin/addstock')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Kode</label>
                                <input type="text" id="KodeBarang" class="form-control" name="KodeBarang">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('ScannerBarcode')
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
@endpush
