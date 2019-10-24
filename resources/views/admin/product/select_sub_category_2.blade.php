@extends('admin.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Alt Kategori 2 <small>Seç</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <form class="form-horizontal form-label-left" action="{{route('name_create_product_category_post',['main_id'=>$mainCategories->id,'sub_1_id'=>$subCategories1->id])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="col-sm-12">
                            <input  disabled="false"  type="text" class="form-control" value="{{$mainCategories->title}}">
                        </div>
                        <br>
                        <br>
                        <div class="col-sm-12">
                            <input  disabled="false"  type="text" class="form-control" value="{{$subCategories1->title}}">
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="id" class="form-control">
                                    @foreach($subCategories2 as $ub2)
                                        <option value="{{$ub2->id}}">{{$ub2->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="file"   name="image" class="btn btn-default btn-sm" title="Upload New Image">
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Ürün Adını Gir</h2>
                            <div class="col-sm-12">
                                <input id="title" name="title" type="text" class="form-control" >
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
