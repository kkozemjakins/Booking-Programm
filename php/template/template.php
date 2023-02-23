<?php

// Get the id parameter from the URL
 $id = $_GET['id'];

// Connect to the database
$host = "127.0.0.1";
$dbname = "booking";
$username = "root";
$password = "";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Retrieve data from the database
$query = "SELECT * FROM offers LEFT JOIN images on offers.ImageID = images.ImageID WHERE OffersID = $id"; // Here, id 1 represents the ID of the page you want to display
$result = mysqli_query($conn, $query);
$pageData = mysqli_fetch_assoc($result);

// Load the page template
$template = file_get_contents('page-template.html');

// Replace variables in the template with values from the database
$template = str_replace('{page_title}', $pageData['Name'], $template);
$template = str_replace('{page_Name}', $pageData['Name'], $template);
$template = str_replace('{page_Img}', $pageData['path'], $template);
$template = str_replace('{page_Price}', $pageData['Price'], $template);
$template = str_replace('{page_Address}', $pageData['Address'], $template);
$template = str_replace('{page_Details}', $pageData['Details'], $template);
$template = str_replace('{page_Link}', $pageData['Link'], $template);
// Output the final HTML code for the page
echo $template;
?>
