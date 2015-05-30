@extends("layouts/default")

@section("content")
    <div class="row">
        <div class="page-header">
            <h1>{{trans('admin.episodes.index')}}
                <span class="pull-right">
                    <a href="{{route('admin.episodes.new',$data['film']->id)}}"
                       class="btn btn-primary btn-lg">{{trans('admin.episodes.add')}}</a>
                </span>
            </h1>
        </div>
        <div class="col-lg-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">
                            {{trans('admin.films.information')}}
                        </th>
                    </tr>
                    <tr>
                        <td>{{trans('admin.general.title')}}</td>
                        <td>{{$data['film']->title}}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-lg-9">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>{{trans('admin.general.position')}}</th>
                    <th class="span6">{{trans('admin.general.url')}}</th>
                    <th>{{trans('admin.general.subtitle')}}</th>
                    <th>{{trans('admin.general.error')}}</th>
                    <th class="span6">{{trans('admin.actions.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['episodes'] as $ep)
                    <tr>
                        <th></th>
                        <th>{{$ep->position}}</th>
                        <th class="span6">{{$ep->url}}</th>
                        <th>{{$ep->subtitle}}</th>
                        <th>{{$ep->error}}</th>
                        <th>
                            <div class="pull-left btn-group">
                                <a class="btn btn-primary btn-xs" href="{{route('admin.episodes.view',$ep->id)}}">
                                    <i class="fa fa-edit"></i>
                                    {{trans('admin.actions.edit')}}
                                </a>
                                <a class="delete_toggler btn btn-danger btn-xs" rel="{{$ep->id}}">
                                    <i class="fa fa-remove"></i>
                                    {{ trans('admin.actions.delete') }}</a>
                            </div>

                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
                    var href = "{{url('admin/episodes/delete')}}/";
                    $('#delete_link').attr('href', href + $(elem).attr('rel'));
                    $('#delete_category').modal('show');
                });
            });

        });
    </script>
@stop