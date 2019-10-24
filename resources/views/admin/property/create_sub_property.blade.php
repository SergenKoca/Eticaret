@extends('admin.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Alt Özellik <small>Ekle</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <form class="form-horizontal form-label-left" action="{{route('name_add.sub.property_post')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <h2>Ana Özellik Seç</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="main_property_id" class="form-control">
                                    @foreach($mainProperties as $main)
                                        <option value="{{$main->id}}">{{$main->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Alt Özellik Adı</h2>
                            <div class="col-sm-12">
                                <input id="title" name="title" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Alt Özellik Sırası</h2>
                            <div class="col-sm-12">
                                <input id="order" name="order" type="number" class="form-control" >
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
