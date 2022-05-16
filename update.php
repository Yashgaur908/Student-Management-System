<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management - Update Data</title>
    <?php include 'links.php'?>
    <link rel="stylesheet" href="css/insert.css">
    <style>
        .f-container:before {
            content: "";
            position: absolute;
            height: 2000px;
            width: 2000px;
            top: -10%;
            left: 48%;
            transform: translateY(-50%);
            background-image: linear-gradient(-45deg, #4481eb 0%, #04befe 100%);
            transition: 1.8s ease-in-out;
            border-radius: 50%;
            z-index: 6;
        }

        .signin-signup {
            position: absolute;
            top: 13%;
            height: 20px;
            transform: translate(-50%, -50%);
            left: 26%;
            width: 50%;
            padding: 20px;
            transition: 1s 0.7s ease-in-out;
            z-index: 5;
        }

        .panel p {
            font-size: 15px;
            padding: 0.5rem 0;
            margin-right: 100px;
        }

        .panel h3 {
            font-size: 20px;
            margin-right: 100px;
            margin-top: 15px;
        }

        .btn.transparent {
            margin-right: 100px;
            cursor: pointer;
        }

    </style>
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
                if (!preg_match("/^[0-9 ]*$/",$roll))
                {
                  $errorName = "Please Enter correct Roll No";
                  $er = true;
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
                      $er = true;
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
                  $er = true;
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
                        $re = true;
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
                        $re = true;
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
                if($er){      
                    echo '<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 60%;margin:auto;">
                          '.$errorName.'
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div><br>';
                }
                if(!$er)
                {

                    if($c1 ==1 && $c2==1  && $c3==1 && $c4 ==1 && $c5==1  && $c6==1 && $c7 ==1 && $c8==1  && $c9==1)
                    {
                        $myfile = fopen("data.txt", "r") or die("Unable to open file!");
                        $temp = fopen("tempdata.txt", "a+") or die("Unable to open file!");
                        $c =0;
                        while(!feof($myfile))
                        {
                            $d =fgets($myfile);
                            $c++;
                        }
                        rewind($myfile);
                        for($i=1; $i< $c;$i++)
                        {
                            $d=fgets($myfile);
                            $data = explode("\t",$d);
                            $name = $_REQUEST['rnum'];
                            if($data[0]==$name)
                            {

                                $r0= $_REQUEST['rnum'];
                                $r1= $_REQUEST['name'];
                                $r2= $_REQUEST['class'];
                                $r3= $_REQUEST['city'];
                                $r4= $_REQUEST['dob'];
                                $r5= $_REQUEST['number'];
                                $r6= $_REQUEST['email'];
                                $r7= $_REQUEST['adhaar'];
                                $r8= $copyimg;
                        
                                {
                                    fwrite($temp,$r0."\t");
                                }
                                {
                                    fwrite($temp,$r1."\t");
                                }
                                {
                                    fwrite($temp,$r2."\t");
                                }
                                {
                                    fwrite($temp,$r3."\t");
                                }
                                {
                                    fwrite($temp,$r4."\t");
                                }
                                {
                                    fwrite($temp,$r5."\t");
                                }
                                {
                                    fwrite($temp,$r6."\t");
                                }    
                                {
                                    fwrite($temp,$r7."\t");
                                }         
                                { 
                                    fwrite($temp,$r8.PHP_EOL);
                                }
                                echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" style="width: 60%;margin:auto;">
                                      Data Updated Successfully
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div><br>';

                            }
                            else if($data!=$name){
                                if(isset($data[0]))
                                {
                                    fwrite($temp,$data[0]."\t");
                                }

                                if(isset($data[1]))
                                { 
                                    fwrite($temp,$data[1]."\t");
                                }
                                if(isset($data[2]))
                                {    
                                    fwrite($temp,$data[2]."\t");
                                }
                                if(isset($data[3]))
                                {    
                                    fwrite($temp,$data[3]."\t");
                                }
                                if(isset($data[4]))
                                {    
                                    fwrite($temp,$data[4]."\t");
                                }
                                if(isset($data[5]))
                                {    
                                    fwrite($temp,$data[5]."\t");
                                }
                                if(isset($data[6]))
                                {   
                                    fwrite($temp,$data[6]."\t");
                                }
                                if(isset($data[7]))
                                {    
                                    fwrite($temp,$data[7]."\t");
                                }    
                                if(isset($data[8]))
                                { 
                                    fwrite($temp,$data[8]);
                                }                
                                
                            }  
                        else{
                            echo"data not found";
                        }             
                    }    
                    fclose($temp);
                    fclose($myfile);
                    unlink("data.txt");
                    rename("tempdata.txt","data.txt");   
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
            <div class="panel right-panel">
                <div class="content">
                    <h3>Insert Data ?</h3>
                    <p>
                        If you want to insert students data then you just have to click on the below button to insert new records.
                    </p>
                    <a href="insert.php"><button class="btn transparent" id="sign-in-btn">
                            Insert
                        </button></a>
                </div>
                <img src="images/register.svg" class="image" alt="" />
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
