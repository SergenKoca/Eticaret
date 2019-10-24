@extends('admin.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>News <small>List</small></h3>
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
                                <th style="width: 40%">Kategori Adı</th>
                                <th style="width: 10%">Created Date</th>
                                <th style="width: 10%">Updated Date</th>
                                <th style="width: 15%">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $x=1;
                                $y=1;
                                $z=1;
                            ?>
                            @foreach($mainCategories as $main)
                                <tr>
                                    <td style="width: 5%">{{$x}}</td>
                                    <td style="width: 40%">
                                        <a>{{$main->title}}</a>
                                    </td>
                                    <td style="width: 10%">
                                        <small>{{$main->created_at}}</small>
                                    </td>
                                    <td style="width: 10%">
                                        <small>{{$main->updated_at}}</small>
                                    </td>
                                    <td style="width: 15%">
                                        <a href="{{route('category.listController.updateMain',['main_cate_id'=>$main->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Düzenle </a>
                                        <a href="{{route('category.listController.deleteMain',['main_cate_id'=>$main->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Sil </a>
                                    </td>
                                </tr>

                                @foreach($subCategories1 as $sub1)
                                    @if($sub1->menu_id == $main->id)
                                        <tr >
                                            <td style="width: 5%">{{$x}}.{{$y}}</td>
                                            <td style="width: 40%">
                                                <a>{{$sub1->title}}</a>
                                            </td>
                                            <td style="width: 10%">
                                                <small>{{$sub1->created_at}}</small>
                                            </td>
                                            <td style="width: 10%">
                                                <small>{{$sub1->updated_at}}</small>
                                            </td>
                                            <td style="width: 15%">
                                                <a href="{{route('category.listController.updateSubCategory',['sub_cate_1'=>$sub1->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Düzenle </a>
                                                <a href="{{route('category.listController.deleteSub1',['sub_cate_1'=>$sub1->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Sil </a>
                                            </td>
                                        </tr>
                                        @foreach($subCategories2 as $sub2)
                                            @if($sub2->menu_id == $sub1->id && $sub1->menu_id == $main->id)
                                                <tr>
                                                    <td style="width: 5%">{{$x}}.{{$y}}.{{$z}}</td>
                                                    <td style="width: 40%">
                                                        <a>{{$sub2->title}}</a>
                                                    </td>
                                                    <td style="width: 10%">
                                                        <small>{{$sub2->created_at}}</small>
                                                    </td>
                                                    <td style="width: 10%">
                                                        <small>{{$sub2->updated_at}}</small>
                                                    </td>
                                                    <td style="width: 15%">
                                                        <a href="{{route('category.listController.updateSub2Category',['sub_cate_2'=>$sub2->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Düzenle </a>
                                                        <a href="{{route('category.listController.deleteSub2',['sub_cate_2'=>$sub2->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Sil </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $z=$z+1;
                                                ?>
                                            @endif
                                        @endforeach
                                        <?php
                                        $z=1;
                                        $y=$y+1;
                                        ?>
                                        @endif
                                    @endforeach
                                <?php
                                    $y=1;
                                    $x=$x+1;
                                ?>
                            @endforeach
                            <?php
                            $x=1;
                            $y=1;
                            $z=1;
                            ?>
                            </tbody>
                        </table>
                        <!-- end project list -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

