@extends('admin.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ürün <small>Listesi</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 40%">Ana Kategori Adı</th>
                                <th style="width: 10%">Alt Kategori 1 Adı</th>
                                <th style="width: 10%">Alt Kategori 2 Adı</th>
                                <th style="width: 15%">Ürün Adı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($mains);$i++)
                                <tr>
                                    <td style="width: 5%">{{$products[$i]->id}}</td>
                                    <td style="width: 5%">
                                        <a>{{$mains[$i]->title}}</a>
                                    </td>
                                    <td style="width: 5%">
                                        <a>{{$subs1[$i]->title}}</a>
                                    </td>
                                    <td style="width: 10%">
                                        <a>{{$subs2[$i]->title}}</a>
                                    </td>
                                    <td style="width: 10%">
                                        <a>{{$products[$i]->title}}</a>
                                    </td>
                                    <td style="width: 15%">
                                        <a href="{{route('product.edit.editController.editProduct',['product_id'=>$products[$i]->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Düzenle </a>
                                        <a href="{{route('product.listController.delete',['product_id'=>$products[$i]->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Sil </a>
                                    </td>
                                </tr>

                            @endfor
                            </tbody>
                        </table>
                        <!-- end project list -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

