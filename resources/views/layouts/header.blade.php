
<head>
    @yield('meta')
    <link rel="stylesheet" type="text/css" href="/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="/css/pager.css" />
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery.ba-bbq.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <title>Nhà đất Quận 12 Giá Rẻ</title>
    <link href="/css/jquery-ui-1.8.18.custom.css" type=text/css rel=stylesheet>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="/css/plugin.css" rel="stylesheet" media="screen" />
    <link href="/css/main.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <link href="/css/thosannhadat.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" media="all" />

    <link rel="shortcut icon" type="image/ico" href="themes/thosannhadat/favicon.ico" />
    <link rel="apple-touch-icon" href="favicon.html" />
    <script src="/js/modernizr-2.6.2.min.js"></script>


    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.jcarousel.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/jcarousel.responsive.js"></script>
    <script src="/js/holder.js"></script>

    <script src="/js/thosannhadat.js"></script>

    <script src="/js/jquery.nestable.js"></script>
    <script src="/js/jquery.multiple.select.js"></script>
    <script type="text/javascript" src="/js/ckeditor.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="/js/gii.js"></script>
    {{--<link href="/css/fixie8.css" rel="stylesheet" media="screen" />--}}
    <script type="text/javascript">
        $('.ui-datepicker-trigger').click(function(){
            $('.ui-datepicker').css({'z-index':9999});
        });
        //set class my-editor-basic for basic
        //set class my-editor-full for full toolbars
        $(document).ready(function() {
            runEditorBasic('resources/index.html', [
                [ 'Bold', 'Italic','Underline', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight','JustifyBlock', 'RemoveFormat', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
                [ 'FontSize', 'TextColor', 'BGColor' ]
            ], '100%', 150);
            runEditorFull('resources/index.html', [['Source', 'Bold', 'Italic', 'Underline', 'RemoveFormat', 'PasteText', 'PasteFromWord'],['NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],['Link', 'Unlink', 'Image'],['Styles', 'Format', 'Font', 'FontSize'],['TextColor', 'BGColor']], '100%', 250);
            runDatePicker('/themes/thosannhadat');
            runTimePicker('/themes/thosannhadat');
            runDateTimePicker('/themes/thosannhadat');
            validateNumber();

            var _project = $('.project_item').html();
            $('.project').find('ul').remove();
            $('.project').append(_project);

            var _new = $('.new_item').html();
            $('.new').find('ul').remove();
            $('.new').append(_new);

            $("#searchtop").click(function () {
                $(".box_listsearch").stop().show(500);
            });

            $(".donglai").click(function () {
                $(".box_listsearch").stop().hide(500);
            });
        });
        //
    </script>
    <script>
        var csrfToken = "{{csrf_token()}}";
        var loaded = false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        $( document ).ajaxStop(function() {
            loaded = false;
        });
    </script>
    @yield('contentCSS')
    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
</head>
