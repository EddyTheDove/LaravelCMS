@extends('admin.body')

@section('body')
{!! Form::open(['method' => 'POST', 'route' => ['users.store'], 'class' => 'form' ]) !!}
    <div class="page-title">
        <h2>New User</h2>
    </div>


    <section class="container-fluid mt-20">

        @include('errors.list')

        <div class="block">
            <div class="block-content form">

                <div class="row pb-20">
                    <div class="col-sm-6">
                        <label>Status</label>
                        <div class="form-select grey">
                            <select name="is_active">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label>Role</label>
                        <div class="form-select grey">
                            <select name="role_id">
                                @foreach( $roles as $role )
                                    <option value="{{ $role->id}}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" name="firstname" class="form-control input-lg" placeholder="User's firstname" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" name="lastname" class="form-control input-lg" placeholder="User's lastname" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control input-lg" placeholder="User's email ">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control input-lg" placeholder="Username">
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control input-lg" value="{{ str_random(8) }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <div class="text-right mr-20">
        <button type="submit" class="btn btn-lg btn-blue">
            <i class="flaticon-check"></i> Add User
        </button>
    </div>

{!! Form::close() !!}
@endsection
