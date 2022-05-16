<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management - Show Data</title>
    <?php include 'links.php'?>
</head>
<style>
    * {
        margin: 0px;
        box-sizing: border-box;
    }

    .table {
        height: auto;
        font-size: 20px;
        text-align: center;
    }

    .table-container {
        margin-top: 110px;
    }

</style>

<body>
    <?php include 'navbar.php'?>
    <div class="container-fluid table-container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Roll No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">City</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adhaar</th>
                    <th scope="col">Photograph</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $myfile = fopen("data.txt", "r") or die("Unable to open file!");
            $data = array();
            while(!feof($myfile)) {  
                $d = fgets($myfile);
                $data = explode("\t", $d);
                echo "<tr>";
                echo "<td>";
                if(isset($data[0])){echo $data[0];}
                echo "</td>";
                echo "<td>";
                if(isset($data[1])){echo $data[1];}
                echo "</td>";
                echo "<td>";
                if(isset($data[2])){echo $data[2];}
                echo "</td>";  
                echo "<td>";
                if(isset($data[3])){echo $data[3];}
                echo "</td>";
                echo "<td>";
                if(isset($data[4])){echo $data[4];}
                echo "</td>";
                echo "<td>";
                if(isset($data[5])){echo $data[5];}
                echo "</td>";
                echo "<td>";
                if(isset($data[6])){echo $data[6];}
                echo "</td>";
                echo "<td>";
                if(isset($data[7])){echo $data[7];}
                echo "</td>";
                echo "<td>";
                if(isset($data[8])){
                    $image =  $data[8];
                    echo '<img width=150" src="'.$image.'"/><?';}
                echo "</td>";
                echo "</tr>";
            }  
            fclose($myfile);
          ?>
            </tbody>
        </table>
        <hr>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

    </script>
</body>

</html>
