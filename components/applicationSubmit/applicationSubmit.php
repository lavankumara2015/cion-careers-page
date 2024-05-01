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

    $name = htmlspecialchars($_POST['name'] )?? '';
    $DOB = $_POST['dob'] ?? '';
    $highest_graduation = $_POST['highest_graduation'] ?? '';
    $graduation_year = $_POST['graduation_year'] ?? '';
    $CGPA = $_POST['cgpa'] ?? '';
    $current_address = $_POST['current_address'] ?? '';
    $mobile_number = $_POST['mobile_number'] ?? '';
    $reason_for_applying = $_POST['reason_for_applying'] ?? '';

    $CV_uploaded = $_FILES['cv_uploaded']['name'] ?? '';

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cv_uploaded"]["name"]);
    move_uploaded_file($_FILES["cv_uploaded"]["tmp_name"], $target_file);

    $sql = "INSERT INTO applicants (name, DOB, highest_graduation, graduation_year, CGPA, current_address, mobile_number, reason_for_applying, CV_uploaded) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisssss", $name, $DOB, $highest_graduation, $graduation_year, $CGPA, $current_address, $mobile_number, $reason_for_applying, $CV_uploaded);

    if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>



<div class="application-form">
    
<h2 class="application-form__h2">Fill Form</h2>

<form action="./applicationDone.php" method="post" enctype="multipart/form-data">
    <label for="name" class="name">Name:</label>
    <input  type="text" id="name" name="name" placeholder="Enter Name" minlength="3" pattern="[A-Za-z\s]+" required><br>

    <label for="dob" class="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" placeholder="Enter DOB" required><br>

    <label for="highest_graduation" class="highest_graduation">Highest Graduation:</label>
    <input type="text" id="highest_graduation" placeholder="Enter Highest Graduation" name="highest_graduation" required><br>

    <label for="graduation_year" class="graduation_year">Graduation Year:</label>
    <input type="number" id="graduation_year" placeholder="Enter Graduation-Year" name="graduation_year" required><br>

    <label for="cgpa" class="cgpa">CGPA:</label>
    <input type="number" id="cgpa" name="cgpa"  placeholder="Enter CGPA"><br>

    <label for="current_address" class="current_address">Current Address:</label>
    <input type="text" id="current_address" placeholder="Enter Current-Address" name="current_address" required><br>

    <label for="mobile_number" class="mobile_number">Mobile Number:</label>
    <input type="tel" id="mobile_number" name="mobile_number" placeholder="Enter Mobile-Number" required><br>

    <label for="reason_for_applying" class="reason_for_applying">Reason for Applying:</label></br>
    <textarea id="reason_for_applying" name="reason_for_applying" placeholder="Enter Reason-For-Applying" required></textarea><br>

    <label for="cv_uploaded" class="cv_uploaded">Upload CV:</label>
    <input type="file" id="cv_uploaded" name="cv_uploaded" placeholder="Upload CV"  accept=".pdf, .doc, .docx" required><br>

   <center> <input type="submit" class="form-btn" value="Submit"></center>
</form>

</div>

