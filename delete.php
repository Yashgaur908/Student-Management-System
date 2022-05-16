<!DOCTYPE html>
<html>

<head>
    <title>Student Management - Delete Data</title>
    <?php include 'links.php'?>
</head>
<style>
    * {
        margin: 0px;
        box-sizing: border-box;
    }

    .left-container {
        margin-top: 100px;
        background-image: url(images/d.gif);
        background-repeat: no-repeat;
        height: 700px;
        width: 750px;
        margin-top: 70px;
        margin-left: 0px;
    }

    .right-container {
        height: auto;
        padding: 20px;
        margin-top: 80px;
        margin-left: 0px;
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

    .errorMsg {
        background: transparent;
        color: rgba(255, 0, 0, 0.6);
    }

    .form-items {
        display: flex;
        margin-left: -20px;
        margin-top: 30px;
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

</style>

<body>
    <?php include 'navbar.php'?>
    <div class="container-fluid" style="background: #fff;">
        <div class="row">

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
                                $c = $c +1;
                            }
                        }
                        if($c == 1)
                        {
                            $myfile = fopen("data.txt", "r") or die("Unable to open file!");
                            $temp = fopen("temp1.txt", "a+") or die("Unable to open file!");
                            $c = 0;
                            while(!feof($myfile))
                            {
                                $d =fgets($myfile);
                                $c++;
                            }
                            $delete = false;
                            rewind($myfile);
                            for($i=1; $i< $c;$i++)
                            {
                                $d=fgets($myfile);
                                $data = explode("\t",$d);
                                $name = $_REQUEST['rnum'];
                                
                                if($data[0]==$name)
                                {
                                    echo '<img src="images/delete1.gif" width=400 style="margin-top: 25px;">';
                                    $delete = true;

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
                            }
                            if(!$delete)
                            {
                                echo '<div class="errorMsg">Data Not Found</div>';
                                    echo '<img src="images/found1.png" width=330 style="margin-top: 10px;">';
                            }
                            fclose($temp);
                            fclose($myfile);
                            unlink("data.txt");
                            rename("temp1.txt","data.txt");
                         }
                    }
                }
                ?>
            </div>

            <div class="col-md-6 left-container">
                <!--<img src="images/edu.gif">-->
            </div>


        </div>
    </div>
    <script>
        < script >
            $(document).ready(function() {
                $('#myTable').DataTable();
            });

    </script>
</body>

</html>
