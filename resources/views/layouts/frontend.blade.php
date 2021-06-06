<!DOCTYPE html>
<html lang="pl">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->


        <meta charset="UTF-8">
        <title>Laravel - test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, shrink-to-fit=no">-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<link rel="shortcut icon" href="{{asset('img/favi.png')}}" />-->
        <link rel="stylesheet" href="{{asset('css\bootstrap-4.4.1\css\bootstrap.min.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!--<link rel="stylesheet" href="{{asset('css\font-awesome-4.7.0\css\font-awesome.min.css')}}">-->
        <link rel="stylesheet" href="{{asset('css\font-awesome-master\css\all.min.css')}}">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="{{asset('css\sassCrud.css')}}?ver=455477">
        <link rel="stylesheet" href="{{asset('css\crud_form.css')}}?ver=4557744">
        <link rel="stylesheet" href="{{asset('css\app.css')}}?ver=4557744">
        <link rel="stylesheet" href="{{asset('css\animate.css')}}">
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
        <script src="{{asset('js\jquery\dist\jquery.js')}}"></script>       
        
           
        
        <script src="{{asset('js\all.js')}}?ver=5444"></script>
        <script src="{{asset('js\jsWebAplication.js')}}?v=4444"></script>
        <script src="{{asset('js\jsCrud.js')}}?ver=54444"></script>
        <script src="{{asset('js\app.js')}}?ver=4444"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>
        <!--<script src="{{asset('sweetalert2/dist/sweetalert2.css')}}"></script>-->
         <!--<script src="{{asset('sweetalert2/dist/sweetalert2.min.js')}}"></script>-->      

    </head>

    <body>
        
        <script>

        </script>
        <div id="page">
           
          
            @yield('content')

            <footer class="jumbotron-fluid">      

            </footer>
        </div>
          <!--<script src="http://code.jquery.com/mobile/1.5.0-rc1/jquery.mobile-1.5.0-rc1.min.js"></script>-->  
        <script src="{{asset('css\bootstrap-4.4.1\js\bootstrap.min.js')}}"></script>
        <script src="{{asset('css\bootstrap-4.4.1\js\bootstrap.bundle.min.js')}}"></script>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script src="{{asset('js\autosize-master\dist\autosize.min.js')}}"></script>  
        <script src="{{asset('js\imask\dist\imask.min.js')}}"></script>
        <script></script>
    </body>
</html>
