@extends('admin.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ana Kategori <small>Güncelle</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="{{route('category.listController.updateMainPost',['main_cate_id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <h2>Kategori Adı</h2>
                                <div class="col-sm-12">
                                    <input id="title" name="title" type="text" class="form-control" value="{{$category->title}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h2>Kategori Sırası</h2>
                                <div class="col-sm-12">
                                    <input id="order" name="order" type="number" class="form-control" value="{{$category->order}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Ekle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

