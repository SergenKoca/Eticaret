@extends('admin.main')
@section('content')
    <form class="form-horizontal form-label-left" action="{{route('name_product.main.controller_post')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <h2>Ana Kategori Seç</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <select name="id" class="form-control">
                    @foreach($mainCategories as $main)
                        <option value="{{$main->id}}">{{$main->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">İleri</button>
            </div>
        </div>
    </form>

@endsection
