    @if( $errors->any() )
        <ul class="alert alert-danger alert-dismissible list-unstyled" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @foreach( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if( session('message') )
        <ul class="alert alert-success alert-dismissible list-unstyled" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <li>{{ session('message') }}</li>
        </ul>
    @endif
