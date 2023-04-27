<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

    <title>@yield('title')</title>
</head>

<body class="bg-light">
    @guest
    @yield('content')
    @else
        <div class="wrapper">



            <!-------sidebar--design------------>
            <div id="sidebar">
                <div class="sidebar-header d-flex justify-content-between">
                    <span id="close" class="d-lg-none  ">X</span>
                    <h3><img src="img/logo.png" class="img-fluid" /><span>َAdmin Pannal</span></h3>
                </div>
                <ul class="list-unstyled component m-0">
                    <li class="active">
                        <a href="#" class="dashboard">
                            لوحة التحكم
                            <i class="material-icons mx-1">dashboard</i>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ route('employes.index') }}" class="">
                            قسم الموظفين
                            <i class="material-icons mx-1">date_range</i>
                        </a>
                    </li>





                    <li class="dropdown">
                        <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            الاحصائيات<i class="material-icons mx-1">equalizer</i>
                        </a>
                        <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                            <li><a href="#">Pages 1</a></li>
                            <li><a href="#">Pages 2</a></li>
                            <li><a href="#">Pages 3</a></li>
                        </ul>
                    </li>






                </ul>
            </div>



            <!-------sidebar--design- close----------->



            <!-------page-content start----------->

            <div id="content">

                <!------top-navbar-start----------->

                <div class="top-navbar">
                    <div class="xd-topbar">
                        <div class="row">

                            <div class="col-10 col-md-6 col-lg-11 order-1 order-md-1">
                                <div class="xp-profilebar text-start">
                                    <nav class="navbar p-0">
                                        <ul class="nav navbar-nav flex-row  ">


                                            <li class="dropdown nav-item">
                                                <a class="nav-link" href="#" data-toggle="dropdown">
                                                    @if (isset(Auth::user()->id))
                                                        <img src="img/user.jpg" style="width:40px; border-radius:50%;" />
                                                        <span class="xp-user-live"></span>
                                                    @else
                                                        <i class="bx bxs-user-circle"
                                                            style="width:40px; border-radius:50%;font-size: 40px;"></i>
                                                    @endif


                                                </a>

                                                <ul class="dropdown-menu small-menu">

                                                    <li class="text-center">
                                                        {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                                                    </li>
                                                    <li><a href="#" class=" nav-link">
                                                            الحساب
                                                            <span class="material-icons">person_outline</span>
                                                        </a></li>

                                                    <li><a href="/logout" class=" nav-link">
                                                            تسجيل الخروج
                                                            <span class="material-icons">logout</span>
                                                        </a></li>


                                                </ul>
                                            </li>


                                        </ul>
                                    </nav>
                                </div>
                            </div>



                            <div class="col-2 col-md-1 col-lg-1 order-2 order-md-3 align-self-center">
                                <div class="xp-menubar">
                                    <span class="material-icons text-white">signal_cellular_alt</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!------top-navbar-end----------->


                <!------main-content-start----------->

                <div class="main-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrapper">






                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                <!------main-content-end----------->
            </div>

        </div>
    @endguest
        <script src="{{ url('js/jquery-3.3.1.slim.min.js') }}"></script>
        <script src="{{ url('js/popper.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $(".xp-menubar").on('click', function() {
                    $("#sidebar").toggleClass('active');
                    $("#content").toggleClass('active');
                });
                $("#close").on('click', function() {
                    $("#sidebar").toggleClass('active');

                });

                $('.xp-menubar,.body-overlay,#close').on('click', function() {
                    $("#sidebar,.body-overlay").toggleClass('show-nav');

                });
                $('#printPageButton').on('click', function() {
                    $("#cardcerti").printElement();

                });

            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        @yield('scripts')
    </body>

    </html>
