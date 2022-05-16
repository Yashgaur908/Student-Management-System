<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management - Insert Data</title>
    <?php include 'links.php'?>
    <link rel="stylesheet" href="css/insert.css">
</head>

<body>

    <?php include 'navbar.php'?>

    <div class="f-container">
        <div class="forms-container" style="margin-top:20px;">
            <div class="signin-signup">
                <?php
       $errnum = $ern = $erc = $ercity =$erdob =$errp= $ere= $eradhaar="";
        $ern = $errnum = $errp = $erc  = $errc = $erg = $img = $eradhaar =$errnum = $erdob = "";
        $er = $errorName = false;
        $roll = $name = $class= $city =$dob = $number=$email=$adhaar= $image = $imgs =$copyimg= "";

        if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            if(isset($_REQUEST['button']) == true)
            {
                $c1 = $c2 = $c3 = $c4 =$c5 =$c6 =$c7 =$c8 =$c9 = 0;
              if (empty($_REQUEST['rnum']))
              {
                  $errnum = "Roll number is required";
                  $er = true;
              }
              else {
                $roll = $_REQUEST['rnum'];
                if (!preg_match("/^[0-9 ]*$/",$roll)){
                    $errorName = "Please Enter correct Roll No";
                }
                else {
                    $c1 = $c1 + 1;
                }
              }
//============name validation ==========
                if (empty($_REQUEST['name']))
                {
                    $ern = "Name is required";
                    $er = true;
                }
                else {
                  $name = $_REQUEST['name'];
                  if (!preg_match("/^[a-zA-Z ]*$/",$name))
                  {
                    $errorName = "Please Enter correct Name";
                  }
                  else{
                        $c2 = $c2 + 1;
                    }
                }
//================class validation============
              if (empty($_REQUEST['class']))
              {
                  $erc= "Class is required";
                  $er = true;
                }
              else {
                $class = $_REQUEST['class'];
                $c3 = $c3 +1;

                }
//====================city validation===================              
                if (empty($_REQUEST['city']))
                {
                    $ercity = "City is required";
                    $er = true;
                }
                else {
                    $city = $_REQUEST['city'];
                    $c4 = $c4 +1;
                }
    //================dob validation 
                if (empty($_REQUEST['dob']))
                {
                    $erdob = "DOB is required";
                    $er = true;
                }
                else {
                    $dob = $_REQUEST['dob'];
                    $c5 = $c5 +1;
                }
//======================number validation==================
            if (empty($_REQUEST['number']))
              {
                $errp= "Number is required";
                $er = true;
            }
            else {
                $number = $_REQUEST['number'];
              if (!preg_match("/^[0-9 ]*$/",$number))
              {
                  $errorName = "Please Enter correct Number";
              }
              else{
                  $c6 = $c6 +1;
              }
            }
//=====================email validation================
                if (empty($_REQUEST['email']))
                {
                    $ere = "Email is required";
                    $er = true;
                    }
                else {
                    $email = $_REQUEST['email'];
                    $exp = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
                    if (!preg_match($exp,$email)==1)
                    {
                      $errorName = "Please Enter Correct Email";
                   }
                   else{
                       $c7 = $c7 +1; 
                   }
                }
//==============adhaar validation==================
                if (empty($_REQUEST['adhaar']))
                {
                    $eradhaar= "Adhaar number is required";
                    $er = true;
                }
                else {
                    $adhaar = $_REQUEST['adhaar'];
                    if (!preg_match("/^[0-9 ]*$/",$adhaar))
                    {
                        $errorName = "Please Enter correct Adhaar No";
                    }
                    else{
                        $c8 = $c8 +1;
                    }
                }
//===============image validation===============               
                
                if ($_FILES["image"]["error"]!=0)
                {
                    $img = "Image is required";
                    $er = true;
                }
                else{
                    $filepath = "" . $_FILES["image"]["name"];
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)) 
                    {
                        $imgs = $filepath;
                        $copyimg = "students/".$_REQUEST['rnum'].".jpg";
                        rename($imgs,$copyimg);
                        
                        $c9 =$c9 +1;
                    }
                }
            
                if(!$er)
                {

                    if($c1 ==1 && $c2==1  && $c3==1 && $c4 ==1 && $c5==1  && $c6==1 && $c7 ==1 && $c8==1  && $c9==1)
                    {
                        $myfile = fopen("data.txt", "a") or die("Unable to open file!");
                        fwrite($myfile, $roll."\t");
                        fwrite($myfile, $name."\t");
                        fwrite($myfile, $class."\t");
                        fwrite($myfile, $city."\t");
                        fwrite($myfile, $dob."\t");
                        fwrite($myfile, $number."\t");
                        fwrite($myfile, $email."\t");
                        fwrite($myfile, $adhaar."\t");
                        fwrite($myfile, $copyimg.PHP_EOL);
                        fclose($myfile);
                        echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" style="width: 60%;margin:auto;">
                              Data Submitted Successfully
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div><br>';
                    }
                    else{                             
                            echo '<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 60%;margin:auto;">
                              '.$errorName.'
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div><br>';
                        }                 
                }
            }    
            
        }
        ?>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-row">
                        <div class="row">
                            <input type="text" name="rnum" id="rnum" placeholder="Enter Roll Number" required>
                        </div>
                        <div class="row">
                            <input type="text" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="row">
                            <input type="text" name="class" id="class" placeholder="Enter Class" required>
                        </div>
                        <div class="row">
                            <input type="text" name="number" id="number" placeholder="Enter Phone Number" required maxlength="10">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="row">
                            <input type="text" name="email" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="row">
                            <input type="text" name="adhaar" id="adhaar" placeholder="Enter Adhaar Number" required pattern="(.){12,12}" maxlength="12">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="row my-3">
                            <select id="city" class="city" name="city">
                                <option value="" selected="selected">Select a City</option>
                                <option value="Ajmer">Ajmer</option>
                                <option value="Kota">Kota</option>
                                <option value="Jaipur">Jaipur</option>
                                <option value="Udaipur">Udaipur</option>
                                <option value="Bikaner">Bikaner</option>
                            </select>
                        </div>
                        <div class="row">
                            <input type="date" name="dob" id="dob" required>
                        </div>
                    </div>

                    <input type="file" class="inputfile" name="image" id="image" required style="">

                    <button class="button" type="submit" value="submit" name="button">Submit</button>
                </form>
                <p class="footer text-center pt-4 mt-5">Made by Yash Gaur & Nikhil Yadav</p>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Update Data?</h3>
                    <p>
                        If you want to update students data then you just have to click on the below button to update existing records.
                    </p>
                    <a href="update.php"><button class="btn transparent" id="sign-up-btn">
                            Update
                        </button></a>
                </div>
                <img src="images/log.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {
            // Closing the alert 
            $('#alert').alert('close');
        }, 3500);

    </script>


</body>

</html>
