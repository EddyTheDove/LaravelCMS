@extends('admin.body')



@section('body')
<div class="page-title">
    <h1>Files</h1>
</div>

<div class="dashboard">
    <div class="container-fluid">
        <iframe  width="100%" height="600" frameborder="0"
        src="/backend/filemanager/dialog.php?type=0">
    </iframe>
</div>
</div>


@endsection
