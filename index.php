<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management - Home</title>
    <?php include 'links.php'?>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .preloader.fade {
            opacity: 0;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #loader {
            position: fixed;
            top: 70;
            left: 400px;
            width: 100%;
            height: 100%;
            background: url(images/loading.gif);
            background-repeat: no-repeat;
            background-size: contain;
            z-index: 9999;
            display: block;
            margin: auto;
        }


        /******************************PRELOADER END**********************************/

    </style>
</head>

<body>

    <div class="preloader" id="preloader">
        <div id="loader" style="height:500px;width:500px;margin-top: 90px;"></div>
    </div>

    <!---------------------------------NAVBAR START---------------------------------->

    <?php include 'navbar.php'?>


    <!---------------------------------NAVBAR END------------------------------------>
    <!-------------------------------SERVICES START-------------------------------->

    <section id="services" class="container-fluid" style="background: rgb(253, 253, 254);display:flex;justify-content:center;align-items:center;flex-direction:column;height:100vh;">
        <div class="container services mt-3" style="background: rgb(253, 253, 254);display:flex;justify-content:center;align-items:center;">
            <div class="row">
                <div class="container col-12 services-container"style="margin-top:100px;">
                    <div class="col-md-4">
                        <!-- service box -->
                        <div class="service-box text-center color3">
                            <img src="images/insert.png" alt="Insert Data" width=60 />
                            <h3 class="mb-1 mt-0">Insert Data</h3>
                            <p class="mb-0">Click on the below button to insert new students record</p>
                            <a href="insert.php" class="text-decoration-none"><button class="button">Insert Data</button></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- service box -->
                        <div class="service-box text-center color1">
                            <img src="images/show.png" alt="show Data" width=60 />
                            <h3 class="mb-1 mt-0" style="color: black;">Show Data</h3>
                            <p class="mb-0" style="color: black;">Click on the below button to show existing students record</p>
                            <a href="show.php" class="text-decoration-none"><button class="button">Show Data</button></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- service box -->
                        <div class="service-box text-center color2">
                            <img src="images/update.png" alt="update Data" width=60 />
                            <h3 class="mb-1 mt-0">Update Data</h3>
                            <p class="mb-0">Click on the below button to update existing students record</p>
                            <a href="update.php" class="text-decoration-none"><button class="button">Update Data</button></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- service box -->
                        <div class="service-box text-center color3">
                            <img src="images/delete.png" alt="delete Data" width=60 />
                            <h3 class="mb-1 mt-0">Delete Data</h3>
                            <p class="mb-0">Click on the below button to delete students record</p>
                            <a href="delete.php" class="text-decoration-none"><button class="button">Delete Data</button></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- service box -->
                        <div class="service-box text-center color1">
                            <img src="images/search.png" alt="search Data" width=60 />
                            <h3 class="mb-1 mt-0" style="color: black;">Search Data</h3>
                            <p class="mb-0" style="color: black;">Click on the below button to search existing students record</p>
                            <a href="search.php" class="text-decoration-none"><button class="button">Search Data</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="footer text-center">Made by Yash Gaur & Nikhil Yadav</p>
    </section>

    <!-------------------------------SERVICES END---------------------------------->
    <script>
        window.onload = function() {
            var preloader = document.getElementsByClassName('preloader')[0];
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 4000);
        };

    </script>
</body>

</html>
