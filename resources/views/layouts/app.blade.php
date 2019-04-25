<!DOCTYPE HTML>
<html lang="en">
@include('layouts.header')
<body>
<div class="bigmain">
    @include('layouts.top_search')
    <style>
        .itemseach .ver_datepicker{
            width: 160px;
        }
    </style>
    <script type="text/javascript">
    </script>
    <div id='maincontent'>
        <div class="container">
            <div class="maincontent clearfix">
                @yield('content')
            </div>
            @include('layouts.list_footer')
        </div>
    </div>

</div>
@include('layouts.footer')
</body>
</html>
