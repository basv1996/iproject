<?php 

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    echo "Welcome, " . $_SESSION['username'] . "!";
} else {
    echo "Please log in first to see this page.";
}
echo "<br>";

if ($_SESSION['username'] == 'admin'){
    echo '<a id="cmsLink" href="index.php?page=cms">cms</a>';
}
echo "<br>";
?>

<a href="index.php?page=logout">Sign Out</a>