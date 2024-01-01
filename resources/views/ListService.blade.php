@extends('TemplateAdmin');
@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Service</div>
                <div class="card-body">
                    <div class="table-responsive table-data">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <td>Nama Customer</td>
                                    <td>Nama Product</td>
                                    <td>Deskripsi</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DataService as $data )
                                    <tr>
                                        <td>{{$data->Nama_Pelanggan}}</td>
                                        <td>{{$data->Nama}}</td>
                                        <td>{{$data->Deskripsi}}</td>
                                        @if ($data->Status == 0)
                                            <td>Menunggu</td>
                                        @elseif($data->Status == 1)
                                            <td>Sedang DiProses</td>
                                        @elseif($data->Status == 2)
                                            <td>Selesai</td>
                                        @endif
                                        <td>
                                            <a href="{{url('admin/UpdateService/'.$data->id)}}"><button class="btn btn-primary btn-md">Update</button></a>
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
