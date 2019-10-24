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
                                <th style="width: 40%">Başlık</th>
                                <th style="width: 10%">Sıra</th>
                                <th style="width: 10%">Oluşturma Tarihi</th>
                                <th style="width: 10%">Güncelleme Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td style="width: 5%">{{$role->id}}</td>
                                    <td style="width: 5%">
                                        {{$role->title}}
                                    </td>
                                    <td style="width: 5%">
                                        <a>{{$role->order}}</a>
                                    </td>

                                    <td style="width: 10%">
                                        <small>{{$role->created_at}}</small>
                                    </td>
                                    <td style="width: 10%">
                                        <small>{{$role->updated_at}}</small>
                                    </td>
                                    <td style="width: 15%">
                                        <a href="{{route('role.editController.editRole',['role_id'=>$role->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Düzenle </a>
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

