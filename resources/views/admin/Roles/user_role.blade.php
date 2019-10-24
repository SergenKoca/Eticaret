@extends('admin.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Roller <small></small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 40%">Kullanıcı Adı</th>
                                <th style="width: 10%">E-posta</th>
                                <th style="width: 10%">Rol</th>
                                <th style="width: 10%">Oluşturma Tarihi</th>
                                <th style="width: 10%">Güncelleme Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td style="width: 5%">{{$user->id}}</td>
                                    <td style="width: 5%">
                                        {{$user->name}}
                                    </td>
                                    <td style="width: 5%">
                                        <a>{{$user->email}}</a>
                                    </td>
                                    <td style="width: 5%">
                                        <a>{{$user->role}}</a>
                                    </td>

                                    <td style="width: 10%">
                                        <small>{{$user->created_at}}</small>
                                    </td>
                                    <td style="width: 10%">
                                        <small>{{$user->updated_at}}</small>
                                    </td>
                                    <td style="width: 15%">
                                        <a href="{{route('role.editController.editUserRole',['user_id'=>$user->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Düzenle </a>
                                        <a href="{{route('role.deleteController.delete',['user_id'=>$user->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Sil </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

