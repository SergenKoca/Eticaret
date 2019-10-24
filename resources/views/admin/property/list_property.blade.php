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
                            ?>
                            @foreach($mainProperties as $main)
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
                                        <a href="{{route('property.listController.editMainProp',['main_id'=>$main->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="{{route('property.listController.deleteMainProp',['main_id'=>$main->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                </tr>
                                @foreach($subProperties as $sub1)
                                    @if($sub1->main_property_id == $main->id)
                                        <tr>
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
                                                <a href="{{route('property.listController.edit',['sub_id'=>$sub1->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                <a href="{{route('property.listController.deleteSubProp',['sub_id'=>$sub1->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                        </tr>
                                        <?php
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

