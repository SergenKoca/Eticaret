@extends('admin.main')
@section('content')
    <h4>Alt Kategori 2 Güncelle</h4>
    <form class="form-horizontal form-label-left" action="{{route('category.listController.updateSub2CategoryPost',['sub_cate_2'=>$sub2->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <h2>Ana Kategori Seç</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <select id="main_id" name="main_id" class="form-control">
                    <option value="">Seçiniz</option>
                    @foreach($mainCategories as $main)
                        <option value="{{$main->id}}">{{$main->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="sub1_div" style="display: none" class="form-group">
            <h2>Alt Kategori 1 Seç</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <select name="sub1_id" id="sub1_id" class="form-control">
                </select>
            </div>
        </div>

        <div id="sub2_div"  class="form-group">
            <h2>Alt Kategori 2</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input id="title" name="title"  class="form-control" value="{{$sub2->title}}">
            </div>
        </div>

        <div  class="form-group">
            <h2>Alt Kategori 2 Sırası</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input id="order" name="order"  class="form-control" value="{{$sub2->order}}">
            </div>
        </div>

        <div id="btn_div" class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>

        $('#main_id').on('change', function () {
            $('#sub1_id').find('option').remove();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                url:  "{{route('product.addProperty.get_sub1_categories_ajax')}}",
                type: 'get',
                data: {
                    main_category_id: $(this).val()
                },
                success: function (result) {
                    $(result).each(function (index) {
                        $('#sub1_id').append('<option value="'+result[index]['id']+'">'+result[index]['title']+'</option>');
                    });
                    $('#sub1_div').css("display", "block");
                }
            }) ;
        });

    </script>
@endsection
