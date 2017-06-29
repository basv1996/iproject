<h1><?php echo $title; ?></h1>

<div id="aboutUs">
    <h2>Concept:</h2>
    <p id="kruisje">X</p>
    <p>Op deze website kunt uw opdrachten krijgen voor u en uw partner. </br> De site is gecrowdsourced, dit houdt in dat u zelf de content aan vult</p>
</div>
<script>
    
document.getElementById("kruisje").addEventListener("click",hide);

function hide() {
   document.getElementById("aboutUs").style.display = "none";
    
   }</script>
<div id="content">
    <?php
$query = "SELECT * FROM assignments ORDER BY RAND()";
$result = mysqli_query($db, $query) or die(mysql_error());
while($row = mysqli_fetch_array($result))//assoc maken
{
    echo '<a href="?page=sent2Partner&Pid='. $row['id'] .'">';
    echo '<div id="littleBox">';
    echo '<img id="ribbon" src="img/Ribbon4.png">';
    echo "<h2>".htmlentities($row['title'])."</h2>"; 
    echo "<p>".$row['tag1']."</p>"; 
    echo "<p>".$row['tag2']."</p>"; 
    echo "<p>".$row['tag3']."</p>"; 
    echo "<p id='price'>"."kosten: €".$row['price']."</p>"; 
    //echo "<p>"."<i>"."Uploaded By:"."</i>"." "."<b>".$row['username']."</b>"."</p>";
    echo "</div>";
    echo "</a>";
}
?>
</div>
