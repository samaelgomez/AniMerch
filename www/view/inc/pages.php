<?php
	switch($_GET['page']) {
		case Constants::PAGE_HOME:
			include("module/home/view/home.html");
			break;
		case Constants::PAGE_SHOP:
			include("module/shop/view/shop.html");
			break;
		case Constants::PAGE_DETAILS:
			include("module/details/view/details.html");
			break;
		default:
			break;
	}
?>