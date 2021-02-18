<?php
namespace Payroll\Classes\Sql;

use Payroll\Classes\Database\Controller;
use Payroll\Classes\Sql\UpdateUser;
/**
 * 
 */

class AddUser
{	
	private $controller;
	private $update;

	private $username;
	private $password;

	private $month;
	private $from;
	private $to;
	private $year;

	private $firstname;
	private $lastname;
	private $designation;
	private $birthday;
	private $age;
	private $gender;
	private $address;
	private $contact;
	private $salary_rate_basis;
	private $salary_rate_peso;
	private $sss;
	private $pagibig;
	private $philhealth;

	private $basic_pay;
	private $total_late;
	private $total_overtime;	
	private $days_present;
	private $overtime;
	private $late_undertime;
	private $employee_id;
	private $payroll_period_id;

	private $start_leave;
	private $end_leave;


	function __construct($obj){

		$this->controller = new Controller();
		$this->update = new UpdateUser(null);

		//admin
		$this->username = htmlspecialchars(isset($obj->username) ? $obj->username : null);
		$this->password = htmlspecialchars(isset($obj->password) ? $obj->password : null);
		// create-payroll
		$this->month = htmlspecialchars(isset($obj->month) ? $obj->month : null);
		$this->from = htmlspecialchars(isset($obj->from) ? $obj->from : null);
		$this->to = htmlspecialchars(isset($obj->to) ? $obj->to : null);
		$this->year = htmlspecialchars(isset($obj->year) ? $obj->year : null);
		//employee
		$this->firstname = htmlspecialchars(isset($obj->firstname) ? $obj->firstname : null);
		$this->lastname = htmlspecialchars(isset($obj->lastname) ? $obj->lastname : null);
		$this->designation = htmlspecialchars(isset($obj->designation) ? $obj->designation : null);
		$this->birthday = htmlspecialchars(isset($obj->birthday) ? $obj->birthday : null);
		$this->age = htmlspecialchars(isset($obj->age) ? $obj->age : null);
		$this->gender = htmlspecialchars(isset($obj->gender) ? $obj->gender : null);
		$this->address = htmlspecialchars(isset($obj->address) ? $obj->address : null);
		$this->contact = htmlspecialchars(isset($obj->contact) ? $obj->contact : null);
		$this->salary_rate_basis = htmlspecialchars(isset($obj->salary_rate_basis) ? $obj->salary_rate_basis : null);
		$this->salary_rate_peso = htmlspecialchars(isset($obj->salary_rate_peso ) ? $obj->salary_rate_peso  : null);
		$this->sss = htmlspecialchars(isset($obj->sss) ? $obj->sss : null);
		$this->pagibig = htmlspecialchars(isset($obj->pagibig) ? $obj->pagibig : null);
		$this->philhealth = htmlspecialchars(isset($obj->philhealth) ? $obj->philhealth : null);
		// time attendance
		$this->days_present = htmlspecialchars(isset($obj->days_present) ? $obj->days_present : null);
		$this->overtime = htmlspecialchars(isset($obj->overtime) ? $obj->overtime : null);
		$this->late_undertime = htmlspecialchars(isset($obj->late_undertime) ? $obj->late_undertime : null);
		$this->employee_id = htmlspecialchars(isset($obj->employee_id) ? $obj->employee_id : null);
		$this->payroll_period_id = htmlspecialchars(isset($obj->payroll_period_id) ? $obj->payroll_period_id : null);
		// summary
		$this->basic_pay = htmlspecialchars(isset($obj->basic_pay) ? $obj->basic_pay : null);
		$this->total_late = htmlspecialchars(isset($obj->total_late) ? $obj->total_late : null);
		$this->total_overtime = htmlspecialchars(isset($obj->total_overtime) ? $obj->total_overtime : null);
		$this->total_earnings = htmlspecialchars(isset($obj->total_earnings) ? $obj->total_earnings : null);
		$this->total_deductions = htmlspecialchars(isset($obj->total_deductions) ? $obj->total_deductions : null);
		$this->net_pay = htmlspecialchars(isset($obj->net_pay) ? $obj->net_pay : null);
		//leave
		$this->start_leave = htmlspecialchars(isset($obj->start_leave) ? $obj->start_leave : null);
		$this->end_leave = htmlspecialchars(isset($obj->end_leave) ? $obj->end_leave : null);


	}
	public function generateID(){
		$number = uniqid($this->firstname, false);
	    $varray = str_split($number);
	    $len = sizeof($varray);
	    $otp = array_slice($varray, $len-5, $len);
	    $otp = implode(",", $otp);
	    $otp = str_replace(',', '', $otp);
	    return $otp;
	}
	//check kung nag exist na ang username
	public function checkIfUserExist(){
	    return $this->controller->select(
	    	"SELECT * FROM admin_tbl WHERE username = ? ",
	    	[
		    	'username' => $this->username
		    ]
	    );
	}
	public function addUser(){
	    if ($this->checkIfUserExist()) {
	    	return "usernameExisted";
	    }else{
	    	return $this->controller->insert(
	    		"INSERT INTO admin_tbl (username, password) VALUES (?, ?)",
	    		[
			        'username' => $this->username,
			        'password' => password_hash($this->password, PASSWORD_DEFAULT),
			    ]
	    	);
	    }
	}
	public function createPayroll(){
		if($this->controller->select(
			"SELECT * FROM payroll_period_tbl WHERE month = ? AND to_day = ? AND from_day = ? AND year = ? AND admin_id = ?",
			[
				'month' => $this->month,
		        'to_day' => $this->to,
		        'from_day' => $this->from,
		        'year' => $this->year,
		        'admin_id' => $_SESSION['adminID']
			]
		))return false;
	    $payroll = $this->controller->insert(
	    	"INSERT INTO payroll_period_tbl (month, to_day, from_day, year, admin_id, total_pay) VALUES (?, ?, ?, ?, ?, ?)",
	    	[
		        'month' => $this->month,
		        'to_day' => $this->to,
		        'from_day' => $this->from,
		        'year' => $this->year,
		        'admin_id' => $_SESSION['adminID'],
		        'total_pay' => 0,
	    	]
	    );
	    $payroll_period_id = null;
	    foreach ($this->controller->select(
	    	"SELECT MAX(id) AS highest FROM payroll_period_tbl",
	    	[]
	    ) as $key => $value) {
	    	$payroll_period_id = $value->highest;
	    }
	    foreach ($this->controller->select(
	    	"SELECT * FROM employee_details_tbl WHERE admin_id = ?",
	    	[
	    		'admin_id' => $_SESSION['adminID']
	    	]
	    ) as $key => $value) {
	    	$this->controller->insert(
		    	"INSERT INTO payroll_processing_tbl (payroll_period_id, employee_id, firstname, lastname, payroll_setup, admin_id) VALUES (?, ?, ?, ?, ?, ?)",
		    	[
		    		'payroll_period_id' => $payroll_period_id,
		    		'employee_id' => $value->id,
		    		'firstname' => $value->firstname,
		    		'lastname' => $value->lastname,
		    		'payroll_setup' => false,
		    		'admin_id' => $_SESSION['adminID']
		    	]
		    );
	    }
	    $this->insertToYear();
	    return $payroll; 
		    
	}
	public function addEmployee(){
		$employee_id = "n-".$this->generateID();

	    $sqlE = "INSERT INTO employee_details_tbl (id, firstname, lastname, designation, birthday, age, gender, address, contact, admin_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	    $arrayE = [
	    	'id' => $employee_id,
	        'firstname' => $this->firstname,
			'lastname' => $this->lastname,
			'designation' => $this->designation,
			'birthday' => $this->birthday,
			'age' => $this->age,
			'gender' => $this->gender,
			'address' => $this->address,
			'contact' => $this->contact,
			'admin_id' => $_SESSION['adminID']
	    ];

