<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>PharmCloud - Software Landing Page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<!-- start preloader -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>
<!-- end preloader -->
<!-- start navigation -->
<nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">PharmCloud</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right text-uppercase">
                <li><a href="#home">Home</a></li>
                <li><a href="#feature">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#download">Demo</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- end navigation -->
<!-- start home -->
<section id="home">
    @include('includes.status_message')

    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="text-upper">Take Your Business to the next level</h1>
                    <p class="tm-white">PharmCloud is a fully Responsive, Clean Design, Modern Software to help Pharmacy businesses Boost their Sales and Imporve Productivity ! </p>
                    <a  href="{{route('admin.login')}}" style="padding: 20pxC" class="btn btn-primary text-uppercase"><i class="fa fa-download"></i> Demo Try Now!</a>

                    <img src="{{asset('images/software-img.png')}}" class="img-responsive" alt="home img">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->
<!-- start divider -->
<section id="divider">
    <div class="container">
        <div class="row">
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                <i class="fa fa-laptop"></i>
                <h3 class="text-uppercase">SIMPLIFY</h3>
                <p> We make your bussiness processes easy to accomplish!   </p>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                <i class="fa fa-gears"></i>
                <h3 class="text-uppercase">INTEGRATE</h3>
                <p>View all you reports, accounts and analytics in  on a single page  </p>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
                <i class="fa fa-cloud"></i>
                <h3 class="text-uppercase">CLOUD</h3>
                <p>Whenever,wherever and whatever device ? Manage you business </p>
            </div>
        </div>
    </div>
</section>
<!-- end divider -->

<!-- start feature -->
<section id="feature">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                <h2 class="text-uppercase">PharmCloud Features</h2>
                <p>We provide you the best features becasue we want you to be the best business!</p>

                <p><i class="fa fa-mobile"></i>POS,Invoice and Recieve Module for you Transaction </p>
                <p><i class="fa fa-desktop"></i>Clean and Intuitive interface</p>
                <p><i class="fa fa-address-book-o"></i>Save the contacts of you suppliers and costumers </p>
                <p><i class="fa fa-calendar"></i>Calender to help you plan</p>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                <img src="{{asset('images/software-img.png')}}" class="img-responsive" alt="feature img">
            </div>
        </div>
    </div>
</section>
<!-- end feature -->

<!-- start feature1 -->
<section id="feature1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <img src="{{asset('images/software-img.png')}}" class="img-responsive" alt="feature img">
            </div>
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <h2 class="text-uppercase">More of Your Pharmcloud</h2>
                <p>More just for your Business!</p>
                <p><span><i class="fa fa-inbox"></i></span>You Dont Even need to leave our platform to send and receive emails</p>
                <p><i class="fa fa-truck"></i>connect and manage your suppliers on our platform</p>
            </div>
        </div>
    </div>
</section>
<!-- end feature1 -->

<!-- start pricing -->
<section id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow bounceIn">
                <h2 class="text-uppercase">Our Pricing</h2>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="pricing text-uppercase">
                    <div class="pricing-title">
                        <h4>Basic Plan</h4>
                        <p>#3500</p>
                        <small class="text-lowercase">monthly</small>
                    </div>
                    <ul>
                        <li>6 GB Space</li>
                        <li>600 GB Bandwidth</li>
                        <li>10 Basic Modules</li>
                        <li>Lifetime Support</li>
                    </ul>
                    <button class="btn btn-primary text-uppercase">Sign up</button>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="pricing active text-uppercase">
                    <div class="pricing-title">
                        <h4>Business Plan</h4>
                        <p>#7000</p>
                        <small class="text-lowercase">monthly</small>
                    </div>
                    <ul>
                        <li>15 GB space</li>
                        <li>1,500 GB Bandwidth</li>
                        <li>Unlimited Modules</li>
                        <li>Lifetime Support</li>
                    </ul>
                    <button class="btn btn-primary text-uppercase">Sign up</button>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="pricing text-uppercase">
                    <div class="pricing-title">
                        <h4>Entreprise Plan</h4>

                        <small class="text-lowercase"> Please contact us sales@pharmcloud.com </small>
                    </div>

                    <button class="btn btn-primary text-uppercase">Contact us</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end pricing -->

<!-- start download -->
<section id="download">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                <h2 class="text-uppercase">Try Our Software</h2>
                <p> Username : ade@gmail.com </p>
                <p> Password : timi123 </p>
                <a  href="{{route('admin.login')}}" class="btn btn-primary text-uppercase"><i class="fa fa-download"></i> Demo</a>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                <img src="{{asset('images/software-img.png')}}" class="img-responsive" alt="feature img">
            </div>
        </div>
    </div>
</section>
<!-- end download -->

<!-- start contact -->
<section id="contact">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <h2 class="text-uppercase">Contact Us</h2>
                    <p>Hello , Do you wan to take you business to the next level ?</p>
                    <address>
                        <p><i class="fa fa-map-marker"></i>36 lekki, Lagos,Nigeria</p>
                        <p><i class="fa fa-phone"></i> 0801289348</p>
                        <p><i class="fa fa-envelope-o"></i> info@pharmcloud.com</p>
                    </address>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">

                    <div class="contact-form">
                        <form role="form" action="{{route('contact_us.store')}}" method="post">

                            <div class="col-md-12">
                                @include('includes.form_error')
                            </div>

                            {{csrf_field()}}

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email"  class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" placeholder="Message" rows="4" required></textarea>
                            </div>
                            <div class="col-md-8">
                                <input type="submit" class="form-control text-uppercase" value="Send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->

<!-- start footer -->
<footer>
    <div class="container">
        <div class="row">
            <p>Copyright © 2018 PharmCloud </p>
        </div>
    </div>
</footer>
<!-- end footer -->

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/jquery.singlePageNav.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>