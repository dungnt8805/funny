@extends('layouts/default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>{{trans('admin.films.index')}} <span class="pull-right"> <a data-toggle="modal"
                                                                                    href="{{route('admin.films.new')}}"
                                                                                    class="btn btn-primary btn-lg">{{ trans('admin.films.add') }}</a></span>
                    </h1>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th class="span1"></th>
                        <th class="col-lg-2">{{trans('admin.general.thumbnail')}}</th>
                        <th>{{ trans('admin.general.title') }}</th>
                        <th>{{ trans('admin.general.categories') }}</th>
                        <th class="text-right">{{ trans('admin.general.episode') }}</th>
                        <th class="col-lg-3 text-right">{{ trans('admin.actions.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($data['films'] as $film)
                        <tr rel="{{ $film->id }}">
                            <td></td>
                            <td>{{HTML::image(tim_thumb($film->thumbnail,51,70))}}</td>
                            <td>
                                <strong>
                                    <a href="{{url('admin/films/view/'.$film->id)}}">{{ $film->title }}</a>
                                </strong>
                            </td>
                            <td></td>
                            <td>
                                <div class="btn-group pull-right">
                                    <a class="btn btn-sm btn-info" href="">
                                        <i class="fa fa-list"></i> episodes
                                    </a>
                                    <a class="btn btn-sm btn-success" href="">
                                        <i class="fa fa-plus"></i> add new episode
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group pull-right">
                                    <a class="btn btn-primary btn-sm"
                                       href="{{url('admin/films/view/'.$film->id)}}">{{ trans('admin.actions.edit') }}</a>
                                    <a class="delete_toggler btn btn-danger btn-sm"
                                       rel="{{$film->id}}">{{ trans('admin.actions.delete') }}</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
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
