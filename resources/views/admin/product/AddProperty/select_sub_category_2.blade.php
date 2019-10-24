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
                    <form class="form-horizontal form-label-left" action="{{route('product.addProperty.selectProduct',['main_id'=>$main_id,'sub_cate_1_id'=>$sub_cate_1_id])}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="sub_cate_2_id" class="form-control">
                                    @foreach($subCategories2 as $ub2)
                                        <option value="{{$ub2->id}}">{{$ub2->title}}</option>
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
