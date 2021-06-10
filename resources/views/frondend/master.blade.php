<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- HTML Meta Tags -->
    <title>SAFETY PPE</title>


    <!-- Facebook Meta Tags -->
    <meta property="og:image" content="">

    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="og:description" content="">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:image" content="">

    <meta property="twitter:url" content="">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content=" ">

    <!-- Meta Tags Generated via -->

    <link rel="icon" href="#" type="image/*" sizes="16x16"/>

    <!-- <link href="panel/favicons/favicon.png" rel="shortcut icon" type="image/png"> -->

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel='stylesheet' href="{{ asset('frontend/assets/panel/all.css') }}" integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href=" {{ asset('frontend/assets/panel/awesome.min.css') }}">

    <!-- Required css  -->
    <meta      name='viewport'      content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css.css') }}" >
    <link rel="stylesheet" href=" {{ asset('frontend/assets/mobile_css.css') }}" >
    <script src="{{ asset('frontend/assets/master_js.js') }}"></script>





    <link rel="stylesheet" href="{{ asset('frontend/assets/panel/card_css2.css') }}" >

    <script>

        $(document).ready(function(){
            $('.mobile_home').on('click',function(){
                $('#header').toggleClass('add_height');

            })
        })

    </script>

    <style>
        .full_page_alert {position: fixed;
            width: -webkit-fill-available;
            height: -webkit-fill-available;
            background: white;
            top: 0;
            z-index: 9999999;
            padding: 63px;
            text-align: center;}

    </style>
</head>
<body>
@yield('content')
</body>
