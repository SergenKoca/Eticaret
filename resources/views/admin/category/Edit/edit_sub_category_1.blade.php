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
                    <form class="form-horizontal form-label-left" action="{{route('category.listController.updateSubCategoryPost',['sub_cate_1'=>$category->id])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <h2>Ana Kategori Seç</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="menu_id" class="form-control">
                                    @foreach($mainCategories as $main)
                                        <option value="{{$main->id}}">{{$main->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Alt Kategori Adı</h2>
                            <div class="col-sm-12">
                                <input id="title" name="title" type="text" class="form-control" value="{{$category->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Alt Kategori Sırası</h2>
                            <div class="col-sm-12">
                                <input id="order" name="order" type="number" class="form-control" value="{{$category->order}}">
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
