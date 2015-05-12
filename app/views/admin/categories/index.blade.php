@extends('layouts/default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>{{trans('admin.categories.index')}} <span class="pull-right"> <a data-toggle="modal"
                                                                                         href="#add_category"
                                                                                         class="btn btn-primary btn-lg">{{ trans('admin.categories.add') }}</a></span>
                    </h1>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ trans('admin.general.title') }}</th>
                        <th>{{ trans('admin.general.description') }}</th>
                        <th>{{ trans('admin.num_of_tricks') }}</th>
                        <th class="col-lg-3 text-right">{{ trans('admin.actions.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($categories as $category)
                        <tr rel="{{ $category->id }}">
                            <td><a href="{{url('admin/categories/view/'.$category->id)}}">{{ $category->title }}</a>
                            </td>
                            <td>{{ $category->description}}<br>
                            </td>
                            <td></td>
                            <td>
                                <div class="btn-group pull-right">
                                    <a class="btn btn-primary btn-sm"
                                       href="{{url('admin/categories/view/'.$category->id)}}">{{ trans('admin.actions.edit') }}</a>
                                    <a class="delete_toggler btn btn-danger btn-sm"
                                       rel="{{$category->id}}">{{ trans('admin.actions.delete') }}</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.categories.add') }}</h4>
                </div>
                <div class="modal-body">
                    @if($errors->all())
                        <div class="bs-callout bs-callout-danger">
                            <h4>{{ trans('admin.general.please_fix_errors') }}</h4>
                            {{ HTML::ul($errors->all())}}
                        </div>
                    @endif
                    {{ Form::open(array('class'=>'form-horizontal'))}}
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">{{ trans('admin.general.title') }}</label>

                        <div class="col-lg-10">
                            {{ Form::text('title',Input::get('title',''),array('class'=>'form-control'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail"
                               class="col-lg-2 control-label">{{trans('admin.general.thumbnail')}}</label>

                        <div class="col-lg-10">
                            {{Form::text('thumbnail',Input::get('thumbnail',''),['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-lg-2 control-label">{{ trans('admin.general.description') }}</label>

                        <div class="col-lg-10">
                            {{ Form::textarea('description',Input::get('description',''),array('class'=>'form-control','rows'=>'4'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Create',array('class'=>'btn btn-lg btn-primary btn-block')); }}
                        </div>
                    </div>
                    {{ Form::close()}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal -->
    <div class="modal fade" id="delete_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.are_you_sure') }}</h4>
                </div>
                <div class="modal-body">
                    <p class="lead text-center">{{ trans('admin.category_will_be_deleted') }}</p>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#delete_category"
                       class="btn btn-default">{{ trans('admin.keep') }}</a>
                    <a href="" id="delete_link" class="btn btn-danger">{{ trans('admin.delete') }}</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript">
        $(document).ready(function () {
            @if($errors->all())
            $('#add_category').modal('show');
            @endif
             // Populate the field with the right data for the modal when clicked
            $('.delete_toggler').each(function (index, elem) {
                $(elem).click(function (e) {
                    e.preventDefault();
                    var href = "{{url('admin/categories/delete')}}/";
                    $('#delete_link').attr('href', href + $(elem).attr('rel'));
                    $('#delete_category').modal('show');
                });
            });

        });
    </script>
@stop
