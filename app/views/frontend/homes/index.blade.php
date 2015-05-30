@extends("layouts/funny")

@section('content')
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="page-header">
      
    </div>
</div>
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="col-lg-4 col-sm-4 col-xs4 box-film">
        <div class="page-title">
            <h4 class="title">Phim bộ mới cập nhật</h4>
        </div>
        <ul class="list">
            @foreach($data['films']['series']['new'] as $film)
            <li>
                <span class="num">
                    
                </span>
                <a href="">{{$film->title}}</a>
                <span class="status">
                    
                </span>
                <div class="none">
                    {{HTML::image(tim_thumb($film->thumbnail))}}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs4">
        <div class="page-title">
            <h4 class="title">Phim bộ mới cập nhật</h4>
        </div>
        <ul class="">
            
        </ul>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs4">
        <div class="page-title">
            <h4 class="title">Phim bộ mới cập nhật</h4>
        </div>
        <ul class="">
            
        </ul>
    </div>
</div>
@stop
