<?php
namespace Payroll\Classes\Sql;

use Payroll\Classes\Database\Controller;
/**
 * 
 */
class UpdateUser
{
	private $month;
	private $from;
	private $to;
	private $year;

	private $id;
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

	private $employee_id;

	function __construct($obj)
	{
		$this->controller = new Controller();
		//admin
		$this->username = htmlspecialchars(isset($obj->username) ? $obj->username : null);
		$this->password = htmlspecialchars(isset($obj->password) ? $obj->password : null);
		// create-payroll
		$this->month = htmlspecialchars(isset($obj->month) ? $obj->month : null);
		$this->from = htmlspecialchars(isset($obj->from) ? $obj->from : null);
		$this->to = htmlspecialchars(isset($obj->to) ? $obj->to : null);
		$this->year = htmlspecialchars(isset($obj->year) ? $obj->year : null);
		//employee
		$this->id = htmlspecialchars(isset($obj->id) ? $obj->id : null);
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
		//employee_id
		$this->employee_id = htmlspecialchars(isset($obj->employee_id) ? $obj->employee_id : null);

	}
	// mag update og user firstname og lastname
	public function userUpdateInfo(){
	    return $this->controller->update(
	    	"UPDATE user_tbl SET firstname = ?, lastname = ? WHERE user_id = ?",
	    	[
		    	'firstname' => $this->firstname,
		    	'lastname' => $this->lastname,
		    	'user_id' => $_SESSION['userID']
		    ]
	    );
	}
	// mag update og password
	public function userUpdatePassword(){
		return $this->controller->update(
			"UPDATE user_tbl SET password = ? WHERE user_id = ?",
			[
		    	'password' => password_hash($this->password, PASSWORD_DEFAULT),
		    	'user_id' => $_SESSION['userID']
		    ]
		);
	}
	// mag update og user email 
	public function userUpdateEmail(){
	    return $this->controller->update(
	    	"UPDATE user_tbl SET email = ? WHERE user_id = ?",
	    	[
		    	'email' => $this->email,
		    	'user_id' => $_SESSION['userID']
		    ]
	    );
	}
	// mag update og user phone 
	public function userUpdatePhone(){
	    return $this->controller->update(
	    	"UPDATE user_tbl SET phone = ? WHERE user_id = ?",
	    	[
		    	'phone' => $this->phone,
		    	'user_id' => $_SESSION['userID']
		    ]
	    );
	}
	public function setSelected(){
		$this->controller->update(
			"UPDATE year_tbl SET selected = ? WHERE admin_id = ?",
			[
				'selected' => false,
				'admin_id' => $_SESSION['adminID'],
			]
		);
		return $this->controller->update(
			"UPDATE year_tbl SET selected = ? WHERE admin_id = ? AND year = ?",
			[
				'selected' => true,
				'admin_id' => $_SESSION['adminID'],
				'year' => $this->year
			]
		);
	}
	// mag update og employee da data base
	public function employeeUpdateInfo(){
		$details = $this->controller->update(
	    	"UPDATE employee_details_tbl SET firstname = ?, lastname = ?, designation = ?, birthday = ?, age = ?, gender = ?, address = ? WHERE id = ?",
	    	[
		    	'firstname' => $this->firstname,
		    	'lastname' => $this->lastname,
		    	'designation' => $this->designation,
		    	'birthday' => $this->birthday,
		    	'age' => $this->age,
		    	'gender' => $this->gender,
		    	'address' => $this->address,
		    	'id' => $this->id,
		    	
		    ]
	    );
	    $rate = $this->controller->update(
	    	"UPDATE salary_rate_tbl SET salary_rate_basis = ?, salary_rate_peso = ? WHERE employee_id = ?",
	    	[
		    	'salary_rate_basis' => $this->salary_rate_basis,
		    	'salary_rate_peso' => $this->salary_rate_peso,
		    	'employee_id' => $this->id,
		    ]
	    );
	    $contri = $this->controller->update(
	    	"UPDATE employee_contributions_tbl SET sss = ?, pagibig = ?, philhealth = ? WHERE employee_id = ?",
	    	[
		    	'sss' => $this->sss,
		    	'pagibig' => $this->pagibig,
		    	'philhealth' => $this->philhealth,
		    	'employee_id' => $this->id,
		    ]
	    );

	    return $details && $rate && $contri;
	}
	// e update ang time_attendance
	public function updateAttendance($sql, $array){
		return $this->controller->update($sql, $array);
	}
	// e update ang employee summary
	public function updateEmployeeSummary($sql, $array){
		return $this->controller->update($sql, $array);
	}
	// mag update og payroll_up para ma true
	public function setToTrue($employee_id, $payroll_period_id){
		return $this->controller->update(
			"UPDATE payroll_processing_tbl SET payroll_setup = ? WHERE employee_id = ? AND payroll_period_id = ?",
			[
				'payroll_setup' => true,
				'employee_id' => $employee_id,
				'payroll_period_id' => $payroll_period_id
			]
		);
	}
	// update ang payroll period total_pay
	public function updatePeriodTotal($sql, $array){
		$this->controller->update($sql, $array);
	}
	// cancel leave
	public function cancelLeave(){
		return $this->controller->update(
			"UPDATE leave_tbl SET status = ? WHERE employee_id = ?",
			[
				'status' => false,
				'employee_id' => $this->employee_id,
			]
		);
	}
}