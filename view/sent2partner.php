<?php

$pid = isset($_GET['Pid'])?$_GET['Pid']:'2';
$pid = preg_replace("/[^0-9]/","",$pid);
$emailcheck = $_GET['emailcheck'];

$result = mysqli_query($db, "SELECT * FROM assignments WHERE id  = '$pid'");

while ($row = mysqli_fetch_array($result)) 
		
{
    echo '<div id="littleBox" class="sent2PartnerBox">';
    if(!$emailcheck){
    echo '<img id="ribbon" src="img/Ribbon4.png">';}
    echo "<h2>".htmlentities($row['title'])."</h2>"; 
    echo "<p>".$row['tag1']."</p>"; 
    echo "<p>".$row['tag2']."</p>"; 
    echo "<p>".$row['tag3']."</p>"; 
    echo "<p id='price'>"."kosten: €".$row['price']."</p>"; 
    echo "</div>";
    if($emailcheck){
    echo "<p id='contentAfterEmail'>".$row['content']."</p>"; 
    }
}

?>
    <form id="sent2Partner" method="post" action="view/sendmail.php">
        
        <input type="text" name="ownName" placeholder="your name"/>
        <br>
        <input type="hidden" name="page" value="sent2Partner"/>
        <input type="hidden" name="Pid" value="<?php echo $pid;?>"/>
        <input type="text" name="username" placeholder="partners name"/>
        
        <input type="text" name="PartnerEmail" placeholder="partners email" />
        <br>
        <input type="submit" value="Submit2Partner">
    </form>