<html>

<head>
    <link rel="shortcut icon" href=".././assets/favicon.webp" type="image/x-icon">
    <title>View Application Details</title>
<link rel="stylesheet" href="../styles/index3.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin-left: 0.95rem;
        }
        th,
        td {
            border: 0.018rem solid black;
            padding: 0.15rem;
            text-align: left;
        }
        th {
            background-color: var(--brandClr);
            color: white;
        }
        h1 {
            margin: 0.5rem;
            color: #802a8f;
            font-size: 0.8rem;
            position: relative;
            top: 0.45rem;
            left: 0.5rem;
        }
        p{
            text-align: center;
            font-size: 1rem;
            margin-top: 6rem;
        }
        #searchInput {
            float: right;
            position: relative;
            bottom: 1rem;
            right: 2rem;
            width: 6rem;
            font-size: 0.4rem;
            height: 0.9rem;
            padding-left: 0.8rem;
            border: 0.038rem solid var(--brandClr);
            border-radius: 0.1rem;
            outline: none;
        }
        .searchIcon{
            float: right;
            position: relative;
            right: 7.8rem;
            bottom: 0.82rem;
            z-index: 9999;
            color: #802a8f;
            
        }
    </style>
</head>
<body>

<?php
include("./connectDB.php");
session_start();
$inputEmail = $_SESSION['inputEmail'];
$inputPassword = $_SESSION['inputPassword'];



$sql = "SELECT * FROM applicants AS a JOIN careers AS b ON a.department = b.department JOIN admin AS c ON b.hiring_manager_email = c.hiring_manager_email WHERE c.password = '$inputPassword' AND c.hiring_manager_email = '$inputEmail'GROUP BY a.ID ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    include("./navBar/navBar.php");
    echo '<h1>Job Applicants</h1>';
    echo '<span class="material-symbols-outlined searchIcon">search</span><input type="text" id="searchInput" placeholder="Search Here">';
    echo '<table id="myTable">';
    echo '<tr>';
    echo '<th>Role-id</th>';
    echo '<th>Role</th>';
    echo '<th>Department</th>';
    echo '<th>Applicant-Name</th>';
    echo '<th>Applicant CV</th>';
    echo '<th>Mobile</th>';
    echo '<th>Experience</th>';
    echo '<th>DOB</th>';
    echo '<th>Highest Graduation</th>';
    echo '<th>Graduation Year</th>';
    echo '<th>CGPA</th>';
    echo '<th>Reason For Applying</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["role_id"] . '</td>';
        echo '<td>' . $row["role"] . '</td>';
        echo '<td>' . $row["department"] . '</td>';
        echo '<td>' . $row["applicant_name"] . '</td>';
        echo '<td><a href="./applicationSubmit/uploads/' . $row["CV_uploaded"] . '" download>Download CV</a></td>';
        echo '<td>' . $row["mobile_number"] . '</td>';
        echo '<td>' . $row["years_of_experience"] . '</td>';
        echo '<td>' . $row["DOB"] . '</td>';
        echo '<td>' . $row["highest_graduation"] . '</td>';
        echo '<td>' . $row["graduation_year"] . '</td>';
        echo '<td>' . $row["CGPA"] . '</td>';
        echo '<td>' . $row["reason_for_applying"] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "<p>No Results Found</p>";
}
$conn->close();
?>

<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break; // Show the row if a match is found in any column
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
});
</script>

</body>
</html>