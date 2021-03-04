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
    <link href="res/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="res/css/animate.css" rel="stylesheet">
    <link href="res/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="res/css/style.css" rel="stylesheet">
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
            <h2>Laporan Audit Dalam Lembaga Pertubuhan Peladang</h2>
            {{--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>--}}
        </div>



    </div>
</section>

<section  class="container features center">
    <div class="container">

        <div class="row">
            <div class="col-lg-10 text-center">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <h3 class="section-subheading text-center"> <span class="navy">
                                 <i style="font-size:24px" class="fa">&#xf080;</i> &nbsp;
                            Statistik Status Tindakan Susulan Laporan Ketua Audit Negara Tahun : </span></h3>
                             <div class="col-lg-2 text-center">
                                 <select class="input-sm form-control">
                                <option value="0">Option 1</option>
                                <option value="1">Option 2</option>
                                <option value="2">Option 3</option>
                                <option value="3">Option 4</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive center">
                            <table class="table table-striped center">
                                <thead>

                                    <th class="center">SENARAI LAPORAN</th>
                                    <th></th>
                                    <th></th>

                                    <th>BILANGAN PENEMUAN </th>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><img src="{{ asset("assets/img/red.jpeg") }}" alt=""/></td>
                                        <td><img src="{{ asset("assets/img/yellow.jpeg") }}" alt=""/></td>
                                        <td><img src="{{ asset("assets/img/green.jpeg") }}" alt=""/></td>

                                    </tr>
                                <tr>
                                    <td><b>LAPORAN AUDIT PENGURUSAN BAGI TAHUN 2019</b></td>
                                    <td></td>

                                    <td> <?php
                                        $connection =mysqli_connect("localhost","root","","dashboardadv6");
                                        $query="SELECT id FROM `auditipenemuan` WHERE status_hantar='jawatankuasa' AND progress_id = 7 ";

                                        $query_run=mysqli_query($connection, $query);

                                        $row=mysqli_num_rows($query_run);

                                        echo '<h3>'.$row.'</h3>';

                                        ?></td>
                                    <td>20%</td>
                                    <td>Jul 14, 2013</td>

                                </tr>
                                <tr>

                                    <td><b>LAPORAN AUDIT KEWANGAN BAGI TAHUN 2019</b></td>
                                    <td></td>
                                    <td>
                                        <?php
                                        $connection =mysqli_connect("localhost","root","","dashboardadv6");
                                        $query="SELECT id FROM `auditipenemuan` WHERE status_hantar='jawatankuasa' AND progress_id = 9 ";

                                        $query_run=mysqli_query($connection, $query);

                                        $row=mysqli_num_rows($query_run);

                                        echo '<h3>'.$row.'</h3>';

                                        ?>
                                    </td>
                                    <td>40%</td>
                                    <td>Jul 16, 2013</td>

                                </tr>
                                <tr>

                                    <td><b>LAPORAN AUDIT KEWANGAN LPP NEGERI PAHANG BAGI TAHUN 2019</b></td>
                                    <td></td>

                                    <td> <?php
                                        $connection =mysqli_connect("localhost","root","","dashboardadv6");
                                        $query="SELECT id FROM `auditipenemuan` WHERE status_hantar='jawatankuasa' AND progress_id = 10 ";

                                        $query_run=mysqli_query($connection, $query);

                                        $row=mysqli_num_rows($query_run);

                                        echo '<h3>'.$row.'</h3>';

                                        ?></td>
                                    <td>75%</td>
                                    <td>Jul 18, 2013</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h3>STATISTIK BILANGAN PENEMUAN BELUM SELESAI MENGIKUT BAHAGIAN DAN LPP NEGERI </h3>
                <h3>STATUS SEHINGGA 4 MAC 2021 </h3>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h3>STATISTIK BILANGAN PENEMUAN BELUM SELESAI MENGIKUT BAHAGIAN DAN LPP NEGERI STATUS SEHINGGA 4 MAC 2021 </h3>

                    </div>
                    <div class="ibox-content">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Bahagian & LPP Negeri</th>
                                <th>Tahun 2018</th>
                                <th>Tahun 2019</th>
                                <th>Tahun 2020</th>
                                <th>Tahun 2021</th>
                                <th>Jumlah</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>LPP Negeri Perlis</td>
                                <td>1</td>
                                <td>1</td>
                                <td>-</td>
                                <td>-</td>
                                <td>2</td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>BAHAGIAN KEWANGAN</td>
                                <td>-</td>
                                <td>2</td>
                                <td>-</td>
                                <td>3</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>LPP NEGERI PAHANG</td>
                                <td>-</td>
                                <td>-</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>LPP NEGERI SELANGOR</td>
                                <td>-</td>
                                <td>-</td>
                                <td>1</td>
                                <td>-</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>LPP NEGERI PERAK</td>
                                <td>1</td>
                                <td>5</td>
                                <td>-</td>
                                <td>2</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>Jumlah </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


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


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
