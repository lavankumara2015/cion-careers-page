<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("../connectDB.php"); 
$applicant_name = htmlspecialchars($_POST['name'] ?? '');
$DOB = htmlspecialchars($_POST['dob'] ?? '');
$highest_graduation = htmlspecialchars($_POST['highest_graduation'] ?? '');
$graduation_year = htmlspecialchars($_POST['graduation_year'] ?? '');
$CGPA = htmlspecialchars($_POST['cgpa'] ?? '');
$current_address = htmlspecialchars($_POST['current_address'] ?? '');
$mobile_number = htmlspecialchars($_POST['mobile_number'] ?? '');
$reason_for_applying = htmlspecialchars($_POST['reason_for_applying'] ?? '');
$experience =htmlspecialchars($_POST['experience']?? '');
$CV_uploaded = htmlspecialchars($_FILES['cv_uploaded']['name'] ?? '');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["cv_uploaded"]["name"]);
move_uploaded_file($_FILES["cv_uploaded"]["tmp_name"], $target_file);


session_start();
$department = $_SESSION['department'] ?? '';
$role = $_SESSION['role'] ?? '';
$role_id = $_SESSION['role_id'] ?? '';


$sql = "INSERT INTO applicants (role_id, role,department,applicant_name,mobile_number,years_of_experience,DOB,highest_graduation, graduation_year, CGPA, current_address, reason_for_applying, CV_uploaded) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssss",$role_id,$role,$department,$applicant_name,$mobile_number,$experience,$DOB, $highest_graduation, $graduation_year, $CGPA, $current_address ,$reason_for_applying, $CV_uploaded);

if ($stmt->execute()) {
     header(
        "Location: ./applicationDone.php"
     );
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
<link rel="stylesheet" href="./applicationSumbit.css">

<div class="application-form">
    <img src="../../assets/Cancel.webp" alt="cancel-btn" id="cancel-btn"/>
<h2 class="application-form__h2">Fill Your Details</h2>

<form action="applicationSubmit/applicationSubmit.php" method="post" enctype="multipart/form-data">
    <label for="name" class="name">Name<p  style="color:red; display:inline-block;">*</p></label>
    <input  type="text" id="name" name="name" placeholder="Enter Name" minlength="3" required><br>

    <label for="dob" class="dob">Date of Birth<p  style="color:red; display:inline-block;">*</p></label>
    <input type="date" id="dob" name="dob" placeholder="Enter DOB" required><br>

    <label for="highest_graduation" class="highest_graduation">Highest Graduation<p  style="color:red; display:inline-block;">*</p></label>
    <input type="text" id="highest_graduation" placeholder="Enter Highest Graduation" name="highest_graduation"  required><br>

    <label for="graduation_year" class="graduation_year">Graduation Year<p  style="color:red; display:inline-block;">*</p></label>
    <input type="number" id="graduation_year" placeholder="Enter Graduation-Year" maxlength="4" name="graduation_year" required><br>

    <label for="cgpa" class="cgpa">CGPA/Percentage<p  style="color:red; display:inline-block;">*</p></label>
    <input type="number" id="cgpa" name="cgpa" placeholder="Enter CGPA/Percentage" step="any" maxlength="3" required> <br>

    <label for="current_address" class="current_address">Current Address<p style="color:red; display:inline-block;">*</p></label>
    <input type="text" id="current_address" placeholder="Enter Current-Address" name="current_address" required><br>

    <label for="mobile_number" class="mobile_number">Mobile Number<p style="color:red; display:inline-block;">*</p></label>
    <input type="tel" id="mobile_number" name="mobile_number" placeholder="Enter Mobile-Number" minlength="10" maxlength="10" required><br>

    <label for="experience" class="mobile_number">Experience<p style="color:red; display:inline-block;">*</p></label>
    <input type="tel" id="experience" name="experience" placeholder="Enter Experience" maxlength="2" required  style="margin-left: 0.83rem;"><br>

    <label for="reason_for_applying" class="reason_for_applying">Reason for Applying <p style="color:red; display:inline-block;">*</p></label></br>
    <textarea style="resize: none;" id="reason_for_applying" name="reason_for_applying" placeholder="Enter Reason-For-Applying" required></textarea><br>

    <label for="cv_uploaded" class="cv_uploaded">Upload CV<p style="color:red; display:inline-block;">*</p></label>
    <input type="file" id="cv_uploaded" name="cv_uploaded"   accept=".pdf, .doc, .docx" required><br>

   <center><input type="submit" class="form-btn" value="Submit"></center>
</form>

</div>

