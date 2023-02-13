<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!--header-->
    <header>
    <h1>Assignment Lists</h1>
    </header>
    <!--main-->
    <main>
    <?php
    
    //connect to db
    $db = new PDO('mysql:host=172.31.22.43;dbname=Alish200535161','Alish200535161','wXXqdNueNA');

    //setup sql select command
    $sql= "SELECT * FROM assignment_info;";
    
    //execute select query
    $cmd=$db->prepare($sql);
    $cmd->execute();

    //fetch data
    $assignment_info = $cmd->fetchAll();

    //display data
    echo '<table>
    <thead>
    <th>Assignment Name</th>
    <th>Assignment Description</th>
    <th>Due Date</th>
    <th>Course Name</th>
    </thead>';
    
    foreach($assignment_info as $assign){
        echo'<tr>
        <td>' .$assign['assignment']. '</td>
        <td>' .$assign['assignment_desc']. '</td>
        <td>' .$assign['deadline']. '</td>
        <td>' .$assign['course_name']. '</td>
        </tr>';
    }
    echo'
    </table>';
    //disconnect
    $db = null;
    ?>
    </main>
    <!--Footer-->
    <footer>
    <p>Navigation</p>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Assignment Register</a>
                </li>
                <li>
                    <a href="assignments.php">View All Assignments</a>
                </li>
            </ul>
        </nav>
    </footer>
</body>
</html>