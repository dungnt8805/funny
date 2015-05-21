@extends('layouts/default')

@section("content")
    <script type="text/javascript" src="{{asset('resources/converts.js')}}"></script>
    <div id="result">
        <script type="text/javascript">
            <?

                        echo $function."()";
                ?>
        </script>
    </div>
@stop
