@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
           @include('layout.slide')
    
            <div class="space20"></div>
    
    
            <div class="row main-left">
                @include('layout.menu')
    
                <div class="col-md-9">
                    <div class="panel panel-default">            
                        <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                            <h2 style="margin-top:0px; margin-bottom:0px;"></h2>
                        </div>
    
                        <div class="panel-body">
                            @foreach ($theloai as $tl)
                                <!-- item -->
                                @if(count($tl->loaitin)>0 && count($tl->tintuc)>2)
                                    <div class="row-item row">
                                        <h3>
                                        <a href="category.html">{{$tl->Ten}}</a>
                                            @foreach ($tl->loaitin as $lt)
                                                <small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.trungle"><i>{{$lt->Ten}}</i></a>/</small>
                                            @endforeach
                                        </h3>
                                        <?php
                                        $data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                                        $tintuc1 = $data->shift();
                                        ?>
                                        <div class="col-md-8 border-right" style="min-height: 250px;">
                                            <div class="col-md-5">
                                                <a href="tintuc/{{$tintuc1['id']}}/{{$tintuc1['TieuDeKhongDau']}}.trungle">
                                                <img class="img-responsive" src="upload/tintuc/{{$tintuc1['Hinh']}}" alt="">
                                                </a>
                                            </div>
            
                                            <div class="col-md-7">
                                                <h3>{{$tintuc1['TieuDe']}}</h3>
                                                <p>{!!$tintuc1['TomTat']!!}</p>
                                                <a class="btn btn-primary" href="tintuc/{{$tintuc1['id']}}/{{$tintuc1['TieuDeKhongDau']}}.trungle">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                            </div>
            
                                        </div>
                                        
            
                                        @foreach ($data as $tt)
                                        <div class="col-md-4">
                                                <a href="detail.html">
                                                    <h4>
                                                        <span class="glyphicon glyphicon-list-alt"></span>
                                                        <a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.trungle">{{$tt['TieuDe']}}</a>
                                                    </h4>
                                                </a>
                                            </div>
                                        @endforeach
                                        
                                        <div class="break"></div>
                                    </div>
                                @endif  
                                <!-- end item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- end Page Content -->
@endsection