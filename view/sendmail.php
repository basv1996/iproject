<?php 

$ownName = $_POST['ownName'];
$PartnerEmail = $_POST['PartnerEmail'];
$pid = $_POST['Pid'];
$username = $_POST['username'];


$subject = "hoi hoi van $username ";
$message = '
<html>
<head>
<title> welkom </title>
</head>
<body>
<h1>Dear ' . $username . ',</h1>
<br>
<p>' . $ownName . ' sent you a suggestion:</p>
<a href="http://21248.hosts.ma-cloud.nl/bewijzenmap/leerjaar2/periode4/project/index.php?page=sent2Partner&Pid=' . $pid . '&emailcheck=1">Porn suggestion</a>
</body>
</html>
';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'To: ' . $username . ' <' . $PartnerEmail . '>';
$headers[] = 'From: ' . $ownName . ' <' . $ownName . '@ma-web.nl>';

mail($PartnerEmail, $subject, $message, implode("\r\n", $headers));
header ('Location: ../index.php?page=page1');
?>
