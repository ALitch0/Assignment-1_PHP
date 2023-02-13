<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Saved...</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    //capturing data
    $assignment=$_POST['assignment'];
    $assignment_desc=$_POST['assignment_desc'];
    $deadline=$_POST['deadline'];
    $course_name=$_POST['course_name'];

    //validation
    $valid = true;

    if(empty($assignment)){
        echo'<p class="error"> Assignment Name is required.</p>';
        $valid = false;
    }
    if(empty($assignment_desc)){
        echo'<p class="error"> Assignment Description is required.</p>';
        $valid = false;
    }
    if(empty($deadline)){
        echo'<p class="error"> Due Date is required.</p>';
        $valid = false;
    }
    if(empty($course_name)){
        echo'<p class="error"> Course Name is required.</p>';
        $valid = false;
    }

    //db connection only if input is available
    if($valid == true){

        //connect to db
        $db = new PDO('mysql:host=172.31.22.43;dbname=Alish200535161','Alish200535161','wXXqdNueNA');

        //Sql insert
        $sql = "INSERT INTO assignment_info (assignment, assignment_desc,deadline,course_name) VALUES (:assignment, :assignment_desc, :deadline, :course_name); ";

        //prepare and bind
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':assignment', $assignment, PDO::PARAM_STR, 100);
        $cmd->bindParam(':assignment_desc', $assignment_desc, PDO::PARAM_STR, 1500);
        $cmd->bindParam(':deadline', $deadline, PDO::PARAM_STR);
        $cmd->bindParam(':course_name', $course_name, PDO::PARAM_STR, 50);

        //execute the insert
        $cmd->execute();

        //disconnect
        $db= null;

        //success message
        echo 'The assignment info has been saved.';
    }
    ?>
    <br>
    <a href="index.php">Assignment register Page</a>
</body>
</html>