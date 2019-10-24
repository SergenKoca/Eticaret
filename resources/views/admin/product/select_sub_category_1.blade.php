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
                    <form class="form-horizontal form-label-left" action="{{route('name_product.sub1.controller_post',['main_id'=>$mainCategories->id])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <h2>Ana Kategori</h2>
                            <div class="col-sm-12">
                                <input  disabled="false" id="main_title" name="main_title" type="text" class="form-control" value="{{$mainCategories->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Alt Kategori 1 Seç</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="sub_cate_1_id" class="form-control">
                                    @foreach($subCategories1 as $subs)
                                        <option value="{{$subs->id}}">{{$subs->title}}</option>
                                    @endforeach
                                </select>
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

