class Nav{
	"use strict";

	constructor(){
		// navigation list class
		this.allNavClassActive = document.querySelectorAll(".button");
		// mainion list class all
		this.allMain = document.querySelectorAll("main");
		this.removeShow = document.querySelector(".click-remove-show");
		
	}
	clearInput(){
		for(let input of Array.from(SA.$(".clear_input"))){
			input.value = "";
		}

	}
	allNavClassActiveMethod(dataNav){
		for(let menu of Array.from(this.allNavClassActive)){
			if(menu.getAttribute("data-nav") == dataNav) return menu;
		}
	}
	// all this.allNavRemoveAddActive method
	allNavRemoveAddActive(dataNav){
		for(let li of Array.from(this.allNavClassActive)){
			li.getAttribute("data-nav") == dataNav ? li.classList.add("active") : li.classList.remove("active");
		}
	}
	// allMainions method mag remove or mag add og value nga d-none na class og mag set kung remove or add
	allMainMethod(dataNav){
		for (let main of Array.from(this.allMain)) {
			main.getAttribute("data-main") == dataNav ? main.classList.remove("d-none") : main.classList.add("d-none");
		}
	}
	eventListenerClick(e,f){
		e.addEventListener("click", f);
	}
	process(d){
		this.eventListenerClick(this.allNavClassActiveMethod(d), ()=>{
			this.allNavRemoveAddActive(d);
			this.allMainMethod(d);
			this.clearInput();
			this.removeShow.classList.remove("show");
		});
	}
	start(){
		this.process("add-employee");
		this.process("create-payroll");
		this.process("overall-salary");
		this.process("employees");
		this.process("payroll-processing");
	}
	leave(e, employee_id){
		this.allMainMethod(e);
		Insert.setLeave(employee_id);
		Insert.employee_details(e,employee_id,null);
	}
	edit_view(e,employee_id){
		this.allMainMethod(e);
		Insert.employee_details(e,employee_id);
	}
	setup(e,employee_id, payroll_period_id){
		this.allMainMethod(e);
		Insert.employee_details(e,employee_id,payroll_period_id);
		Insert.time_attendance(employee_id, payroll_period_id);
		S.$("#ppu-payroll-period-id").value = payroll_period_id;
	}
	delete(employee_id){
		Insert.delete(employee_id);
	}
}
const nav = new Nav();
nav.start();