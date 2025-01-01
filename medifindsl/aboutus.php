<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | MEDIFINDSL  Teset</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/scrollreveal"></script>

    <link rel="icon" href="resource/icon.png" />

</head>

<body>

    <div class="container-fluid">
        <div class="col-12">
            <div class="row">

            <?php include "heder.php"; ?>
            <div class="col-12">
                <div class="row">

                    <div class="col-12 ">
                        <div class="row aboutBox1">
                            <div class="col-11 col-lg-7 mb-5 aboutBox2" >
                                <div class="col-12 text-center ">
                                    <p class="fs-1 text-primary fw-bold">About Us</p>
                                </div>
                                <div class=" p-3">
                                    <p class="fs-3 font5 fw-bold "> The purpose of our company is to offer innovative and high-quality medical equipment that improves patient care and healthcare outcomes on a global scale, with the goal of becoming the leading provider in this field.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row d-flex mt-5 mb-5  gap-5 justify-content-center">

                            <div class="col-10 col-lg-5 mt-5 missionBox animatebox1" >
                                <div class="col-12 mt-3 mb-3 text-center">
                                    <p class="fs-1 text-warning fw-bold">OUR MISSION</p>
                                </div>
                                <div class="col-12 mb-3 p-3">
                                    <p class="fs-3 font5">Our mission is to connect healthcare professionals with the medical equipment they need to deliver exceptional patient care. We aim to provide a seamless and reliable online platform for buying and selling high-quality medical equipment, while offering unparalleled customer service and support.</p>
                                </div>

                            </div>
                            <div class="col-10 col-lg-5 mt-5  visionBox animatebox2" >

                                <div class="col-12 mt-3 mb-3 text-center">
                                    <p class="fs-1 text-secondary fw-bold">OUR VISION</p>
                                </div>
                                <div class="col-12 mb-3 p-3">
                                    <p class="fs-3 font5">Our vision is to be the premier provider of innovative and high-quality medical equipment that enhances patient care and improves healthcare outcomes globally.</p>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <?php include "footer.php"; ?>

                
            </div>
        </div>
    </div>

    <script>
        ScrollReveal({ 
            reset: true,
            distance:"200px",
            duration:3000,
            delay:400,
         });

         ScrollReveal().reveal('.animatebox1', { delay: 20, origin:"left" });
         ScrollReveal().reveal('.animatebox2', { delay: 20, origin:"right", });
       


    </script>

</body>

</html>