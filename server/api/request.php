<?php
require_once realpath('../../vendor/autoload.php');
//header('Content-Type: application/json; charset=utf-8', true);
error_reporting();
session_start();

// session_unset();

use Payroll\Classes\Sql\AddUser;
use Payroll\Classes\Sql\UpdateUser;
use Payroll\Classes\Sql\DeleteUser;
use Payroll\Classes\Sql\UserInfo;
// use Payroll\Classes\Sql\ValidateUsername;
if (htmlspecialchars(isset($_GET['logout']))) {
    session_unset();
    header('location:../../index.php');
}
// mag kuhag data sa database para e validate ang username
if (htmlspecialchars(isset($_REQUEST['username']))) {
    $userInfo = new UserInfo(json_decode($_REQUEST['data']));
    echo json_encode($userInfo->validateUsername());
    // echo json_encode($_REQUEST['username']);
}
if (htmlspecialchars(isset($_REQUEST['sign-up']))) {
    $addUser = new AddUser(json_decode($_REQUEST['data']));
    echo json_encode($addUser->addUser());
}

if (htmlspecialchars(isset($_REQUEST['sign-in']))) {
    $userInfo = new UserInfo(json_decode($_REQUEST['data']));
    echo json_encode($userInfo->validateUsernamePassword());
    //echo var_dump(json_decode($_REQUEST['data']));
}
if (htmlspecialchars(isset($_REQUEST['check-if-have-employee']))) {
    $userInfo = new UserInfo(null);
    echo json_encode($userInfo->checkIfHaveEmployee());
    //echo var_dump(json_decode($_REQUEST['data']));
}
if (htmlspecialchars(isset($_REQUEST['check-if-have-payroll']))) {
    $userInfo = new UserInfo(null);
    echo json_encode($userInfo->checkIfHavePayroll());
    //echo var_dump(json_decode($_REQUEST['data']));
}
// create new payroll
if (htmlspecialchars(isset($_REQUEST['create-payroll']))) {
    $createPayroll = new AddUser(json_decode($_REQUEST['data']));
    echo json_encode($createPayroll->createPayroll());
}
//add new employee
if (htmlspecialchars(isset($_REQUEST['add-employee']))) {
    $addEmployee = new AddUser(json_decode($_REQUEST['data']));
    echo json_encode($addEmployee->addEmployee());
}
//add leave
if (htmlspecialchars(isset($_REQUEST['set-leave']))) {
    $addEmployee = new AddUser(json_decode($_REQUEST['data']));
    echo json_encode($addEmployee->setLeave());
}
//cancel leave
if (htmlspecialchars(isset($_REQUEST['cancel-leave']))) {
    $updateUser = new UpdateUser(json_decode($_REQUEST['data']));
    echo json_encode($updateUser->cancelLeave());
}
// employee details
if (htmlspecialchars(isset($_REQUEST['employee-details']))) {
    $userInfo = new UserInfo(json_decode($_REQUEST['data']));
    echo json_encode($userInfo->getEmployeeData());
    //echo json_encode($_SESSION['employeeID']);
}
// // mag update og employee information sa database
if (htmlspecialchars(isset($_REQUEST['update-employee']))) {
    $updateUser = new UpdateUser(json_decode($_REQUEST['data']));
    echo json_encode($updateUser->employeeUpdateInfo());
}
// // detselected year
if (htmlspecialchars(isset($_REQUEST['set-selected']))) {
    $updateUser = new UpdateUser(json_decode($_REQUEST['data']));
    echo json_encode($updateUser->setSelected());
}
// mag delete og employee sa database
if (htmlspecialchars(isset($_REQUEST['delete-employee']))) {
    $deleteUser = new DeleteUser(json_decode($_REQUEST['data']));
    echo json_encode($deleteUser->deleteEmployee());
}
// add attendance
if (htmlspecialchars(isset($_REQUEST['save-payroll']))) {
    $addUser = new AddUser(json_decode($_REQUEST['data']));
    echo json_encode($addUser->timeAttendance());
    //echo json_encode(json_decode($_REQUEST['data']));
}
// view time attendance
if (htmlspecialchars(isset($_REQUEST['view-time-attendance']))) {
    $userInfo = new UserInfo(json_decode($_REQUEST['data']));
    echo json_encode($userInfo->getTimeAttendance());
    //echo json_encode(json_decode($_REQUEST['data']));
}
// view data chart 
if (htmlspecialchars(isset($_REQUEST['chart']))) {
    $userInfo = new UserInfo(null);
    echo json_encode($userInfo->getDataforChart());
    //echo json_encode(json_decode($_REQUEST['data']));
}
if (htmlspecialchars(isset($_REQUEST['latest-payroll']))) {
    $userInfo = new UserInfo(null);
    echo json_encode($userInfo->clickPayrollProcess());
    //echo json_encode(json_decode($_REQUEST['data']));
}

