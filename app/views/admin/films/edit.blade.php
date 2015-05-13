@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header">
                    <h1>{{ trans('admin.films.edit') }} <a href="{{ url('admin/films')}}"
                                                           class="btn btn-lg btn-warning pull-right">{{ trans('admin.general.cancel') }}</a>
                    </h1>
                </div>
                @if($errors->all())
                    <div class="bs-callout bs-callout-danger">
                        <h4>{{ trans('admin.please_fix_errors') }}</h4>
                        {{ HTML::ul($errors->all())}}
                    </div>
                @endif
                {{ Form::model($data['film'],   array('class'=>'form-horizontal'))}}
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{ trans('admin.general.title') }}</label>

                    <div class="col-lg-10">
                        {{ Form::text('title',null,array('class'=>'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{ trans('admin.general.eng_title') }}</label>

                    <div class="col-lg-10">
                        {{ Form::text('eng_title',null,array('class'=>'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{ trans('admin.general.thumbnail') }}</label>

                    <div class="col-lg-10">
                        {{ Form::text('thumbnail',null,array('class'=>'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{ trans('admin.general.nation') }}</label>

                    <div class="col-lg-10">
                        {{ Form::select('nation_id',$data['nations'],null,array('class'=>'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="trailer"
                           class="col-lg-2 control-label">{{trans('admin.general.trailer')}}</label>

                    <div class="col-lg-10">
                        {{Form::text('trailer',null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <label for="is_series"
                           class="col-lg-2 control-label">{{trans('admin.general.is_series')}}</label>

                    <div class="col-lg-2">
                        {{Form::checkbox('multi',1,null,['class'=>'form-control'])}}
                    </div>
                    <label for="is_series"
                           class="col-lg-2 control-label">{{trans('admin.general.hot')}}</label>

                    <div class="col-lg-2">
                        {{Form::checkbox('hot',1,null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_series"
                           class="col-lg-2 control-label">{{trans('admin.general.quality')}}</label>

                    <div class="col-lg-10">
                        {{Form::select('quality',film_quality(),null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="durations"
                           class="col-lg-2 control-label">{{ trans('admin.general.durations') }}</label>

                    <div class="col-lg-2">
                        {{ Form::text('durations',null,array('class'=>'form-control','rows'=>'5'))}}
                    </div>
                    <label for="is_series"
                           class="col-lg-2 control-label">{{trans('admin.general.year')}}</label>

                    <div class="col-lg-2">
                        {{Form::text('year',null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="imdb"
                           class="col-lg-2 control-label">{{trans('admin.general.imdb')}}</label>

                    <div class="col-lg-10">
                        {{Form::text('imdb',null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="imdb_score"
                           class="col-lg-2 control-label">{{trans('admin.general.imdb_score')}}</label>

                    <div class="col-lg-10">
                        {{Form::text('imdb_score',null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="imdb_score"
                           class="col-lg-2 control-label">{{trans('admin.general.director')}}</label>

                    <div class="col-lg-10">
                        {{Form::text('director',null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="imdb_score"
                           class="col-lg-2 control-label">{{trans('admin.general.studios')}}</label>

                    <div class="col-lg-10">
                        {{Form::text('studios',null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="imdb_score"
                           class="col-lg-2 control-label">{{trans('admin.general.actors')}}</label>

                    <div class="col-lg-10">
                        {{Form::text('actors',null,['class'=>'form-control'])}}
                    </div>
                </div>

                {{--<div class="form-group">
                    <label for="description"
                           class="col-lg-2 control-label">{{ trans('admin.general.status') }}</label>

                    <div class="col-lg-10">
                        {{ Form::select('status',status_show_hidden(),null,array('class'=>'form-control')) }}
                    </div>
                </div>--}}
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{ trans('admin.general.keywords') }}</label>

                    <div class="col-lg-10">
                        {{ Form::text('keywords',null,array('class'=>'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{ trans('admin.general.short_description') }}</label>

                    <div class="col-lg-10">
                        {{ Form::textarea('short_description',null,array('class'=>'form-control','rows'=>4))}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {{ Form::submit( trans('admin.films.save') ,array('class'=>'btn btn-primary btn-block')); }}
                    </div>
                </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
@stop
