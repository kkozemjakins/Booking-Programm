<?php
session_start();

// Get the id parameter from the URL
$id = $_GET['id'];
$_SESSION['OfferID'] = $id;
//$_SESSION['CustomerID'];
// Connect to the database
include '../../FunctionsPHP/DataBaseConn.php';
$conn = mysqli_connect($host, $username, $password, $dbname);

// Retrieve data from the database
$query = "SELECT * FROM offers LEFT JOIN images on offers.ImageID = images.ImageID WHERE OffersID = $id"; // Here, id 1 represents the ID of the page you want to display
$result = mysqli_query($conn, $query);
$pageData = mysqli_fetch_assoc($result);

// Load the page template
$template = file_get_contents('page-template.html');

// Replace variables in the template with values from the database
if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === true) {
          
    $template = str_replace('{session}', 'Welcome, ' . $_SESSION['username'] . '!'.  $_SESSION['access'] . '
    <li class="nav__item"><a class="nav__link"><form action="..\..\FunctionsPHP\logout.php" method="post">
        <button type="submit" name="logout">Exit</button></form></a></li>', $template);

    $template = str_replace('{ReservationForm}', 
    '<h3>Reservation:</h3>
    <form action="..\..\FunctionsPHP\reservation.php" method="post">
    <input type="number" name="PersonAmount"  placeholder="PersonAmount" required>
    <input type="datetime-local" name="StartDate"  placeholder="StartDate" required>
    <input type="datetime-local" name="EndDate"  placeholder="EndDate" required>
    <input type="number" name="SumPrice"  placeholder="SumPrice" required>
    <input type="submit" name="reservation" value="Add reservation">
    </form>', $template);

    $template = str_replace('{CommentForm}', 
    '<h3>Write Your Comment:</h3>
    <form action="..\..\FunctionsPHP\CommentAdd.php" method="post">
    <label for="rating">Rating (between 1 and 5):</label>
    <input type="range" name="rating" min="1" max="5">
    <input type="textbox" name="CommentText"  placeholder="Text" required>
    <input type="submit" name="CommentAdd" value="Comment Add">
    </form>', $template);
    
}else{
    $template = str_replace('{ReservationForm}', 
    '<h2>You need to SignUp</h2>', $template);

    $template = str_replace('{session}', '<li class="nav__item"><a href="..\login.php" class="nav__link">Sign in</a></li>
    <li class="nav__item"><a href="..\registration.php" class="nav__link nav__link--button">Sign up</a></li>', $template);
}

$query2 = "SELECT * FROM comments LEFT JOIN customer on comments.CustomerID = customer.CustomerID WHERE OffersID = $id";
$result2 = mysqli_query($conn, $query2);




if (mysqli_num_rows($result2) == 0) {
    echo "No results found.";
} else {
    $pageData2 = mysqli_fetch_assoc($result2);
    // process the result set

    foreach ($result2 as $row) {
        $deleteButton = '<form class="UpdateValuesForm" action="..\..\FunctionsPHP\DeleteComment.php" method="post">
        <input type="hidden" name="CommentID" value="'.$row['CommentID'].'">
        <input type="submit" value="Delete"></form>';

        $updateButton = '<form action="..\..\FunctionsPHP\UpdateComment.php" method="post">
        <input type="hidden" name="CommentID" value="'.$row['CommentID'].'">
        <input type="range" min="1" max="5" name="Rating" value="'.$row['Rating'].'">
        <input type="text" name="CommentText" value="'.$row['CommentText'].'">
        <input type="submit" value="Update"></form>';

        $commentsHtmlCode = '<h2>Comments:</h2>';
        $commentsHtmlCode = $commentsHtmlCode . "<p><div style='border: 2px solid black'><h4>UserName:</h4>" . $row['FirstName'] . " " . $row['LastName'] . "
        <h4>Date:</h4>" . $row['Date'] . "
        <h4>Rating:</h4>" . $row['Rating'] . "/5
        <h4>Text:</h4>" . $row['CommentText'];

        if($row['CustomerID'] == $_SESSION['CustomerID'] || $_SESSION['access'] == 1){
            $commentsHtmlCode =  $commentsHtmlCode. ' ' .$deleteButton . ' '. $updateButton ."</div></p>";;
        }

    }
    
    $template = str_replace('{Comments}', $commentsHtmlCode, $template);
}

if ($_SESSION['access'] == 0){
    $template = str_replace('{ActivitiesLink}', '..\user\ActivitiesUser.php', $template);
    $template = str_replace('{ReservationLink}', '..\user\UserReservation.php', $template);

}elseif($_SESSION['access'] == 1){
    $template = str_replace('{ActivitiesLink}', '..\admin\ActivitiesAdmin.php', $template);
    $template = str_replace('{ReservationLink}', '..\admin\ReservationAdmin.php', $template);
}else{
    $template = str_replace('{ActivitiesLink}', '..\Activities.php', $template);
    $template = str_replace('{ReservationLink}', '..\login.php', $template);
}


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
