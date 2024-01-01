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
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>No Telp</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DataUser as $data )
                                    <tr>
                                        <td>{{$data->Nama}}</td>
                                        <td>{{$data->Email}}</td>
                                        <td>{{$data->No_Telp}}</td>
                                        @if ($data->Status == 1)
                                            <td>
                                                <a href="{{url('/admin/Ban/'.$data->id)}}"><button class="btn btn-primary btn-md">Ban</button></a>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{url('/admin/UnBan/'.$data->id)}}"><button class="btn btn-danger btn-md">UnBan</button></a>
                                            </td>
                                        @endif
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
