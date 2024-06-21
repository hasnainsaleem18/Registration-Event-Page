<html>
<head>
    <title>Nutec'24 Event Record</title>
    <style>
        h2 {
            font-family: Arial, sans-serif;
        }

        form {
            margin-left: 40px;
        }

        label {
            display: inline-block;
            width: 150px; 
            margin-bottom: 10px;
        }

        input[type="text"], select {
            height: 30px;
            width: 300px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100px;
            background-color: blue;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Nutec'24 Event Record</h2>

<form action="record.php" method="GET">
    <label for="search_by">Search by:</label>
    <select name="search_by" id="search_by">
        <option value="RollNo">Roll No</option>
        <option value="Event">Event Name</option>
        <option value="Department">Department</option>
    </select>
    <br>
    <label for="search_data">Enter data:</label>
    <input type="text" name="search_data" id="search_data">
    <br>
    <input type="submit" value="Search">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nutec";

if(isset($_GET['search_by']) && isset($_GET['search_data'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $search_by = $_GET['search_by'];
        $search_data = $_GET['search_data'];

        $stmt = $conn->prepare("SELECT * FROM registration WHERE $search_by = :search_data");
        $stmt->bindParam(':search_data', $search_data);
        $stmt->execute();

        echo "<h2>Search Results</h2>";
        echo "<table>";
        echo "<tr><th>Roll No</th><th>Name</th><th>Email</th><th>Department</th><th>Event</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>".$row['RollNo']."</td><td>".$row['Name']."</td><td>".$row['Email']."</td><td>".$row['Department']."</td><td>".$row['Event']."</td></tr>";
        }
        echo "</table>";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

</body>
</html>
