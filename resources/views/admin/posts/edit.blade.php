@extends('admin.body')


@section('head')
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection

@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('pages.index') }}" class="btn btn-lg btn-grey">
                <i class="flaticon-undo"></i> Cancel
            </a>
            <a href="/{{ $page->slug }}" class="btn btn-lg btn-green">
                <i class="flaticon-view"></i> View Page
            </a>
        </div>

        <div class="title">
            Edit Page
        </div>
    </div>

    <section class="mt-20">
        <div class="container-fluid">
            @include('errors.list')

            {!! Form::model($page, ['method' => 'PATCH', 'route' => ['pages.update', $page->id], 'class' => 'form' ]) !!}
            {{-- Left side  --}}
            <div class="row">
                <div class="col-sm-8">
                    <div class="block">
                        <div class="block-content">
                            <div class="form-group">
                                {!! Form::text('title', null, [
                                    'class' => 'form-control input-lg',
                                    'required' => 'required',
                                    'placeholder' => 'Page title']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::text('slug', null, [
                                    'class' => 'form-control input-lg',
                                    'required' => 'required',
                                    'disabled' => 'disabled']) !!}
                            </div>

                            <div class="mt-40">
                                {!! Form::label('Excerpt') !!}
                                {!! Form::textarea('excerpt', null, ['class' => 'form-control no-resize', 'rows' => '3']) !!}
                            </div>

                            <div class="mt-20">
                                {!! Form::label('Content') !!}
                                {!! Form::textarea('content', null, ['class' => 'tiny']) !!}
                            </div>

                            <div class="form-group mt-20">
                                {!! Form::label('Tags') !!}
                                {!! Form::text('tags', null, [
                                    'class' => 'form-control input-lg tags',
                                    'placeholder' => 'Tags']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of col 9 --}}


                <div class="col-sm-4">
                    <div class="block">
                        <div class="block-content">
                            <div class="form-select grey">
                                {!! Form::select('status',
                                    ['unpublished' => 'Unpublished', 'published' => 'Published'],
                                    $page->status) !!}
                            </div>

                            <div class="form-select grey">
                                <select class="" name="template">
                                    @foreach (config('templates.pages') as $key => $value)
                                        <option value="{{ $key }}" {{ $page->template == $key ? 'seletected' : '' }}>{{ $key }} template</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-20">
                                <button type="submit" name="submit" class="btn btn-lg btn-blue btn-block">
                                    <i class="flaticon-check"></i> Update Page
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="block mt-40">
                        <div class="block-content">
                            <h3>Image Preview</h3>

                            <input type="hidden" class="form-control" id='profile' name='image' readonly value="{{ $page->image }}">
                            <div id="profile_view" class="mt-20"></div>

                            <div class="text-right">
                                <a href="/backend/filemanager/dialog.php?type=1&field_id=profile" class="iframe-btn btn-dark btn round"> <i class='flaticon-folder'></i> Files</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of col 3 --}}


            </div>

            {!! Form::close() !!}

        </div>
    </section>
@endsection


@section('js')
<script type="text/javascript" src="/backend/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="/backend/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function() {
    $('.tags').tokenfield();

    $('.iframe-btn').fancybox({
        'width'     : 900,
        'maxHeight' : 600,
        'minHeight'    : 400,
        'type'      : 'iframe',
        'autoSize'      : false
    });

    $("body").hover(function() {
        var profilePic = $("input[name='image']").val();
        if(profilePic)
            $('#profile_view').html("<img class='thumbnail img-responsive mb-10' src='" + profilePic +"'/>");
    });
})

tinymce.init({
    selector: ".tiny",
    theme: "modern",
    relative_urls: false,
    height : 280,
    fontsize_formats: "8px 10px 12px 14px 16px 18px 24px 32px 36px 60px",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor filemanager code"
   ],
   toolbar1: "undo redo | fontsizeselect bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
   toolbar2: "|filemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | styleselect",
   image_advtab: true ,

    external_filemanager_path:"/backend/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "/backend/filemanager/plugin.min.js"}
});
</script>
@endsection
