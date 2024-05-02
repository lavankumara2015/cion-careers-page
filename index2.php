<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cion_careers";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$department = htmlspecialchars($_POST['department'] ?? '');
$role = htmlspecialchars($_POST['role'] ?? '');
$job_id = htmlspecialchars($_POST['job_id'] ?? '');
$location = htmlspecialchars($_POST['location'] ?? '');
$experience = htmlspecialchars($_POST['experience'] ?? '');
$qualification = htmlspecialchars($_POST['qualification'] ?? '');
$reports_to = htmlspecialchars($_POST['reports_to'] ?? '');
$time_of_work = htmlspecialchars($_POST['time_of_work'] ?? '');
$salary = htmlspecialchars($_POST['salary'] ?? '');
$skill_required = htmlspecialchars($_POST['skill_required'] ?? '');
$company_profile = htmlspecialchars($_POST['company_profile'] ?? '');
$job_description = htmlspecialchars($_POST['job_description'] ?? '');
$hiring_manager = htmlspecialchars($_POST['hiring_manager'] ?? '');
$hiring_manager_email = htmlspecialchars($_POST['hiring_manager_email'] ?? '');
$role_logo = htmlspecialchars($_POST['role_logo'] ?? '');
$role_overview = htmlspecialchars($_POST['role_overview'] ?? '');


$sql = "INSERT INTO careers (department, role, job_id, location, experience, qualification, reports_to, time_of_work, salary,company_profile,skill_required,job_description,hiring_manager,hiring_manager_email,image_url,role_overview) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssssss", $department, $role, $job_id, $location, $experience, $qualification,$reports_to, $time_of_work, $salary,$company_profile, $skill_required,$job_description,$hiring_manager,$hiring_manager_email,$role_logo,$role_overview);

if ($stmt->execute()) {
    echo '<script>window.location.href = "http://localhost:3000/components/applicationSubmit/applicationDone.php";</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles-details</title>
    <link rel="shortcut icon" href="./assets/favicon.webp" type="image/x-icon">
<link rel="stylesheet" href="./index2.css">
<link rel="stylesheet" href="./components/navBar/navbar.css">

</head>
<body>

<?php include("./components/navBar/navBar.php") ?>

<h1 class="role-text-h1">Fill Role-Details</h1>

<div class="role-details-container">
<form action="" method="POST" enctype="multipart/form-data">
    <label for="department">Department:</label>
    <input type="text" id="department" name="department" required>

    <label for="role">Role:</label>
    <input type="text" id="role" name="role" required><br>

    <label for="job_id">Job ID:</label>
    <input type="text" id="job_id" name="job_id" required>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required><br>

    <label for="experience">Experience:</label>
    <input type="text" id="experience" name="experience" required>

    <label for="qualification">Qualification:</label>
    <input type="text" id="qualification" name="qualification" required><br>

    <label for="reports_to">Reports To:</label>
    <input type="text" id="reports_to" name="reports_to">

    <label for="time_of_work">Time of Work:</label>
    <input type="text" id="time_of_work" name="time_of_work" required><br>

    <label for="salary">Salary:</label>
    <input type="text" id="salary" name="salary" required>
  
    <label for="company_profile">Company Profile:</label>
    <input id="company_profile" name="company_profile" required><br>

    <label for="hiring_manager">Hiring Manager:</label>
    <input type="text" id="hiring_manager" name="hiring_manager" required>

    <label for="hiring_manager_email">Hiring Manager Email:</label>
    <input type="email" id="hiring_manager_email" name="hiring_manager_email" required><br>

    <label for="role_logo">Role-logo:</label>
    <select id="role_logo" name="role_logo" required>
        <option value="coach-logo.webp">coach-logo</option>
        <option value="Developer-logo.webp">developer-logo</option>
        <option value="digitalmarketing-logo.webp">digitalmarketing-logo</option>
        <option value="doctor-logo.webp">doctor-logo</option>
        <option value="facilitiesboy-logo.webp">facilitiesboy-logo</option>
        <option value="hr-logo.webp">hr-logo</option>
        <option value="Intern-logo.webp">Intern-logo</option>
        <option value="manager-logo.webp">manager-logo</option>
        <option value="nurse-logo.webp">nurse-logo</option>
        <option value="nutritionist-logo.webp">nutritionist-logo</option>
        <option value="psychologist-logo.webp">psychologist-logo</option>
        <option value="sales-logo.webp">sales-logo</option>

    </select>
    
    <label for="role_overview">Role Overview:</label>
    <input id="role_overview" name="role_overview" minlength="145"  maxlength="146" required><br>

     
    <label for="job_description">Job Description:</label>
    <textarea id="job_description" name="job_description" required></textarea><br>

    <label for="skill_required">Skills Required:</label>
    <textarea type="text" id="skill_required" name="skill_required" required></textarea><br>



   
    <input type="submit" value="Submit">
</form>

</div>

<img onclick="helper()" class="role-image-logo" src="./assets/sales-icon-32.png" alt="administrator-logo"/>
<dialog id="myDialog">
    <div class="myDialog-container" id="image-container"></div>
</dialog>

<script>
    function helper() { 
        document.getElementById("myDialog").showModal(); 
        window.onclick = function(event) {
            var dialog = document.getElementById("myDialog");
            if (event.target == dialog) {
                dialog.close();
            }
        }
    } 

    const obj = [
    {
        img: "./assets/role-icon/coach-logo.webp",
        value: "coach-logo.webp"
    },
    {
        img: "./assets/role-icon/developer-logo.webp",
        value: "developer-logo.webp"
    },
    {
        img: "./assets/role-icon/digitalmarketing-logo.webp",
        value: "digitalmarketing-logo.webp"
    },
    {
        img: "./assets/role-icon/doctor-logo.webp",
        value: "doctor-logo.webp"
    },
    {
        img: "./assets/role-icon/facilitiesboy-logo.webp",
        value: "facilitiesboy-logo.webp"
    },
    {
        img: "./assets/role-icon/hr-logo.webp",
        value: "hr-logo.webp"
    },
    {
        img: "./assets/role-icon/Intern-logo.webp",
        value: "Intern-logo.webp"
    },
    {
        img: "./assets/role-icon/manager-logo.webp",
        value: "manager-logo.webp"
    },
    {
        img: "./assets/role-icon/nurse-logo.webp",
        value: "nurse-logo.webp"
    },
    {
        img: "./assets/role-icon/nutritionist-logo.webp",
        value: "nutritionist-logo.webp"
    },
    {
        img: "./assets/role-icon/psychologist-logo.webp",
        value: "psychologist-logo.webp"
    },
    {
        img: "./assets/role-icon/sales-logo.webp",
        value: "sales-logo.webp"
    }
];


    let container = document.getElementById('image-container');

    obj.forEach((val, i) => {
        const img = document.createElement('img');
        img.src = val.img;
        img.alt = val.value; 
        container.appendChild(img);
        img.addEventListener('click', () => {
            document.getElementById('role-icon').value = val.value;
            document.getElementById('role-icon-img').src = val.img;
        })
    });
</script>

</script>


</body>
</html>