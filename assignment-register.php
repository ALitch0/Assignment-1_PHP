<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Tracker</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--Header-->
    <header>
        <h1>Assignment Tracker</h1>
    </header>
    <!--Main-->
    <main>
        <h2>Add new Assignments here...</h2>
        <!--form to "save-assignment.php" through post method-->
        <form action="save-assignment.php" method="post">
            <!--Assignment Name-->
            <fieldset>
                <label for="assignment">Assignment Name:</label>
                <input type="text" id="assignment" name="assignment" required>
            </fieldset>
            <!--Assignment Description-->
            <fieldset>
                <label for="assignment_desc">Assignment Description:</label>
                <textarea name="assignment_desc" id="assignment_desc" required maxlength="1500" required></textarea>
            </fieldset>
            <!--Due Date-->
            <fieldset>
                <label for="deadline">Due Date:</label>
                <input type="datetime-local" id="deadline" name="deadline" required>
            </fieldset>
            <!--Course Name-->
            <fieldset>
                <label for="course_name">Course Name:</label>
                <select name="course_name" id="course_name">
                    <?php
                    //connect to database
                     $db = new PDO('mysql:host=172.31.22.43;dbname=Alish200535161','Alish200535161','wXXqdNueNA');

                    //use select to fetch data
                    $sql = "SELECT * FROM course";

                    //run query
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $course = $cmd->fetchAll();


                    //loop through the data
                    foreach($course as $coursename){
                        echo '<option>' .$coursename['course_name']. '</option>';
                    }
                    //disconnect
                    $db = null;
                    ?>
                </select>
            </fieldset>
            <button class="button">Post</button>
        </form>
        <?php
            
        ?>
    </main>
    <!--Footer-->
    <footer>

    </footer>
</body>

</html>