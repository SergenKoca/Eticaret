@extends('admin.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Role <small>Düzenle</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <form class="form-horizontal form-label-left" action="{{route('role.editController.editRolePost',['role_id'=>$role->id])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="form-group">
                                <h2>Rol adı</h2>
                                <div class="col-sm-12">
                                    <input id="title" name="title" type="text" class="form-control" value="{{$role->title}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h2>Rol Sırası</h2>
                                <div class="col-sm-12">
                                    <input id="order" name="order" type="text" class="form-control" value="{{$role->order}}">
                                </div>
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
