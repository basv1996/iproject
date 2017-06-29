<?php 

$title = '';

$page = isset($_GET['page'])?$_GET['page']:'Home';

include 'view/head.php';

switch ($page) {
	case 'Home':
		include 'view/home.php';
		break;
	case 'page1':
        $title = 'Seduce Your partner';
        include 'config/db.php';
        include 'view/nav.php';
        include 'view/slider.php';
		include 'view/page1.php';
        include 'view/footer.html';
		break;
	case 'addition':
        include 'config/db.php';
        include 'view/nav.php';
        include 'view/Acces.php';
		include 'view/addition.php';
        include 'view/footer.html';
		break;
	case 'user':
        include 'config/db.php';
        include 'view/nav.php';
        include 'view/Acces.php';
		include 'view/user.php';
        include 'view/footer.html';
		break;
	case 'login':
        include 'config/db.php';
        include 'view/nav.php';
		include 'login/index.php';
        include 'view/footer.html';
		break;
	case 'verify_email':
        include 'config/db.php';
        include 'view/nav.php';
		include 'register/verify.php';
        include 'view/footer.html';
		break;
    case 'login2';
        include 'config/db.php';
        include 'view/nav.php';
        include 'login/login.php';
        break;
    case 'logout';
        include 'view/nav.php';
        include 'login/logout.php';
        include 'view/footer.html';
        break;
    case 'login_submit';
        include 'config/db.php';
        include 'login/login_submit.php';
        break;
    case 'cms':
        include 'config/db.php';
        include 'cms/index.php';
		break;
    case 'cms_edit':
        echo 'hello';
        include 'config/db.php';
        include 'cms/edit.php';
		break;
    case 'cms_delete':
        include 'config/db.php';
        include 'cms/delete.php';
		break;
    case 'sent2Partner':
        include 'config/db.php';
        include 'view/nav.php';
        include 'view/Acces.php';
        include 'view/sent2partner.php';
        include 'view/footer.html';
		break;
	default:
		include 'view/home.php';
		break;
}

 ?>