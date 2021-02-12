class Validate{
	static sign_up(){
		if(S.$("#u-username").value && S.$("#u-password").value && S.$("#u-repeat-password").value !== ""){
			if (S.$("#u-password").value !== S.$("#u-repeat-password").value) {
				return false;
			}else{
				return true;
			}
		}
	}
	static sign_in(){
		if(S.$("#i-username").value && S.$("#i-password").value !== "" ){
			return true;
		}
	}
	static create_payroll(){
		if(S.$("#c-month").value && S.$("#c-year").value && S.$("#c-from").value && S.$("#c-to").value !== "" ){
			return true;
		}
	}
	static add_employee(){
		if(S.$("#a-firstname").value && S.$("#a-lastname").value && S.$("#a-designation").value && S.$("#a-birthday").value && S.$("#a-age").value && S.$("#a-gender").value && S.$("#a-address").value && S.$("#a-contact").value && S.$("#a-salary-rate-basis").value && S.$("#a-salary-rate-peso").value !== "" ){
			return true;
		}
	}
	static update_employee(){
		if(S.$("#e-firstname").value && S.$("#e-lastname").value && S.$("#e-designation").value && S.$("#e-birthday").value && S.$("#e-age").value && S.$("#e-gender").value && S.$("#e-address").value && S.$("#e-contact").value && S.$("#e-salary-rate-basis").value && S.$("#e-salary-rate-peso").value !== "" ){
			return true;
		}
	}
	static payroll_processing_user(){
		if(S.$("#ppu-present").value && S.$("#ppu-late").value && S.$("#ppu-overtime").value !== ""){
			return true;
		}
	}
	static leave(){
		const start = DateToInt.$(S.$("#l-start").value);
		const end = DateToInt.$(S.$("#l-end").value);
		if(S.$("#l-start").value && S.$("#l-end").value !== "" && S.$("#l-start").value !== S.$("#l-end").value){
			if (start < end) {
				return true;
			}alert("Failed! Start must be lower than end");
		}alert("Failed! Start must be lower than end");
	}
	static cancelLeave(){
		if(S.$("#ls-start").value && S.$("#ls-end").value !== ""){
			return true;
		}alert("Failed!");
	}
}
