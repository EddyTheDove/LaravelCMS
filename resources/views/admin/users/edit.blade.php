@extends('admin.body')

@section('body')
<form class="" action="{{ route('centers.update', ['id' => 1]) }}" method="post">
    <div class="page-title">
        <h2>Editer Utilisateur</h2>
    </div>


    <section class="container-fluid mt-20">

        @include('errors.list')

        <div class="block">
            <div class="block-content form">

                <div class="row pb-20">
                    <div class="col-sm-6">
                        <label>Statut</label>
                        <div class="form-select grey">
                            <select name="type">
                                <option value="0">Inactif</option>
                                <option value="1">Actif</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" name="firstname" class="form-control input-lg" placeholder="Prénom de l'utilisateur" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="lastname" class="form-control input-lg" placeholder="Nom de l'utilisateur" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control input-lg" placeholder="Email de l'utilisateur">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="lastname" class="form-control input-lg" placeholder="Phone de l'utilisateur">
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-6">
                        <label>Sexe</label>
                        <div class="form-select grey">
                            <select name="type">
                                <option value="0">Masculin</option>
                                <option value="1">Féminin</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date de naissance</label>
                            <input type="text" name="dob" class="form-control input-lg" }} placeholder="Date de naissance">
                        </div>
                    </div>
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
