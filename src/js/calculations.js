class Calculations{
	start(){
		this.employee_summary();
	}
	employee_summary(){
		Event.$(S.$("#ppu-calculate"),"click",()=>{
			let total_deductions;
			total_deductions = ((parseFloat(S.$("#ppu-pagibig").value)*.50) + (parseFloat(S.$("#ppu-sss").value)*.85) + (parseFloat(S.$("#ppu-philhealth").value)*.50))/2;
			S.$("#ppu-total-deductions").innerHTML = total_deductions.toFixed(2);
		
			if (S.$("#ppu-present").value >= 0.1 && S.$("#ppu-present").value > (S.$("#ppu-late").value / 24)) {
								let netpay, total_earnings, basic_pay, overtime, late;
				// basic pay
				basic_pay = parseFloat(S.$("#ppu-salary-rate-peso").value) * parseFloat(S.$("#ppu-present").value);
				S.$("#ppu-basic-pay").innerHTML = basic_pay;
				// overtime
				overtime = parseFloat(S.$("#ppu-overtime").value) * (parseFloat(S.$("#ppu-salary-rate-peso").value / 8) );
				S.$("#ppu-sum-overtime").innerHTML = overtime.toFixed(2);
				// late
				late = parseFloat(S.$("#ppu-late").value) * (parseFloat(S.$("#ppu-salary-rate-peso").value / 8) );
				S.$("#ppu-sum-late").innerHTML = late.toFixed(2);

				total_earnings = (basic_pay + overtime) - late;
				S.$("#ppu-total-earnings").innerHTML = total_earnings.toFixed(2);

				netpay = total_earnings - total_deductions;
				S.$("#ppu-netpay").innerHTML = netpay.toFixed(2)
			}
		});
	}

}
const calc = new Calculations();
calc.start();
