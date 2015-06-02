@extends('layouts/funny')

@section('content')
<ul class="rows" id="grid-film">
    @foreach($data['films'] as $film)
    <li class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
        <div class="thumbnail MgBT10">
            <a href="{{$film->link()}}" title="{{$film->title}}">
                <img src="{{tim_thumb($film->thumbnail,200,300)}}" alt="{{$film->title}}" class=""/>
            </a>
        </div>
        <div class="info">
            <p class="text-center vi_title">
                <a href="{{$film->link()}}" title="{{$film->title}}">
                    {{$film->title}}
                </a>
            </p>
            <p class="text-center eng_title">
                {{$film->eng_title}}
            </p>
        </div>
    </li>
    @endforeach
    <li class="pull-right">
        <a class="btn btn-default btn-block toggle-pagination">
            <i class="glyphicon glyphicon-plus"></i> {{trans('funny/text.toogle_pagination')}}</a>
        {{$data['films']->links()}}
    </li>
</ul>

@stop