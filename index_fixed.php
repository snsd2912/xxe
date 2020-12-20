<?php
    $userlist = "";
    $targetFilePath = "";

    if(isset($_POST["submit"])){
        $condition = 1;

        if ($condition == 0) {
            $targetFilePath = "";
            echo "Upload failed ";
        } else {
            //the line below is fixed
            $xml = simplexml_load_file($_FILES['file']['tmp_name']); 
            $userlist .= "<table><tr><th> Name </th> <th> DOB </th> <th> School name </th></tr>" ;      
            foreach($xml->children() as $stu) {
                $userlist .= "<tr>";
                $userlist .= "<th> ".$stu->name." </th>";
                $userlist .= "<th> ".$stu->dob." </th>";
                $userlist .= "<th> ".$stu->schoolname." </th>";
                $userlist .= "</tr>";
            }
            $userlist .= "</table>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="myfile">Select image:</label> 
        <input type="file" id="file" name="file" onchange="change(event)" multiple><br>
        <input type="submit" value="Upload" name="submit">
    </form>

    <div id="student-list">
        <?php
            echo $userlist;
        ?>
	</div>

    <script>
        var change = function(event) { 
            var file = document.getElementById("file");
            var path = file.value;
            var allowExtensions =  /(\.xml)$/i;
            if (!allowExtensions.exec(path)) {
                alert('Only xml files are allowed to upload.');
                file.value = '';
                return false;
            }
        }
    </script>
    
</body>
</html>