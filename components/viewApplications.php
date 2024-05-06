<html>

<head>
    <link rel="shortcut icon" href=".././assets/favicon.webp" type="image/x-icon">
    <title>View Application Details</title>
    <link rel="stylesheet" href="../styles/index3.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            border: 0.018rem solid black;
            padding: 0.15rem;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            margin: 0.5rem;
            color: #802a8f;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>

</html>

<?php
include("./connectDB.php");


session_start();
$email = $_SESSION['inputEmail'];
$name = $_SESSION['inputName'];
$sql = "SELECT * FROM applicants AS a JOIN careers AS b ON a.department = b.department WHERE hiring_manager = '$name' AND hiring_manager_email = '$email' ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    include("./navBar/navBar.php");
    echo '<h1>Job Applicants</h1>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Date of Birth</th>';
    echo '<th>Highest Graduation</th>';
    echo '<th>Graduation Year</th>';
    echo '<th>CGPA</th>';
    echo '<th>Current Address</th>';
    echo '<th>Mobile Number</th>';
    echo '<th>Reason for Applying</th>';
    echo '<th>CV Uploaded</th>';
    echo '<th>Download CV</th>';
    echo '<th>Department</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["DOB"] . '</td>';
        echo '<td>' . $row["highest_graduation"] . '</td>';
        echo '<td>' . $row["graduation_year"] . '</td>';
        echo '<td>' . $row["CGPA"] . '</td>';
        echo '<td>' . $row["current_address"] . '</td>';
        echo '<td>' . $row["mobile_number"] . '</td>';
        echo '<td>' . $row["reason_for_applying"] . '</td>';
        echo '<td>' . $row["CV_uploaded"] . '</td>';
        echo '<td><a href="./applicationSubmit/uploads/' . $row["CV_uploaded"] . '" download>Download CV</a></td>';
        echo '<td>' . $row["department"] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "0 results";
}
$conn->close();
?>