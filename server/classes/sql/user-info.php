<?php
namespace Payroll\Classes\Sql;

use Payroll\Classes\Database\Controller;
use Payroll\Classes\Sql\UpdateUser;
/**
 * 
 */

class UserInfo
{	
	//validate username property
	private $controller;
	private $update;

	private $username;
	private $password;
	private $id;

	private $employee_id;
	private $payroll_period_id;

	function __construct($obj)
	{
		$this->controller = new Controller();
		$this->update = new UpdateUser(null);
		// `sign-in
		$this->username = htmlspecialchars(isset($obj->username) ? $obj->username : null);
		$this->password = htmlspecialchars(isset($obj->password) ? $obj->password : null);
		// employee details
		$this->id = htmlspecialchars(isset($obj->id) ? $obj->id : null);
		//get time attendance
		$this->employee_id = htmlspecialchars(isset($obj->employee_id) ? $obj->employee_id : null);
		$this->payroll_period_id = htmlspecialchars(isset($obj->payroll_period_id) ? $obj->payroll_period_id : null);

	}
	// chart
	public function getDataforChart(){
		$label = array();
		$data = array();
		foreach ($this->controller->select(
			"SELECT * FROM payroll_period_tbl WHERE admin_id = ? AND year = ?",
			[
				'admin_id' => $_SESSION['adminID'],
				'year' => $this->getYearSelected(),
			]
		) as $key => $value) {
			array_push($label, "$value->month $value->from_day-$value->to_day");
			if ($value->total_pay == null) {
				array_push($data, 0);
			}
			array_push($data, $value->total_pay);
		}
		return [
			'label' => $label,
			'data'=> $data
		];
	}
	// id sa user
	private function userId()
	{
		$sql = "SELECT * FROM admin_tbl WHERE username = ? ";

	    $array = [
	    	'username' => $this->username,
	    ];

	    foreach ($this->controller->select($sql, $array) as $key => $value)
	    {
	    	return $value->id;
	    }
	}
	// validate username method
	public function validateUsername()
	{
	    $sql = "SELECT * FROM admin_tbl WHERE username = ? ";

	    $array = [
	    	'username' => $this->username
	    ];

	    if($this->controller->select($sql, $array))
	    {
	    	return true;
	    }
	    else
	    {
	    	return false;
	    }
	}
	// kuhaon ang password_hash par ae verify
	public function getPasswordHash()
	{
		$sql = "SELECT * FROM admin_tbl WHERE username = ?";

	    $array = [
	    	'username' => $this->username
	    ];

	    foreach ($this->controller->select($sql, $array) as $key => $value)
	    {
	    	return $value->password;
	    }
	   
	}
	//mag validate username og password para mka login metthod
	public function validateUsernamePassword()
	{
	    if ($this->validateUsername())
	    {
	    	if(password_verify($this->password, $this->getPasswordHash()))
	    	{
				//session_regenerate_id(true);

	    		$_SESSION['adminID'] = $this->userId();

	    		return true;
	    	}
	    }
	    else
	    {
	    	return false;
	    }
	}
	// check if have employee
	public function checkIfHaveEmployee(){
	    foreach ($this->controller->select(
	    	"SELECT * FROM employee_details_tbl WHERE admin_id = ? ",
	    	[
		    	'admin_id' => $_SESSION['adminID']
		    ]
	    ) as $key => $value) {
	    	return $value;
	    }
	}
	public function checkIfHavePayroll(){
	    foreach ($this->controller->select(
	    	"SELECT * FROM payroll_period_tbl WHERE admin_id = ? ",
	    	[
		    	'admin_id' => $_SESSION['adminID']
		    ]
	    ) as $key => $value) {
	    	return $value;
	    }
	}	
	// all employee
	public function getAllEmployeeData(){
	    return $this->controller->select(
	    	"SELECT * FROM employee_details_tbl WHERE admin_id = ? ",
	    	[
		    	'admin_id' => $_SESSION['adminID']
		    ]
	    );
	}	
	// employee
	public function getEmployeeData(){

		$details = null;
		$rate = null;
		$contributions = null;
		$attendance = null;
		$summ = null;
		$leave = null;

	    foreach ($this->controller->select(
	    	"SELECT * FROM `employee_details_tbl` WHERE id = ? AND admin_id = ?",
	    	[	
	    	'id' => $this->id,
			'admin_id' => $_SESSION['adminID']
		]) as $key => $value) {$details = $value;}
	    
	    foreach ($this->controller->select(
	    	"SELECT * FROM `salary_rate_tbl` WHERE employee_id = ?",
	    	[	
	    	'employee_id' => $this->id,
		]) as $key => $value) {$rate = $value;}	
	   
	    foreach ($this->controller->select(
	    	"SELECT * FROM `employee_contributions_tbl` WHERE employee_id = ?",
	    	[	
	    	'employee_id' => $this->id,
		]) as $key => $value) {$contributions = $value;}

	   	foreach ($this->controller->select(
	    	"SELECT * FROM `time_attendance_tbl` WHERE employee_id = ?",
	    	[	
	    	'employee_id' => $this->id,
		]) as $key => $value) {$attendance = $value;}

	   	foreach ($this->controller->select(
	    	"SELECT * FROM `employee_payroll_summary_tbl` WHERE employee_id = ? AND payroll_period_id = ? ",
	    	[	
	    	'employee_id' => $this->id,
	    	'payroll_period_id' => $this->payroll_period_id
		]) as $key => $value) {$summ = $value;}

	   	foreach ($this->controller->select(
	    	"SELECT * FROM `leave_tbl` WHERE employee_id = ?",
	    	[	
	    	'employee_id' => $this->id,
		]) as $key => $value) {$leave = $value;}

	   	$leave_history = $this->controller->select(
	    	"SELECT * FROM `leave_history_tbl` WHERE employee_id = ?",
	    	[	
	    		'employee_id' => $this->id,
			]
		);

	    return [
	    	"details" => $details,
			"rate" => $rate,
			"contributions" => $contributions,
			"summ" => $summ,
			"attendance" => $attendance,
			"history" => [
				"all_summ" => $this->getEmployeeSummary(),
				"payroll_period" => $this->getPayrollPeriod()
			],
			'leave' => $leave,
			'leave_history' => $leave_history

	    ];
			
	}
	// get time attendance 
	public function getTimeAttendance(){
		foreach ($this->controller->select(
			"SELECT * FROM time_attendance_tbl WHERE employee_id = ? AND payroll_period_id = ?",
			[
				'employee_id' => $this->employee_id,
				'payroll_period_id' => $this->payroll_period_id
			]
		) as $key => $value) {return $value;}
	}
	// validate ang password para sa update password
	public function validatePasswordUpdate()
	{
	    if(password_verify($this->password, $this->getPasswordHash())){

			session_regenerate_id(true);

	    	return true;
	    }
	    else
	    {
	    	return false;
	    }
	}
	//return active payroll or latest na id
	public function latestPayrollId(){
		$payroll_period_id;
	    foreach ($this->controller->select(
	    	"SELECT MAX(id) AS highest FROM payroll_period_tbl WHERE admin_id = ?",
	    	[
	    		'admin_id' => $_SESSION['adminID']
	    	]
	    ) as $key => $value) {
	    	$payroll_period_id = $value->highest;
	    }
	    return $payroll_period_id;
	}
	//return month ,from_day, to_day,year
	public function clickPayrollProcess(){
		foreach ($this->controller->select(
	    	"SELECT * FROM payroll_period_tbl WHERE id = ? AND admin_id = ?",
	    	[
		    	'id' => $this->latestPayrollId(),
		    	'admin_id' => $_SESSION['adminID']
		    ]
	    ) as $key => $value) {
		 	return $value; 
		 } 
	}
	// [payroll processing]
	public function payroll_process(){
		return $this->controller->select(
	    	"SELECT * FROM payroll_processing_tbl WHERE payroll_period_id = ? AND admin_id = ?",
	    	[
		    	'payroll_period_id' => $this->latestPayrollId(),
		    	'admin_id' => $_SESSION['adminID']
		    ]
	    );
	}
	// overallpayroll
	public function overall_payroll(){
		return $this->controller->select(
	    	"SELECT * FROM payroll_period_tbl WHERE admin_id = ? AND year = ?",
	    	[
		    	'adminID' => $_SESSION['adminID'],
		    	'year' => $this->getYearSelected(),
		    ]
	    );
	}
	// sum of the period
	public function overall_sum_period($payroll_period_id){
		foreach ($this->controller->select(
	    	"SELECT SUM(net_pay) AS sum FROM employee_payroll_summary_tbl WHERE payroll_period_id = ?",
	    	[
		    	'payroll_period_id' => $payroll_period_id
		    ]
	    ) as $key => $value) {
	    	$this->update->updatePeriodTotal(
	    		"UPDATE payroll_period_tbl SET total_pay = ? WHERE id = ? AND admin_id = ?",
				[
					'total_pay' => $value->sum,
					'id' => $payroll_period_id,
					'admin_id' => $_SESSION['adminID']
				]
			);
			return $value->sum;
		}
	}
	// sum of all period by year
	public function overall_sum_period_year($year){
		foreach ($this->controller->select(
	    	"SELECT SUM(total_pay) AS sum FROM payroll_period_tbl WHERE year = ? AND admin_id = ?",
	    	[
		    	'year' => $year,
		    	'admin_id' => $_SESSION['adminID']
		    ]
	    ) as $key => $value) {
			return $value->sum;
		}
	}

