@extends('admin.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Alt Kategori 1 <small>Ekle</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <form class="form-horizontal form-label-left" action="{{route('role.editController.editUserRolePost',['user_id'=>$userRole->id])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <h2>Ana Kategori Seç</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="role_id" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Kullanıcı Adı</h2>
                            <div class="col-sm-12">
                                <input disabled="true" id="title" name="title" type="text" class="form-control" value="{{$userRole->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Kullanıcı Adı</h2>
                            <div class="col-sm-12">
                                <input disabled="true" id="title" name="title" type="text" class="form-control" value="{{$userRole->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
