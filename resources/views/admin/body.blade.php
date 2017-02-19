<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="name" content="Izitech CMS">
    <link rel="stylesheet" href="/backend/css/app.min.css?{{ time() }}">
    @include('admin.includes.favicons')
    @yield('head')
</head>
<body>
    <div id="wrapper">
        @include('admin/includes/sidebar')

        <div id="page-content-wrapper">
            @yield('body')
        </div>
    </div>
    <script src="/backend/js/scripts.min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $(function(){
        $('.table tr[data-href]').each(function(){
            $(this).css('cursor','pointer').hover(
                function(){
                    $(this).addClass('active');
                },
                function(){
                    $(this).removeClass('active');
                }).click( function(){
                    document.location = $(this).attr('data-href');
                }
            );
        });
    });
    </script>
    @yield('js')
</body>
</html>
