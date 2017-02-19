@extends('admin.body')

@section('body')
<form class="" action="{{ route('centers.update', ['id' => 1]) }}" method="post">
    <div class="page-title">
        <h2>Editer Centre Sanitaire</h2>
    </div>


    <section class="container-fluid mt-20">

        @include('errors.list')

        <div class="block">
            <div class="block-content form">


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nom du centre</label>
                            <input type="text" name="name" class="form-control input-lg" placeholder="Nom du centre" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label>Type de centre</label>
                        <div class="form-select grey">
                            <select name="type">
                                <option value="hopital">Hôpital</option>
                                <option value="dipensaire">Dispensaire</option>
                                <option value="clinique">Clinique</option>
                                <option value="laboratoire">Laboratoire</option>
                                <option value="pharmacie">Pharmacie</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-6">
                        <label>Ville</label>
                        <div class="form-select grey">
                            <select name="type">
                                <option value="lolodorf">Lolodorf</option>
                                <option value="mindourou">Mindourou</option>
                                <option value="Tcholire">Tcholiré</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Quartier</label>
                            <input type="text" name="quarter" class="form-control input-lg" placeholder="Quartier du centre">
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control input-lg" value="{{ old('latitude') }}" placeholder="Latitude" >
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control input-lg" value="{{ old('longitude') }}" placeholder="Longitude">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>A propos du centre</label>
                    <textarea class="form-control tiny" name="description">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>
    </section>




    <div class="text-right mr-20">
        <button type="submit" class="btn btn-lg btn-blue">
            <i class="flaticon-check"></i> Sauvegarder
        </button>
    </div>

    {{ csrf_field() }}
</form>
@endsection



@section('js')
<script type="text/javascript" src="/backend/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: ".tiny",
    theme: "modern",
    relative_urls: false,
    height : 280,
    theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
    font_size_style_values : "10px,12px,13px,14px,16px,18px,20px",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor filemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "|filemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,

    external_filemanager_path:"/backend/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "/backend/filemanager/plugin.min.js"}
});
</script>
@endsection
