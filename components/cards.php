<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cion_careers";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT id, role, location, role_overview, image_url FROM careers";

$result = $conn->query($sql);
?>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $role = $row["role"];
        $location = $row["location"];
        $image = $row["image_url"];
        $role_overview =$row["role_overview"];
?>
            <div class="card">
                <a class="card__anchor" href="./components/job_description.php?id=<?php echo $id; ?>">
                    <img class="card__image" src="../assets/role-icon/<?php echo $image;?>" alt="image" />
                    <h3 class="card__text-h3"><?php echo $role; ?></h3>
                    <p class="card__location">@<?php echo $location;?></p>
                    <p class="card__role-overview"><?php echo $role_overview;?>&nbsp;<b class="card__read-more">Read more</b></p>
                    
                </a>
            </div>
     
<?php
    }
} else {
    echo "No results found";
}
$conn->close();
?>