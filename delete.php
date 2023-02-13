<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting Assignment</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    //capturing data
    $assignmentName =$_POST['assignmentName'];
    //validation
    $valid = true;

    if(empty($assignmentName)){
        echo'<p class="error"> Assignment Name is required. </p>';
        $valid = false;
    }

    //db connection only if input is true
    if($valid == true){
    $db = new PDO('mysql:host=172.31.22.43;dbname=Alish200535161','Alish200535161','wXXqdNueNA');
    
    //sql insert
    $sql = "DELETE FROM assignment_info WHERE (assignment = 
    '$assignmentName');";
    echo $sql;

    //prepare and bind
    $cmd = $db->prepare($sql);

    //execture the insert
    $cmd->execute();

    //disconnect
    $db = null;

     //success message
     echo '<p>'. $assignmentName. 'has been deleted </p>';
    }
    ?>
</body>
</html>