@extends('admin.main')
@section('content')

    <form class="form-horizontal form-label-left" action="{{route('name_add.property.to.category.create')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <h1>Kategoriye Özellik Ekle</h1>
            <br>
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
            <h2>Alt Kategori Seç</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <select name="sub1_id" id="sub1_id" class="form-control">
                </select>
            </div>
        </div>

        <div id="sub2_div" style="display: none" class="form-group">
            <h2>Alt Kategori Seç</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <select name="sub2_id" id="sub2_id" class="form-control">
                </select>
            </div>
        </div>

        <div id="property_div" style="display: none" class="form-group">
            <h2>Özellik Seç</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <select name="property_id" id="property_id" class="form-control">
                </select>
            </div>
        </div>



        <div id="btn_div" style="display: none" class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Kaydet</button>
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
                url:  "{{route('name_add.property.to.category.sub1')}}",
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

        $('#sub1_id').on('change',function () {
            $('#sub2_id').find('option').remove();
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                url:  "{{route('name_add.property.to.category.sub2')}}",
                type: 'get',
                data: {
                    sub1_category_id: $(this).val()
                },
                success: function (result) {
                    $(result).each(function (index) {
                        $('#sub2_id').append('<option value="'+result[index]['id']+'">'+result[index]['title']+'</option>');
                    });
                    $('#sub2_div').css("display", "block");
                }
            });
        })

        $('#sub2_id').on('change',function () {
            $('#property_id').find('option').remove();
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                url:  "{{route('name_add.property.to.category.property')}}",
                type: 'get',
                data: {
                    sub2_category_id: $(this).val()
                },
                success: function (result) {
                    console.log(result);
                    $(result).each(function (index) {
                        $('#property_id').append('<option value="'+result[index]['id']+'">'+result[index]['title']+'</option>');
                    });
                    $('#property_div').css("display", "block");
                    $('#btn_div').css("display", "block");
                }
            });
        })
    </script>
@endsection
