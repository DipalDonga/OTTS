
<!DOCTYPE html>
<?php
session_start();
include("connection.php");

?>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--[endif]-->
<head>
<meta charset="utf-8" />
<title>Movie Pro Responsive HTML Template</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description" content="Movie Pro" />
<meta name="keywords" content="Movie Pro" />
<meta name="author" content />
<meta name="MobileOptimized" content="320" />

<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/animate.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/fonts.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/flaticon.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/owl.theme.default.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/dl-menu.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/nice-select.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/magnific-popup.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/venobox.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/layers.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/navigation.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/settings.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/style.css" />
<link rel="stylesheet" type="text/css" href="https://www.webstrot.com/html/moviepro/html/css/responsive.css" />
<link rel="stylesheet" id="theme-color" type="text/css" href="#" />

<link rel="shortcut icon" type="https://www.webstrot.com/html/moviepro/html/image/png" href="https://www.webstrot.com/html/moviepro/html/images/header/favicon.ico" />
</head>
<body>
	 <?php
    $sql = "SELECT * FROM movieTable";
    ?>

<div id="preloader">
<div id="status">
<img src="https://www.webstrot.com/html/moviepro/html/images/header/horoscope.gif" id="preloader_image" alt="loader">
</div>
</div>

<?php include("includes/new-header.php");?>



<div class="prs_upcom_slider_main_wrapper">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="prs_heading_section_wrapper">
<h2>Upcoming Movies</h2>
</div>
</div>
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="best">
<div class="prs_upcom_slider_slides_wrapper">
<div class="owl-carousel owl-theme">
<div class="item">
<div class="row">


<?php

            $sql1 = mysqli_query($con,"select * from movie");
             while($mrow = mysqli_fetch_array($sql1)){

                    echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 hidden-sm">
							<div class="prs_upcom_movie_box_wrapper">
								<div class="prs_upcom_movie_img_box">
								<img src="img/' . $mrow['image'] . '" alt="movie_img" />
									<div class="prs_upcom_movie_img_overlay">
									</div>
									<div class="prs_upcom_movie_img_btn_wrapper">
									<ul>
										<li><a href="#">View Trailer</a></li>
									</ul>
									</div>
								</div>
							<div class="prs_upcom_movie_content_box">
								<div class="prs_upcom_movie_content_box_inner">
									<h2>' . $mrow['movieName'] . '</h2>
									<p></p> <i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<div class="prs_upcom_movie_content_box_inner_icon">
									<ul>
									<li><a href="booking.php?id=' . $mrow['mid'] . '"><i class="flaticon-left-arrow"></i></a>
									</li>
									</ul>
								</div>
							</div>
							</div>
							</div>';
}
            
?>






<div class="modal fade st_pop_form_wrapper" id="myModa3" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="st_pop_form_heading_wrapper float_left">
<h3>Sign Up</h3>
</div>
<div class="st_profile_input float_left">
<label>Email / Mobile Number</label>
<input type="text">
</div>
<div class="st_profile__pass_input st_profile__pass_input_pop float_left">
<input type="password" placeholder="Password">
</div>
<div class="st_form_pop_fp float_left">
<h3><a href="#" data-toggle="modal" data-target="#myModa2" target="_blank">Forgot Password?</a></h3>
</div>
<div class="st_form_pop_login_btn float_left"> <a href="page-1-7_profile_settings.html">LOGIN</a>
</div>
<div class="st_form_pop_or_btn float_left">
<h4>or</h4>
</div>
<div class="st_form_pop_facebook_btn float_left"> <a href="#"><i class="fab fa-facebook-f"></i> Connect with Facebook</a>
</div>
<div class="st_form_pop_gmail_btn float_left"> <a href="#"><i class="fab fa-google-plus-g"></i> Connect with Google</a>
</div>
<div class="st_form_pop_signin_btn st_form_pop_signin_btn_signup float_left">
<h5>I agree to the <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy</a></h5>
</div>
</div>
</div>
</div>


<script src="https://www.webstrot.com/html/moviepro/html/js/jquery_min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/modernizr.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/bootstrap.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/owl.carousel.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/jquery.dlmenu.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/jquery.sticky.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/jquery.nice-select.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/jquery.magnific-popup.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/jquery.bxslider.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/venobox.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/smothscroll_part1.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/smothscroll_part2.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/jquery.themepunch.revolution.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/jquery.themepunch.tools.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.addon.snow.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.actions.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.carousel.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.kenburn.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.layeranimation.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.migration.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.navigation.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.parallax.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.slideanims.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/plugin/rs_slider/revolution.extension.video.min.js"></script>
<script src="https://www.webstrot.com/html/moviepro/html/js/custom.js"></script>

</body>
</html>