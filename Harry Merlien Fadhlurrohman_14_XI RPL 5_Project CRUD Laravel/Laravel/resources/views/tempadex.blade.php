<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Harry</title>
    <!-- Custom fonts for this theme -->
    <link href="../public/template_design/vendor/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="../public/template_design/css/freelancer.min.css" rel="stylesheet">

    <style media="screen">
        .wrapper{
            background:#fff;
            box-sizing: border-box;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            margin: 0 auto;
            min-height: 76vh; /* menyesuaikan dengan tinggi layar*/
            height:100%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        @yield('main')
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="../public/template_design/vendor/jquery/jquery.min.js"></script>
    <script src="../public/template_design/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../public/template_design/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../public/template_design/js/jqBootstrapValidation.js"></script>
    <script src="../public/template_design/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../public/template_design/js/freelancer.min.js"></script>
</body>
</html>