<h1><?php echo $title; ?></h1>
<h1>Schrijf hier uw romantische inzending in</h1>
<form id="InputContent" method="post">
    <input required id="ContentTitle" name="title" placeholder="title, maximaal 20 karakters" maxlength="20">
    <input required id="ContentTag1" name="tag1" placeholder="tag woord 1" maxlength="22">
    <input  required id="ContentTag2" name="tag2" placeholder="tag woord 2" maxlength="22">
    <input required id="ContentTag3" name="tag3" placeholder="tag woord 3"maxlength="22">
    <input required id="ContentPrice" name="price" placeholder="price">
    <textarea required id="Content" name="content" placeholder="Schrijf hier in het kort wat de opdracht in houd"></textarea>
    <button name="ContentSubmit" type="submit">Stuur UW verhaal in</button>
</form>



<?php
function cleanTag($str)
{
    $str=preg_replace("/[^a-z0-9-_]/",'',strtolower($str));
    return $str;
}
    
function cleanString($str)
{
    $str=preg_replace("/[^a-z0-9_ ;,.:!?-]/",'',strtolower($str));
    return $str;
}

if (isset($_POST['ContentSubmit']))
{	   
	$title=cleanString($_POST['title']); 
    $tag1=cleanTag($_POST['tag1']) ;	                                         				                                           
    $tag2=cleanTag($_POST['tag2']) ;			                                                                         
    $tag3=cleanTag($_POST['tag3']) ;
    $price=intval(cleanTag($_POST['price'])) ;
    $content=cleanString($_POST['content']) ;
    
					
    $sql = "INSERT INTO `assignments`(`title`, `tag1`, `tag2`, `tag3`, `price`, `content`) 
		 VALUES ('$title','$tag1','$tag2','$tag3','$price','$content')"; 

    $result = mysqli_query($db, $sql) or die(mysqli_error());
    header ("refresh:0;url=index.php?page=page1");
				}

?>
    </body>

    </html>