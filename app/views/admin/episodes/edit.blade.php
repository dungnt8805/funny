@extends("layouts/default")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="page-header">
                    <h1>{{ trans('admin.episodes.edit') }} <a href="{{ url('admin/episodes/list/'.$data['episode']->id)}}"
                                                           class="btn btn-lg btn-warning pull-right">{{ trans('admin.general.cancel') }}</a>
                    </h1>
                </div>
                @if($errors->all())
                    <div class="bs-callout bs-callout-danger">
                        <h4>{{ trans('admin.please_fix_errors') }}</h4>
                        {{ HTML::ul($errors->all())}}
                    </div>
                @endif
                {{ Form::model($data['episode'],   array('class'=>'form-horizontal'))}}
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{ trans('admin.general.position') }}</label>

                    <div class="col-lg-10">
                        {{ Form::text('position',null,array('class'=>'form-control','disabled'=>'disabled'))}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">{{ trans('admin.general.url') }}</label>

                    <div class="col-lg-10">
                        {{ Form::text('url',null,array('class'=>'form-control'))}}
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