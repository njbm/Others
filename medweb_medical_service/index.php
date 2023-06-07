<?php 
//include_once($_SERVER['DOCUMENT_ROOT'].'./medweb_medical_service/config.php');
include_once('config.php');
$fileData = file_get_contents($json."slide.json");
$data = json_decode($fileData, "true");


$service_items = file_get_contents($json."service-front.json");
$arr_service_items = json_decode($service_items, "true");

//dd($arr_service_items);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MedWeb</title>

    <!--cdn for css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- cdn for animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="shortcut icon" href="images/Favicon.png" type="image/x-icon">


    <!-- cdn for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- FOR FAQ --->


    <!-- FOR FAQ --->



    <?php include_once($short.'front-index-style.php') ?>

</head>

<body>

    <!-- navbar -->

    <?php include_once($short.'navbar-front.php') ?>

    <!-- navbar end -->


    <!-- carousel -->


    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php 
			$active = '';
			foreach($data as $key=>$value){
				if($key == 0){
					$active = 'active';
				}else{
					$active = " ";
				}
			?>

            <div class="carousel-item <?=$active?>" data-bs-interval="10000">
                <img src="<?=$images2.$value['src']?>" class="d-block w-100" alt="...">
                <div class="carousel-caption animate__animated animate__backInUp animate__delay-.5s">
                    <h5><?=$value['heading']?></h5>
                    <p><?=$value['paragraph']?></p>
                    <a class="btn-slide" href="#appointemnt">Appoinment Now</a>
                </div>
            </div>
            <?php 
			}
			?>
        </div>
        <!--prev button-->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <!--next button-->
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- carousel end -->


    <!-- Our Service Section -->


    <section class="service full-height" id="service">
        <div class="container">
            <h2 class="text-center pb-5">Our Service</h2>
            <div class="row pb-3">
                <?php foreach($arr_service_items as $key=>$service_card) { ?>
                <div class="col-lg-4 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="icon">
                                <i class="<?=$service_card['icon']?>"></i>
                            </div>
                            <h4 class="pb-2"><?=$service_card['heading']?></h4>
                            <p><?=$service_card['paragraph']?></p>

                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <!-- Our Service Section end -->


    <!-- Blog & News -->
    <?php
	$news_items = file_get_contents($json."news-front.json");
    $arr_news_items = json_decode($news_items, "true");

	?>

    <section class="service full-height" id="news">
        <div class="container">
            <h2 class="text-center pb-5">Blog & News</h2>
            <div class="row pb-3">
                <?php foreach($arr_news_items as $key=>$news_card) { ?>
                <div class="col-lg-4 mb-3">
                    <div class="card-news rounded-4 shadow-effect">

                        <img class="card-img-top rounded-4" src="<?=$images2.'news-images/'.$news_card['src']?>" style="height: 30vh;" alt="">

                        <div class="card-body p-3">
                            <div class="src">
                                <!-- <i class="<?=$news_card['']?>"></i> -->
                            </div>
                            <h4 class="pb-2"><?=$news_card['heading']?></h4>
                            <h6 class="text-muted">Posted on: <?=$news_card['post_time']?></h6>
                            <p class="fs-6"><?=$news_card['paragraph']?></p>
                            <a class="btn btn-danger btn-md mt-3" id="submitButton" type="submit">Read More</a>

                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>




    <!-- Blog & News end -->


    <!-- Appointment Section -->

    <section class="full-height" id="appointemnt">

        <div class="container mt-5 pb-3 animate__animated animate__backInLeft animate__delay-.5s">
            <h2 class="text-center pb-5">Make Appointemnt</h2>

            <div class="card">
                <div class="card-body">



                    <form class="row mt-5">

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="inputCategory" class="form-label">Specialist</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select Specialist</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputDoctor" class="form-label">Doctor</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select Doctor</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPhone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="inputPhone">
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="col-lg-4">
                                <label for="inputState" class="form-label">State</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose</option>
                                    <option>State 1</option>
                                    <option>State 2</option>
                                    <option>State 3</option>
                                    <option>State 4</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label for="inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea type="text" class="form-control" id="inputmessage"
                                    placeholder="Message"></textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="mt-4 text-center">
                                <a href="login_modals.html" type="submit" class="btn btn-danger">Make An Appointment</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </section>



    <!-- Appointment Section end -->





    <!-- contact Section -->

    <section class="full-height" id="contact">


        <div class="container pb-5">
            <h2 class="text-center pb-5">Contact Us</h2>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="contact-info col-sm-6 shadow-lg overflow-hidden">
                                    <div class="info container">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <div class="topic">Address</div>
                                        <p>Rajuk Rajib Shopping Complex, Sector-7, Uttara, Dhaka</p>
                                        <i class="fa-solid fa-phone"></i>
                                        <div class="topic">Let's Talk</div>
                                        <p>01712988806 <br> 01988858108</p>
                                        <i class="fa-solid fa-envelope"></i>
                                        <div class="topic">General Support</div>
                                        <p>sk.karib35@gmail.com <br> kowsersojol@gmail.com</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 p-4">
                                    <div class="text-center">
                                        <div class="h4 pb-5 fw-light">Connected with us</div>
                                    </div>

                                    <form action="user/uni-user-contact-process.php" method="post">

                                        <fieldset>

                                            <!-- Name Input -->

                                            <div class="form-floating mb-3">
                                                <input name="name" class="form-control" type="text" placeholder="Name"
                                                    required>
                                                <label for="name">Name</label>
                                            </div>

                                            <!-- Email Input -->
                                            <div class="form-floating mb-3">
                                                <input name="email" class="form-control" type="email"
                                                    placeholder="Email Address" required>
                                                <label for="email">Email Address</label>
                                            </div>

                                            <!-- Phone No. Input -->
                                            <div class="form-floating mb-3">
                                                <input name="phone" class="form-control" id="phoneNumber" type="text"
                                                    placeholder="Phone Number" required>
                                                <label for="phone">Phone Number</label>
                                            </div>

                                            <!-- Message Input -->
                                            <div class="form-floating mb-3">
                                                <textarea name="message" class="form-control" id="message" type="text"
                                                    placeholder="Message" style="height: 10rem;" required></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </fieldset>

                                        <!-- Submit button -->
                                        <div class="text-center">
                                            <button class="btn btn-danger btn-md" id="submitButton"
                                                type="submit">Submit</button>
                                        </div>
                                    </form>
                                    <!-- End of contact form -->

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- contact end -->



    <!-- Footer Section -->

    <!-- Footer -->

    <footer class="text-center text-lg-start bg-light text-dark" id="ft">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div class="foot-icon">
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>

                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h4 class=" mb-4">
                            <span style="color: #DC3545;">Med</span>Web
                        </h4>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            About
                        </h6>
                        <p>
                            <a href="#!" class="foot-item text-decoration-none text-dark">About us</a>
                        </p>
                        <p>
                            <a href="#!" class="text-decoration-none text-dark">FAQ</a>
                        </p>
                        <p>
                            <a href="#!" class="text-decoration-none text-dark">Terms & Policy</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Services
                        </h6>
                        <p>
                            <a href="#service" class="text-decoration-none text-dark">Easy Appoinment</a>
                        </p>
                        <p>
                            <a href="#service" class="text-decoration-none text-dark">Medical Test</a>
                        </p>
                        <p>
                            <a href="#service" class="text-decoration-none text-dark">Medical Report</a>
                        </p>
                        <p>
                            <a href="#service" class="text-decoration-none text-dark">24/7 Support</a>
                        </p>
                        <p>
                            <a href="#service" class="text-decoration-none text-dark">Emergency Service</a>
                        </p>
                        <p>
                            <a href="#service" class="text-decoration-none text-dark">Ambulence Service</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-location-dot me-3"></i> Rajuk Rajib Shopping Complex</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            sk.karib35@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01712 988806</p>

                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Sayed Farhan Labib</a>,
            <a class="text-reset fw-bold" href="https://main--helpful-malasada-165c09.netlify.app/">Kowser Ahmed
                Sajol</a>
        </div>
        <!-- Copyright -->
    </footer>





    <!-- Footer Section end -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
            nav.classList.add('bg-dark', 'shadow');
        } else {
            nav.classList.remove('bg-dark', 'shadow');
        }
    })
    </script>


</body>

</html>