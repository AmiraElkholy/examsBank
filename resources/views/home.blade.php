@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body" style="text-align: center;">
                    <h3 style="padding-top: 10px; color: purple;">
                        Welcome <span style="color:rgb(230,11,88);">{{Auth::user()->name}}</span> : )
                    </h3>
                    <h3 style="color: purple;">
                        You are now logged in as <span style="color:red;">'admin'</span> .
                    </h3>
                    <hr>
                    <p>
                        <h2 style="text-align: center;color: green;">- Add 
                            {{Html::link('admin/questions','Questions')}} 
                        to Question Bank -</h2>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
