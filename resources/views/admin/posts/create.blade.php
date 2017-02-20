@extends('admin.body')


@section('head')
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection

@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('posts.index') }}" class="btn btn-lg btn-grey">
                <i class="flaticon-undo"></i> Cancel
            </a>
        </div>

        <div class="title">
            New Post
        </div>
    </div>

    <section class="mt-20">
        <div class="container-fluid">
            @include('errors.list')

            <form class="form" action="{{ route('posts.index') }}" method="post">
                {{ csrf_field() }}

                {{-- Left side  --}}
                <div class="row">
                    <div class="col-sm-8">
                        <div class="block">
                            <div class="block-content">
                                <div class="form-group">
                                    <input type="text" name="title" value="{{ old('title') }}"
                                    required
                                    placeholder="Post title"
                                    id="slug-source"
                                    class="form-control input-lg">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="slug" value="{{ old('slug') }}"
                                    required
                                    placeholder="Post slug"
                                    id="slug-target"
                                    class="form-control input-lg">
                                </div>

                                <div class="mt-40">
                                    <label>Excerpt</label>
                                    <textarea name="excerpt" class="form-control no-resize" rows="3"></textarea>
                                </div>

                                <div class="mt-20">
                                    <label>Content</label>
                                    <textarea name="content" class="tiny"></textarea>
                                </div>

                                <div class="form-group mt-20">
                                    <label>Tags</label>
                                    <input type="text" name="tags" value="{{ old('tags') }}"
                                    placeholder="Tags"
                                    class="form-control input-lg tags">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End of col 9 --}}


                    <div class="col-sm-4">
                        <div class="block">
                            <div class="block-content">
                                <div class="form-select grey">
                                    <select class="" name="status">
                                        <option value="unpublished">Unpublished</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>

                                <div class="mt-20">
                                    <button type="submit" name="submit" class="btn btn-lg btn-blue btn-block">
                                        <i class="flaticon-check"></i> Save Post
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="block mt-40">
                            <div class="block-content">
                                <h3>Image Preview</h3>

                                <input type="hidden" class="form-control" id='profile' name='image' readonly value="{{ old('image') }}">
                                <div id="profile_view" class="mt-20"></div>

                                <div class="text-right">
                                    <a href="/backend/filemanager/dialog.php?type=1&field_id=profile" class="iframe-btn btn-dark btn round"> <i class='flaticon-folder'></i> Files</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End of col 3 --}}


                </div>

            </form>
        </div>
    </section>
@endsection


@section('js')
<script type="text/javascript" src="/backend/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="/backend/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function() {
    $('#slug-target').slugify('#slug-source');
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
