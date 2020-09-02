<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Akij Cement Ltd. </title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/fav.svg">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

    <!-- Header Top Area Start -->
    <div class="HeaderTopArea">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-6">
                    <div class="follow_us">
                        <div class="leftColl">
                            <p>Follow us on</p>
                        </div>
                        <div class="rightColl">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-linkedin-in"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <a href="http://www.akij.net" target="_blanck">
                        <div class="webmail_us">
                            <p>A concern of Akij Group</p><img src="assets//img/akijlogo.svg">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top Area End  -->

    <!-- Logo Area Start -->
    <div class="logoArea">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-4">
                    <a href="index.html">
                        <div class="logoHere"><img src="assets/img/logo.png"></div>
                    </a>
                </div>
                <div class="col-lg-8 col-8">
                    <div class="quick_box_wrapper">
                        <div class="quick_box hotline">
                            <div class="quick_icon"><i class="fas fa-phone"></i></div>
                            <div class="quick_details">
                                <h3>Contact Us</h3>
                                <p>Toll Free: 08000016609

                                </p>
                            </div>
                        </div>
                        <div class="quick_box">
                            <div class="quick_icon"><i class="fas fa-envelope"></i></div>
                            <div class="quick_details">
                                <h3>Email Us:</h3>
                                <p>Info.akijcement@akij.net

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Logo Area End -->

    <!-- Navigation Area Start -->
    <div class="NavigationWrapper" id="myHeader">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="Navigation">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">

                                    <li class="nav-item"> <a class="nav-link activemenu" href="index.html">Home <span
                                                class="sr-only">(current)</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="">Company </a> </li>
                                    <li class="nav-item"> <a class="nav-link" href=""> Products</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href=""> Why Akij Cement</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href=""> Media</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href=""> Order Now</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="contact.html"> Contact Us </a> </li>
                                    <li class="nav-item"> <a class="nav-link" target="_blanck" href=""> Bandhan
                                            Magazine</a> </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Navigation Area End -->
    <!-- otp form -->
    <div class="OtpBox">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="formHeading">
                        <h1>Login with OTP</h1>
                        <p>Please Enter Your Mobile Phone Number</p>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="OTpForm">
                                <form class="otpFormdetails" method="post" action="{{ route('otp') }}">
                                    <div class="firstname otpname">
                                        <label>Your Name:</label><br>
                                        <input type="text" name="fname" value="full name">
                                    </div>
                                    <div class="firstname mobile">
                                        <label>Mobile Number:</label><br>
                                        <input type="text" name="phone_no" value="+880" id="otpId">
                                        <small id="emailHelp" class="form-text text-muted">e.g.+880173125569</small>
                                    </div>
                                    <div class="sendotpBTn">

                                        <button type="submit" class="productBtn sendbtn">Send OTP</button>
                                    </div>


                                    <div class="firstname otptext ">
                                        <label>Submit OTP:</label><br>
                                        <input type="text" name="fname" value=" 4 digit PIN">

                                    </div>
                                    <button type="submit" class="productBtn otobtn">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area Start -->
    <div class="FooterArea bp">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="quick-detail text-center">
                        <div class="first-widget"><img src="assets/img/logo.png">
                        </div>
                        <div class="social-widghet">
                            <div class="social-link sociallink"><a href="#" target="_blanck"><i
                                        class="fab fa-facebook-f"></i></a><a href="#" target="_blanck"><i
                                        class="fab fa-linkedin"></i></a><a href="#" target="_blanck"><i
                                        class="fab fa-youtube"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="quick-address">
                        <h2>HEAD OFFICE</h2>
                        <div class="quick-icon">
                            <ul>
                                <!-- <li> <span> <i class="fas fa-phone"></i> </span> <a> 08000016609 </a>  </li>
                                <li> <span><i class="far fa-envelope"></i></span> <a> info.afbl@akij.net  </a> </li> -->
                                <li> <span> <i class="fas fa-map-marker-alt"></i> </span>
                                    <a>198 Bir Uttam, Mir Shawkat Sarak, Gulshan Link Road, Tejgaon, Dhaka-1208 </a>

                                </li>
                                <!-- <li> <span> <i class="far fa-clock"></i> </span> <a>  Sat to Thu - 9:00am to 6:00pm (Friday Closed) , Except on Government Holidays </a> </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="quick-address">
                        <h2> FACTORY OFFICE </h2>
                    </div>
                    <div class="single-widget--menu">
                        <ul>
                            <li> <span> <i class="fas fa-map-marker-alt"></i> </span>
                                <a>Nabigonj, Kadam Rasul, Bandar, Narayangonj </a>

                            </li>

                        </ul>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="quick-address">
                        <h2>Hotline </h2>
                        <p>08000016609 or 16609</p>
                    </div>
                    <div class="quick-address">
                        <h2>Email</h2>
                        <p> info.akijcement@akij.net</p>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copy">
                        <p> <b>© Copyright 2020 Akij Group. All Rights Reserved. Developed By

                                <a href="http://www.akij.net" target="_blanck">Akij Group IT</b></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