	public function getEmployeeSummary(){
		return $this->controller->select(
			"SELECT * FROM employee_payroll_summary_tbl WHERE employee_id = ?",
			[
		    	'employee_id' => $this->id
		    ]
		);	
	}

	public function getPayrollPeriod(){
		$payroll_period = [];
		foreach ($this->getEmployeeSummary() as $key => $value) {
			array_push($payroll_period, $this->controller->select(
					"SELECT * FROM payroll_period_tbl WHERE id = ?",
					[
						'id' => $value->payroll_period_id
					]
				)
			);
		}
		return $payroll_period;
	}

	public function employeeDetails($id){
		foreach ($this->controller->select(
	    	"SELECT * FROM `employee_details_tbl` WHERE id = ? AND admin_id = ?",
	    	[	
	    	'id' => $id,
			'admin_id' => $_SESSION['adminID']
		]) as $key => $value) {return $value;}
	}
	
	public function getLeaveStatus($employee_id){
		foreach ($this->controller->select(
	    	"SELECT * FROM `leave_tbl` WHERE employee_id = ?",
	    	[	
			'employee_id' => $employee_id
		]) as $key => $value) {return $value;}
	}

	public function allYear(){
		return $this->controller->select(
			"SELECT * FROM year_tbl WHERE admin_id = ?",
			[
				'admin_id' => $_SESSION['adminID']
			]
		);
	}
	public function getYearSelected(){
		foreach($this->controller->select(
			"SELECT * FROM year_tbl WHERE selected = ? AND admin_id = ?",
			[
				'selected' => true,
				'admin_id' => $_SESSION['adminID'],
			]
		)
		as $key => $value) {
			return $value->year;
		}
	}

}