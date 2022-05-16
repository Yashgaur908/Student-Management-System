<!DOCTYPE html>
<html>

<head>
    <title>Student Management - Search Data</title>
    <?php include 'links.php'?>
</head>
<style>
    * {
        margin: 0px;
        box-sizing: border-box;
    }

    .logo {
        background: #f9f9ff;
    }


    .left-container {
        margin-top: 100px;
        background-image: url(images/edu.gif);
        height: 600px;
        width: 700px;
        margin-top: 100px;
        margin-left: -100px;
    }

    .right-container {
        height: auto;
        padding: 20px;
        margin-top: 80px;
        margin-left: 80px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .button:hover {
        background: red;
    }

    .noResult {
        background: blue;
        width: 50px;
    }

    .form-items {
        display: flex;
    }

    .btn {
        padding: 15px 15px;
        margin: 10px 0px;
        width: 50px;
        border-radius: 10x;
        outline: none;
        border: none;
        box-shadow: 0px 5px 20px 0px rgba(69, 67, 96, 0.1);
        transition: 1s;
    }

    .btn:hover {
        background: #259be4;
        color: white;
        cursor: pointer;
        transition: 1s;
        box-shadow: 0px 5px 20px 0px rgba(69, 67, 96, 0.1);
    }

    input[type="text"] {
        padding: 15px 15px;
        margin: 10px 10px;
        width: 370px;
        border-radius: 10px;
        outline: none;
        border: none;
        box-shadow: 0px 5px 20px 0px rgba(69, 67, 96, 0.1);
    }

    h3 {
        margin: 10px 0;
        background: transparent;
    }

    h6 {
        margin: 5px 0;
        text-transform: uppercase;
        background: transparent;
    }

    p {
        font-size: 14px;
        line-height: 21px;
        background: transparent;
    }

    hr {
        background: black;
    }

    .card-container {
        background-color: #c7e5f6;
        border-radius: 25px;
        box-shadow: 0px 5px 20px 0px rgba(69, 67, 96, 0.1);
        color: black;
        padding: 30px 0 0;
        position: relative;
        width: 350px;
        max-width: 100%;
        text-align: center;
        margin: 20px 0;
        overflow: hidden;
    }

    .card-container .pro {
        color: #231E39;
        background-color: #259be4;
        border-radius: 3px;
        font-size: 14px;
        font-weight: bold;
        padding: 3px 7px;
        position: absolute;
        top: 30px;
        left: 30px;
    }

    .card-container img {
        border: 1px solid #259be4;
        border-radius: 50%;
        padding: 7px;
        height: 130px;
        width: 130px;
    }


    .bottom {
        background-color: transparent;
        text-align: left;
        padding: 15px;
        margin-top: -15px;
        font-size: 20px;
        font-weight: bold;
    }

    .errorMsg {
        background: transparent;
        color: rgba(255, 0, 0, 0.6);
    }

    .strong {
        color: #231E39;
        background-color: #259be4;
        width: 70px;
        text-align: center;
        border-radius: 3px;
        font-size: 14px;
        font-weight: bold;
        padding: 3px 7px;
        margin-right: 40px;
        margin-left: 15px;
        display: inline-block;
        top: 30px;
        left: 30px;
    }

    .text {
        display: flex;
    }

</style>

<body>
    <?php include 'navbar.php'?>
    <div class="container-fluid" style="background: rgb(253,253,254);height:100vh;">
        <div class="row">
            <div class="col-md-6 left-container">
                <!--<img src="images/edu.gif">-->
            </div>

            <div class="col-md-6 right-container">
                <form action="" method="post">
                    <div class="form-items">
                        <input type="text" name="rnum" id="rnum" placeholder="Enter student ID" required pattern="[0-9]+">
                        <button class="btn fa fa-search" type="submit" value="submit" name="button"></button>
                    </div>
                </form>
                <?php
                $ern = "";
                if ($_SERVER['REQUEST_METHOD']=="POST")
                {
                    if(isset($_REQUEST['button']) == true)
                    {
                        $c=0;
                        if (empty($_REQUEST['rnum']))
                            $ern = "Roll number is required";
                        else {
                          $name = $_REQUEST['rnum'];
                          if (!preg_match("/^[0-9 ]*$/",$name))
                            $ern = "Please Enter correct Data";
                            else{
                                $myfile = fopen("data.txt", "r") or die("Unable to open file!");
                                $result = false;
                                while(!feof($myfile))
                                {
                                    $d =fgets($myfile);
                                    $data = explode("\t",$d);
                                    $name = $_REQUEST['rnum'];
                                    if($data[0] == $name)
                                    {
                                        $result = true;
                                        echo'<div class="card-container mt-5">
                                        <span class="pro">'. $data[0] .'</span>
                                        <img src="'. $data[8] .'" alt="user"/>
                                        <h3>'. $data[1] .'</h3>
                                        <h6>'. $data[3] .'</h6>
                                        <p>'. $data[6] .' <br/>
                                        '. $data[4] .'</p><hr> 
                                        <div class="bottom">
                                            <div class="strong">Class</div>
                                            '. $data[2] .'<br>
                                            <div class="strong">Phone</div>
                                            '. $data[5] .'<br>
                                            <div class="strong">Adhaar</div>
                                            '. $data[7] .'
                                        <div>
                                        </div>';
                                    }                                     
                                }
                                if(!$result)
                                {
                                    echo '<div class="errorMsg">No Result Found</div>';  
                                    echo '<img src="images/found1.png" width=350 style="margin-top: 20px;">';
                                }

                            }
                        }
                    }
                }
            ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

    </script>

</body>

</html>
