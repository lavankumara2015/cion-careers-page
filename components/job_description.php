
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>careers</title>
    <link rel="shortcut icon" href="/assets/favicon.webp" type="image/x-icon">
    <link rel="stylesheet" href="/index.css">
    <link rel="stylesheet" href="./navBar/navbar.css">
    <link rel="stylesheet" href="./applicationSubmit/applicationSumbit.css">
</head>
<body>

<?php include("./navBar/navBar.php") ?>
<?php
include("./connectDB.php");

$id = $_GET['id'];



$sql = "SELECT department,role,job_id,location,experience,qualification,reports_to,time_of_work,salary,company_profile,skill_required,job_description FROM careers WHERE id = $id";

$result = $conn->query($sql);
$department = null ;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $department = $row["department"];
        $role = $row["role"];
        $job_id = $row["job_id"];
        $location = $row["location"];
        $experience = $row["experience"];
        $qualification = $row["qualification"];
        $reports_to = $row["reports_to"];
        $time_of_work = $row["time_of_work"];
        $salary = $row["salary"];
        $company_profile = $row["company_profile"];
        $job_description = $row["job_description"];
        $skill_required = $row["skill_required"];

session_start();
$_SESSION['department'] = $department;

?>



<h1 class="role-text-h1"><?php echo $role ?> Role </h1>
    <div class="vaccine-container">
        <div class="vaccine-container__department">
            <h2>Department</h2>
            <p><?php echo $department ?></p>
        </div>
        <div class="vaccine-container__role">
            <h2>Role</h2>
            <p><?php echo $role ?></p>
        </div>
        <div class="vaccine-container__job-id">
            <h2>Job-id</h2>
            <p><?php echo $job_id ?></p>
        </div>
        <div class="vaccine-container__location">
            <h2>Location</h2>
            <p><?php echo $location ?></p>
        </div>
        <div class="vaccine-container__experience">
            <h2>Experience</h2>
            <p><?php echo $experience ?></p>
        </div>
        <div class="vaccine-container__qualification">
            <h2>Qualification</h2>
            <p><?php echo $qualification ?></p>
        </div>
        <div class="vaccine-container__reports-to">
            <h2>Reports to</h2>
            <p><?php echo $reports_to ?></p>
        </div>
        <div class="vaccine-container__time-of-work">
            <h2>Time of Work</h2>
            <p><?php echo $time_of_work ?></p>
        </div>
        <div class="vaccine-container__salary">
            <h2>Salary</h2>
            <p><?php echo $salary ?></p>
        </div>
        <div class="vaccine-container__company-profile">
            <h2>Company Profile</h2>
            <p><?php echo $company_profile ?></p>
        </div>
        <div class="vaccine-container__job-description">
            <h2>Job Description</h2>
            <?php
            $string =  $job_description;
            $delimiter = "."; 
            $parts = explode($delimiter, $string);
            array_pop($parts);

            ?>
            <ul>
                <?php foreach ($parts as $part) {
                echo  "<li>$part</li>";
            }  ?>
            </ul>
        </div>
        <div class="vaccine-container__skill-required">
            <h2>Skill-Required</h2>
            <?php
            $strings = $skill_required;
            $delimiters = "."; 
            $parts1 = explode($delimiters, $strings);
            array_pop($parts1);
            ?>
            <ul>
                <?php foreach ($parts1 as $part1) {
                echo  "<li>$part1</li>";
            }  ?>
            </ul>
        </div>
      
    </div>

    <center><button onclick="helper()" class="vaccine-container__btn">Apply Now</button></center>
    
    <dialog id="myDialog">
    <div class="myDialog-container">
        <?php include("./applicationSubmit/applicationSubmit.php");?>
        
    </div>
    </dialog>
    <script>

        const dialog = document.getElementById("myDialog")

function helper() { 
    dialog.showModal(); 
  window.onclick = function(event) {
    var dialog = document.getElementById("myDialog");
    if (event.target == dialog) {
      dialog.close();
    }
  }
}  

   const cancel_btn = document.getElementById("cancel-btn")
    cancel_btn.addEventListener("click",()=>{
        dialog.close();
    })
    
    </script>
<?php
    }
} else {
    echo "Job description not found";
}
?>
    
</body>
</html>
