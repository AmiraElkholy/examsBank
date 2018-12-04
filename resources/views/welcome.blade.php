@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body" style="text-align: center;">
                    <h2 style="color: purple;">Welcome visitor, Go to {{Html::link('exam','exam')}} !</h2>
                    <p style="color: pink;">or {{Html::link('login','login')}} if you are an admin.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
