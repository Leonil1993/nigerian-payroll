<!DOCTYPE html>
<html>
	<?php
		require_once realpath('../../vendor/autoload.php');
		session_start();
		//error_reporting();
        use Payroll\Classes\Sql\UserInfo;
        $userInfo = new UserInfo(null);
		if (isset($_SESSION['adminID'])) {
			include'./head.php';
			include'./body.php';
			include'./script.php';
		}else{
			header('location:../../index.php');
		}
	?>
</html>