// if (htmlspecialchars(isset($_REQUEST['all-employee-details']))) {
//     $userInfo = new UserInfo(null);
//     echo json_encode($userInfo->getAllEmployeeData());
// }
// if (htmlspecialchars(isset($_REQUEST['nav']))) {
//     echo json_encode($_REQUEST['nav']);
// }

// mag add og bago na user sa database
// if (htmlspecialchars(isset($_REQUEST['add-user']))) {
//     $array = [
//         "username" => $_REQUEST['username'],
//         "password1" => $_REQUEST['password1'],
//         "firstname" => $_REQUEST['firstname'],
//         "lastname" => $_REQUEST['lastname'],
//         "email" => $_REQUEST['email'],
//         "phone" => $_REQUEST['phone']
//     ];
//     $addUser = new AddUser($array);
//     echo json_encode($addUser->addUser());
// }
// // mag update og user information sa database
// if (htmlspecialchars(isset($_REQUEST['profile-info']))) {
//     $array = [
//         "firstname" => $_REQUEST['profile-firstname'],
//         "lastname" => $_REQUEST['profile-lastname'],
//     ];
//     $updateUser = new UpdateUser($array);
//     echo json_encode($updateUser->userUpdateInfo());
// }
// // mag update og user password sa database
// if (htmlspecialchars(isset($_REQUEST['profile-password'])))
// {
//     $arrayValidate = [
//         "username" => $_REQUEST['profile-username'],
//         "password1" => $_REQUEST['profile-current-password'],
//     ];
//     $userInfo = new UserInfo($arrayValidate);

//     if($userInfo->validatePasswordUpdate())
//     {
//         $arrayUpdate = [
//         "password1" => $_REQUEST['profile-password1'],
//         ];

//         $updateUser = new UpdateUser($arrayUpdate);
//         echo json_encode($updateUser->userUpdatepassword());
//     }
//     else
//     {
//         echo json_encode(false);
//     }
// }
// // mag update og user password sa database
// if (htmlspecialchars(isset($_REQUEST['profile-email'])))
// {

//    $array = [
//    "email" => $_REQUEST['profile-email'],
//    ];

//    $updateUser = new UpdateUser($array);
//    echo json_encode($updateUser->userUpdateEmail());
// }
// // mag update og user password sa database
// if (htmlspecialchars(isset($_REQUEST['profile-phone'])))
// {

//    $array = [
//    "phone" => $_REQUEST['profile-phone'],
//    ];

//    $updateUser = new UpdateUser($array);
//    echo json_encode($updateUser->userUpdatePhone());
// }
// // mag delete og user sa database
// if (htmlspecialchars(isset($_REQUEST['delete-user']))) {
//     echo $deleteUser = new DeleteUser();
// }
// // mag kuhag data sa database para e validate ang username
// if (htmlspecialchars(isset($_REQUEST['validate-username']))) {
//     $array = [
//         "username" => $_REQUEST['username']
//     ];
//     $userInfo = new UserInfo($array);
//     echo json_encode($userInfo->validateUsername());
//     // echo json_encode($_REQUEST['username']);
// }
// // mag kuha og mga data sa database nya ilabay sa javascript
// if (htmlspecialchars(isset($_REQUEST['request-user-data']))) {
//     $userInfo = new UserInfo(null);
//     echo json_encode($userInfo->getUserData());
//     // echo json_encode("tae");
// }

// // mag validate og username og password para mka login
// if (htmlspecialchars(isset($_REQUEST['validate-username-password']))) {
//     $array = [
//         "username" => $_REQUEST['username'],
//         "password1" => $_REQUEST['password1'],
//     ];
//     $userInfo = new UserInfo($array);
//     echo json_encode($userInfo->validateUsernamePassword());
//     //echo json_encode($_REQUEST['password1']." ".$_REQUEST['username']);
// }



