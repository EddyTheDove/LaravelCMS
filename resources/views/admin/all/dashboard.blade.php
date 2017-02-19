@extends('admin.body')



@section('body')
<div class="page-title">
    <h1>Dashboard</h1>
</div>

<div class="dashboard">
    <div class="container-fluid">
        <div class="cards row">
            <div class="col-sm-3">
                <div class="card blue">
                    <h2>{{ $users }}</h2>
                    <h4>Users</h4>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card red">
                    <h2>{{ $posts }}</h2>
                    <h4>Posts</h4>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card green">
                    <h2>{{ $comments }}</h2>
                    <h4>Comments</h4>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
