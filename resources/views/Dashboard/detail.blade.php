<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DAD | Dashboard Audit Dalam</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('res/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{ asset('res/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('res/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('res/css/style.css') }}" rel="stylesheet">
</head>
<body id="page-top" class="landing-page">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('login')}}">LOG MASUK</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="#page-top">Utama</a></li>
                        <li><a class="page-scroll" href="#laporan">Status Laporan</a></li>
                        <li><a class="page-scroll" href="#team">Laporan Penuh</a></li>
                        <li><a class="page-scroll" href="#">Manual Pengguna</a></li>
                         <li><a class="page-scroll" href="#contact">Hubungi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                   {{-- <h1>We craft<br/>
                        brands, web apps,<br/>
                        and user interfaces<br/>
                        we are IN+ studio</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">READ MORE</a>
                        <a class="caption-link" href="#" role="button">Inspinia Theme</a>
                    </p>--}}
                </div>
                {{--<div class="carousel-image wow zoomIn">
                    <img src="res/img/landing/laptop.png" alt="laptop"/>
                </div>--}}
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
               {{--<div class="carousel-caption blank">
                    <h1>We create meaningful <br/> interfaces that inspire.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>--}}
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section id="laporan" class="container services">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>{{$laporan->tajuk}}</h2>
            <table class="table">
                <tr>
                    <th>Bil</th>
                    <th>Perenggan</th>
                    <th width="50%">Penemuan Audit</th>
                    <th>Auditi</th>
                    <th>Status</th>
                </tr>
                @php
                    $bil=1;
                @endphp
                @foreach ($senaraimaklumbalas as $auditipenemuan)
                <tr>
                    <td>
                        {{$bil}}
                        @php
                            $bil=$bil+1;
                        @endphp
                    </td>
                    <td>
                        {{$auditipenemuan->penemuan->perenggan}}
                    </td>
                    <td>
                        @php
                            $string=$auditipenemuan->penemuan->penemuan;
                            $stringlength = 100;
                            if (strlen($auditipenemuan->penemuan->penemuan) > $stringlength)
                            {
                                $string = wordwrap($auditipenemuan->penemuan->penemuan, 100);
                                $i = strpos($string, "\n");
                                if ($i) {
                                    $string = substr($string, 0, $i);
                                }
                            }
                            @endphp
                        {!! $string !!}
                        {{-- {!! $auditipenemuan->penemuan->penemuan !!} --}}

                    </td>
                    <td>
                        {{$auditipenemuan->organisasi->name}}
                    </td>
                    <td>

                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
</section>





<section id="contact" class="contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contact Us</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy">Company name, Inc.</span></strong><br/>
                    795 Folsom Ave, Suite 600<br/>
                    San Francisco, CA 94107<br/>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis, totam corporis ea,
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                    Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2015 Company Name</strong><br/> consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="res/js/jquery-2.1.1.js"></script>
<script src="res/js/bootstrap.min.js"></script>
<script src="res/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="res/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="res/js/inspinia.js"></script>
<script src="res/js/plugins/pace/pace.min.js"></script>
<script src="res/js/plugins/wow/wow.min.js"></script>


</body>
</html>
