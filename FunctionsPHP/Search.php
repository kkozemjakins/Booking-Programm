<?php
include 'DataBaseConn.php';

// Retrieve the search term from the $_POST array
$search = $_POST['search'];

// Use a SQL query to search for records in the database that match the search term
$sql = "SELECT * FROM offers LEFT JOIN images on offers.ImageID = images.ImageID WHERE Name LIKE :search OR Details LIKE :search";
$stmt = $conn->prepare($sql);
$stmt->execute(['search' => "%$search%"]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the search results in an HTML table
if (count($result) > 0) {
  //echo "<table>";
  //echo "<tr><th>Name</th><th>Details</th></tr>";
  foreach ($result as $row) {
    echo '<div class="card">';
    echo '<div class="card__image-holder">';
    echo    '<img class="card__image" src="../../'. $row['path'] .'" alt="wave"/>';
    echo '</div>';
    echo '<div class="card-title">';
    echo    '<span class="left"></span>';
    echo    '<span class="right"></span>';
    echo    '<a href="../template/template.php?id='. $row['OffersID'] .'"class="btn" onclick="ToTemplate('. $row['OffersID'] .')">';
    echo    '<h2>';
    echo        $row['Name'];
    echo        '<small>'. $row['Address'] .'</small>';
    echo    '</h2></a>';
    echo '</div>';
    echo '<div class="card-flap flap1">';
    echo '</div>';

    //echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Details"] . "</td></tr>";
  }
  //echo "</table>";
} else {
  echo "No results found.";
}

// Close the database connection
$conn = null;
?>
