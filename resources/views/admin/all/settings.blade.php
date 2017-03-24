@extends('admin.body')



@section('body')
<div class="page-title">
    <h1 class="bold">Settings</h1>
</div>

<div class="settings">
    <div class="container-fluid">
        @include('errors.list')
        
        <form class="form" action="" method="post">
            {{ csrf_field() }}

            <h2 class="mt-41">Application Details</h2>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Application name</label>
                        <input type="text" name="app_name" value="{{ $set->app_name }}" class="form-control input-lg input-white" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Admin email</label>
                        <input type="email" name="admin_email" value="{{ $set->admin_email }}" class="form-control input-lg input-white" required>
                    </div>
                </div>
            </div>





            <h2 class="mt-20">Business Details</h2>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Business Contact Person</label>
                        <input type="text" name="business_to_name" value="{{ $set->business_to_name }}" class="form-control input-lg input-white">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Business Contact Email</label>
                        <input type="email" name="business_to_email" value="{{ $set->business_to_email }}" class="form-control input-lg input-white">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Business Phone</label>
                        <input type="text" name="phone" value="{{ $set->phone }}" class="form-control input-lg input-white">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Business Phone 2</label>
                        <input type="text" name="phone2" value="{{ $set->phone2 }}" class="form-control input-lg input-white">
                    </div>
                </div>
            </div>
            {{-- End of row  --}}


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="addresse_street" value="{{ $set->addresse_street }}" class="form-control input-lg input-white">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Suburb</label>
                        <input type="text" name="addresse_suburb" value="{{ $set->addresse_suburb }}" class="form-control input-lg input-white">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" name="addresse_postcode" value="{{ $set->addresse_postcode }}" class="form-control input-lg input-white">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" name="addresse_state" value="{{ $set->addresse_state }}" class="form-control input-lg input-white">
                    </div>
                </div>
            </div>



            <div class="mt-20 text-right">
                <button type="submit" class="btn btn-lg btn-blue">
                    <i class="flaticon-check"></i>
                    Update Settings
                </button>
            </div>






        </form>
    </div>
</div>


@endsection