	    $sqlS = "INSERT INTO salary_rate_tbl (salary_rate_basis, salary_rate_peso, employee_id) VALUES (?, ?, ?)";
	    $arrayS = [
	    	'salary_rate_basis' => $this->salary_rate_basis,
			'salary_rate_peso' => $this->salary_rate_peso,
			'employee_id' => $employee_id,
	    ];

	    $sqlC = "INSERT INTO employee_contributions_tbl (sss, pagibig, philhealth, employee_id) VALUES (?, ?, ?, ?)";
	    $arrayC = [
	    	'sss' => $this->sss,
			'pagibig' => $this->pagibig,
			'philhealth' => $this->philhealth,
			'employee_id' => $employee_id,
	    ];

	    $sqlD = "INSERT INTO leave_tbl (employee_id, status) VALUES (?, ?)";
	    $arrayD = [
			'employee_id' => $employee_id,
			'status' => false
	    ];

	    return $this->controller->insert($sqlE, $arrayE) && $this->controller->insert($sqlS, $arrayS) && $this->controller->insert($sqlC, $arrayC) && $this->controller->insert($sqlD, $arrayD);
	}
	public function timeAttendance(){
		$timeAttendanceIsExist = $this->controller->select(
			"SELECT * FROM time_attendance_tbl WHERE employee_id = ? AND payroll_period_id = ?",
			[
				'employee_id' => $this->employee_id,
				'payroll_period_id' => $this->payroll_period_id
			]
		);
		$employeeSummaryIsExist = $this->controller->select(
			"SELECT * FROM employee_payroll_summary_tbl WHERE employee_id = ? AND payroll_period_id = ?",
			[
				'employee_id' => $this->employee_id,
				'payroll_period_id' => $this->payroll_period_id
			]
		);
		if ($timeAttendanceIsExist && $employeeSummaryIsExist) {
			$updateEmployeeSummary = $this->update->updateEmployeeSummary(
				"UPDATE time_attendance_tbl SET days_present = ?,  overtime = ?, late_undertime = ?  WHERE employee_id = ? AND payroll_period_id = ?",
				[
					'days_present' => $this->days_present,
					'overtime' => $this->overtime,
					'late_undertime' => $this->late_undertime,
					'employee_id' => $this->employee_id,
					'payroll_period_id' => $this->payroll_period_id
				]
			);
			$updateAttendance = $this->update->updateAttendance(
				"UPDATE employee_payroll_summary_tbl SET basic_pay = ? , total_overtime = ?, total_late = ?, total_earnings = ?,  total_deductions = ?, net_pay = ?  WHERE employee_id = ? AND payroll_period_id = ?",
				[	
					'basic_pay' => $this->basic_pay,
					'total_overtime' => $this->total_overtime,
					'total_late' => $this->total_late,
					'total_earnings' => $this->total_earnings,
					'total_deductions' => $this->total_deductions,
					'net_pay' => $this->net_pay,
					'employee_id' => $this->employee_id,
					'payroll_period_id' => $this->payroll_period_id
				]
			);
			if ($updateAttendance && $updateEmployeeSummary){
				return "updated";
			};
			
		}else{
			$insertAttendance = $this->controller->insert(
				"INSERT INTO time_attendance_tbl (days_present, overtime, late_undertime, employee_id, payroll_period_id) VALUES (?, ?, ?, ?, ?)",
				[
					'days_present' => $this->days_present,
					'overtime' => $this->overtime,
					'late_undertime' => $this->late_undertime,
					'employee_id' => $this->employee_id,
					'payroll_period_id' => $this->payroll_period_id
				]
			);
			$insertSummary = $this->controller->insert(
				"INSERT INTO employee_payroll_summary_tbl (basic_pay, total_overtime, total_late, total_earnings, total_deductions, net_pay, employee_id, payroll_period_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
				[
					'basic_pay' => $this->basic_pay,
					'total_overtime' => $this->total_overtime,
					'total_late' => $this->total_late,
					'total_earnings' => $this->total_earnings,
					'total_deductions' => $this->total_deductions,
					'net_pay' => $this->net_pay,
					'employee_id' => $this->employee_id,
					'payroll_period_id' => $this->payroll_period_id,
				]
			);
			if ($insertAttendance && $insertSummary){
				if($this->update->setToTrue($this->employee_id, $this->payroll_period_id)){
					return "set";
				}else{
					return "failed";
				}
			}else{
				return "failed";
			}

		}
		
	}
	public function checkIfleaveIsActive(){
		return $this->controller->select(
			"SELECT * FROM leave_tbl WHERE employee_id = ? AND status = ?",
			[
				'employee_id' => $this->employee_id,
				'status' => 1
			]
		);
	}
	public function setLeave(){
		$this->controller->insert(
			"INSERT INTO leave_history_tbl (start_leave, end_leave, employee_id) VALUES (?, ?, ?)",
			[
				'start_leave' => $this->start_leave,
				'end_leave' => $this->end_leave,
				'employee_id' => $this->employee_id,
		    ]
		);
	    return $this->controller->update(
			"UPDATE leave_tbl SET start_leave = ?, end_leave = ?, status = ? WHERE employee_id = ?",
			[
				'start_leave' => $this->start_leave,
				'end_leave' => $this->end_leave,
				'status' => true,
				'employee_id' => $this->employee_id
			]
		);
		
	}
	public function updateYearSelectedToFalse(){
		return $this->controller->update(
			"UPDATE year_tbl SET selected = ? WHERE admin_id = ?",
			[
				'selected' => false,
				'admin_id' => $_SESSION['adminID']
			]
		);
	}
	public function insertToYear(){
		$maxYearPayrollPeriodTbl = null;
		$maxYearYearTbl = null;
		$countRows = null;
		foreach ($this->controller->select(
			"SELECT MAX(year) as maxYear FROM payroll_period_tbl WHERE admin_id = ?",
			[
				'admin_id' => $_SESSION['adminID']
			]
		) as $key => $value) {
			$maxYearPayrollPeriodTbl = $value->maxYear;
		}
		foreach ($this->controller->select(
			"SELECT MAX(year) as maxYear FROM year_tbl WHERE admin_id = ?",
			[
				'admin_id' => $_SESSION['adminID']
			]
		) as $key => $value) {
			$maxYearYearTbl = $value->maxYear;
		}
		foreach ($this->controller->select(
			"SELECT COUNT(*) as count FROM year_tbl WHERE admin_id = ?",
			[
				'admin_id' => $_SESSION['adminID']
			]
		) as $key => $value) {
		 	$countRows = $value->count;
		} 
		if ($countRows > 1) {
			$this->updateYearSelectedToFalse();
		}
		
		if ($maxYearPayrollPeriodTbl > $maxYearYearTbl) {
			$this->controller->insert(
				"INSERT INTO year_tbl (admin_id, year, selected) VALUES (?, ?, ?)",
				[
				 	'admin_id' => $_SESSION['adminID'],
				 	'year' => $maxYearPayrollPeriodTbl,
				 	'selected' => true
				]
			);
		}else if($maxYearPayrollPeriodTbl == $maxYearYearTbl){
			$this->controller->insert(
				"UPDATE year_tbl SET year = ?, selected = ? WHERE admin_id = ?",
				[
				 	'year' => $maxYearPayrollPeriodTbl,
				 	'selected' => true,
				 	'admin_id' => $_SESSION['adminID'],
				]
			);
		}
	}
}