@extends('TemplateAdmin')
@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Service</div>
                    <div class="card-body">
                        <form action="{{url('/admin/TambahService')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Kode</label>
                                <input type="text" id="KodeBarang" class="form-control" name="KodeBarang">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Nama Customer</label>
                                <input type="text" id="company" class="form-control" name="NamaCustomer">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">No Telpone</label>
                                <input type="text" id="company" class="form-control" name="NoTlp">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Alamat</label>
                                <input type="text" id="company" class="form-control" name="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Deskripsi</label>
                                <input type="text" id="company" class="form-control" name="Deskripsi">
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
