<?php
namespace Payroll\Classes\Sql;

use Payroll\Classes\Database\Controller;
/**
 * 
 */
class DeleteUser
{	
	private $controller;
	private $id;
	function __construct($obj){
		$this->controller = new Controller();
		$this->id = htmlspecialchars(isset($obj->id) ? $obj->id : null);
		
	}
	public function deleteEmployee(){
		$employee = $this->controller->delete(
			"DELETE FROM employee_details_tbl WHERE id = ?",
			[
				'id' => $this->id
			]
		);
		$salary = $this->controller->delete(
			"DELETE FROM salary_rate_tbl WHERE employee_id = ?",
			[
				'id' => $this->id
			]
		);
		$contributions = $this->controller->delete(
			"DELETE FROM employee_contributions_tbl WHERE employee_id = ?",
			[
				'employee_id' => $this->id
			]
		);
		$payrollProcessing = $this->controller->delete(
			"DELETE FROM payroll_processing_tbl WHERE employee_id = ?",
			[
				'employee_id' => $this->id
			]
		);
		$employeePayrollSummary = $this->controller->delete(
			"DELETE FROM employee_payroll_summary_tbl WHERE employee_id = ?",
			[
				'employee_id' => $this->id
			]
		);
		$timeAttendance = $this->controller->delete(
			"DELETE FROM time_attendance_tbl WHERE employee_id = ?",
			[
				'employee_id' => $this->id
			]
		);
		$leave = $this->controller->delete(
			"DELETE FROM leave_tbl WHERE employee_id = ?",
			[
				'employee_id' => $this->id
			]
		);
		$leave_history = $this->controller->delete(
			"DELETE FROM leave_history_tbl WHERE employee_id = ?",
			[
				'employee_id' => $this->id
			]
		);

		if ($employee && $salary && $contributions && $payrollProcessing && $employeePayrollSummary && $timeAttendance && $leave && $leave_history) {
			return true;
		}
	}
}