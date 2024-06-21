
<html>
    <head>
        <title>Nutec'21 Event Registration for FASTIANS</title>
    </head>
    <body>
        <style>
            h2 {
                font-family: Arial, sans-serif;
            }
            input  {
                margin-right: 10px;
                margin-left: 40px;
                margin-bottom: 10px;
                height: 30px;
                width: 300px;
            }

            select {
                margin-right: 10px;
                margin-left: 40px;
                margin-bottom: 10px;
                height: 30px;
                width: 300px;
                color: black;
                background-color: white;
                border: 1px solid white;
                display: inline-block;
                position: relative;
            }

            input[type="submit"] {
                width: 60px;
                height: 30px;
                margin-left: 0px;
                color: white;
                background-color: blue;
            }
        </style>

        <?php if (isset($_GET['form_submited'])) 
        { ?>
            <h2>Thank You <?php echo $_GET['Name']; ?></h2>
            <p>You have been registered in <?php echo $_GET['event']; ?></p>
            <p>Go <a href="/lab-task-09/registration.php">back</a> to the form</p>
        <?php
        }
        else
        {
        ?>
            <h2>Nutec'21 Event Registration for FASTIANS</h2>

            <form action="registration.php" method="GET">
                <label for="inputField">Roll No:</label>
                <input  type="text" name="Roll_No">
                <br>
                <label for="inputField">Name:</label>
                <input type="text" name="Name">
                <br>
                <label for="inputField">Email:</label>
                <input type="text" name="Email">
                <br>
                <label for="inputField">Department:</label>
                <select name="Department">
                <option value="Computer Science">Computer Science</option>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                </select>
                <br>
                <label for="inputField">Choose Event:</label>
                <select name="event">
                <option value="Speed Programming">Speed Programming</option>
                <option value="SE Quiz">SE Quiz</option>
                <option value="CS Quiz">CS Quiz</option>
                </select>
                <br>
                <input type="hidden" name="form_submited" value="1"/>
                <input type="submit" value="Submit">
            </form>
        <?php
        }
        ?>
    </body>
</html>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nutec";

    try {
        // Create a new PDO instance
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_GET['form_submited'])) {
            // Retrieve form data
            $Rollno = $_GET['Roll_No'];
            $name = $_GET['Name'];
            $Department = $_GET['Department'];
            $Event = $_GET['event'];
            $email = $_GET['Email'];

            $stmt = $conn->prepare("INSERT INTO registration (RollNo, Name, Email, Department, Event) VALUES (:Roll_No, :Name, :Email, :Department, :event)");

            $stmt->bindParam(':Roll_No', $Rollno);
            $stmt->bindParam(':Name', $name);
            $stmt->bindParam(':Department', $Department);
            $stmt->bindParam(':event', $Event);
            $stmt->bindParam(':Email', $email);

            $stmt->execute();

            echo "Data inserted successfully";
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>



