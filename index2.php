<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./components/connectDB.php");
    $department = htmlspecialchars($_POST['department'] ?? '');
    $role = htmlspecialchars($_POST['role'] ?? '');
    $role_id = htmlspecialchars($_POST['role_id'] ?? '');
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

    function generateRandomPassword($length = 6)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        $charLength = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, $charLength - 1)];
        }
        return $password;
    }

    $sql1 = "INSERT INTO careers (department, role, role_id, location, experience, qualification, reports_to, time_of_work, salary,company_profile,skill_required,job_description,hiring_manager,hiring_manager_email,image_url,role_overview) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("ssssssssssssssss", $department, $role, $role_id, $location, $experience, $qualification, $reports_to, $time_of_work, $salary, $company_profile, $skill_required, $job_description, $hiring_manager, $hiring_manager_email, $role_logo, $role_overview);
    $stmt1->execute();
    
    $sql2 = "INSERT INTO admin (hiring_manager_name, hiring_manager_email, password) VALUES (?, ?, ?)";
    $randomPassword = generateRandomPassword();
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("sss",$hiring_manager, $hiring_manager_email,  $randomPassword);
    $stmt2->execute();

    if ($stmt1 && $stmt2) {
        header("Location: ./components/applicationSubmit/requirementsSuccess.php");
        exit(); // Exit script after redirection
    } else {
        echo "Error: One or more insert operations failed.";
    }

    // Close the statements
    $stmt1->close();
    $stmt2->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles-details</title>
    <link rel="shortcut icon" href="./assets/favicon.webp" type="image/x-icon">
    <link rel="stylesheet" href="./styles/index2.css">
    <link rel="stylesheet" href="./styles/navbar.css">

</head>

<body>

    <?php include("./components/navBar/navBar.php") ?>

    <h1 class="role-text-h1">Fill Role Requirements</h1>

    <div class="role-details-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="department">Department:<span style="color: red;">*</span></label>
            <input type="text" id="department" name="department" placeholder="Enter Department" required>

            <label for="role" class="role">Role:<span style="color: red;">*</span></label>
            <input type="text" id="role" name="role" placeholder="Enter Role" required><br>

            <label for="role_id">Role ID:<span style="color: red;">*</span></label>
            <input type="text" id="role_id" name="role_id" placeholder="Enter Job-id" required>

            <label for="location" class="location">Location:<span style="color: red;">*</span></label>
            <input type="text" id="location" name="location" placeholder="Enter Location" required><br>

            <label for="experience">Experience:<span style="color: red;">*</span></label>
            <input type="text" id="experience" name="experience" placeholder=" Enter Experience" required>

            <label for="qualification" class="qualification">Qualification:<span style="color: red;">*</span></label>
            <input type="text" id="qualification" name="qualification" placeholder="Enter Qualification" required><br>

            <label for="reports_to" class="reports_to">Reports To:<span style="color: red;">*</span></label>
            <input type="text" id="reports_to" name="reports_to" placeholder="Enter Report-To">

            <label for="time_of_work" class="time_of_work">Time of Work:<span style="color: red;">*</span></label>
            <input type="text" id="time_of_work" name="time_of_work" required placeholder="Enter Time-of-work"><br>

            <label for="salary">Salary:<span style="color: red;">*</span></label>
            <input type="text" id="salary" name="salary" placeholder="Enter Salary" required>

            <label for="company_profile" class="company_profile">Company Profile:<span style="color: red;">*</span></label>
            <input id="company_profile" name="company_profile" placeholder="Enter Company-Profile" required><br>

            <label for="hiring_manager" class="hiring_manager">Hiring Manage<br><span class="hm-class">Name:</span> <span style="color: red; ">*</span></label>
            <input type="text" id="hiring_manager" name="hiring_manager" placeholder="Enter Hiring-Manager" required>

            <label for="hiring_manager_email" class="hiring_manager_email">Hiring Manager<br><span class="hme-class">Email:</span> <span style="color: red; ">*</span></label>
            <input type="email" id="hiring_manager_email" name="hiring_manager_email" placeholder="Enter Hiring-Manager-Email" required><br>


            <label for="role_overview" class="role_overview">Role View:<span style="color: red;">*</span></label>
            <input id="role_overview" name="role_overview" placeholder="Enter Role-OverView" minlength="186" maxlength="187" required><br>

            <label for="role_logo" class="role-image">Role Logo:<span style="color: red;">*</span></label>
            <img onclick="helper()" class="role-image-logo" src="./assets/down-arrow-icon.png" alt="administrator-logo" />
            <dialog id="myDialog">
                <div style="display: inline;" class="myDialog-container" id="image-container"></div>
            </dialog>
            <div id="role-logo-div-container"></div>
            <input type="hidden" id="role_logo" name="role_logo">


            <label for="job_description" class="job_description">Job Description:<span style="color: red;">*</span></label><br>
            <textarea id="job_description" name="job_description" placeholder="Enter Job-Description" required></textarea><br>

            <label for="skill_required" class="skill_required">Skills Required:<span style="color: red;">*</span></label><br>
            <textarea type="text" id="skill_required" name="skill_required" placeholder="Enter Skill-Required" required></textarea><br>


            <center> <input style="position: relative; bottom:5rem" type="submit" value="Submit" id="submit-btn"></center>
        </form>

    </div>
    <?php include("./components/footer/footer.php") ?>
    <script>
        var dialog = document.getElementById("myDialog");

        function helper() {
            document.getElementById("myDialog").showModal();
            window.onclick = function(event) {

                if (event.target == dialog) {
                    dialog.close();
                }
            }
        }

        const obj = [{
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
        let currentImg = null;

        obj.forEach((val, i) => {
            const img = document.createElement('img');
            img.src = val.img;
            img.alt = val.value;
            container.appendChild(img);

            img.addEventListener('click', () => {
                const role_img = document.createElement('img');
                role_img.style.width = "1rem";
                role_img.style.height = "1rem";
                role_img.style.marginLeft = "0.55rem";
                role_img.src = val.img;
                role_img.alt = val.value;
                const values = document.getElementById('role_logo').value = val.value;
                if (currentImg) {
                    document.getElementById('role-logo-div-container').replaceChild(role_img, currentImg);
                } else {
                    document.getElementById('role-logo-div-container').appendChild(role_img);
                }
                currentImg = role_img;
                dialog.close();
            });
        });
    </script>




</body>

</html>