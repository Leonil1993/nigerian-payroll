class Insert {
    "use strict";
    constructor() {
        this.path = "/payroll/server/api/request.php";
    }
    start() {
        this.add_employee();
        this.update_employee();
        this.save_payroll();
        this.chart();
        this.clickPayrollProcessing();
        this.checkIfHaveEmployee();
        this.checkIfHavePayroll();
        this.selectYear();
    }
    selectYear() {
        Event.$(S.$("#year"), "change", () => {
            const obj = JSON.stringify({
                year: S.$("#year").value,
            });
            Ajax.$({
                    path: this.path,
                    name: 'name string or null',
                    methods: 'post',
                    url: `set-selected&data=${obj}`
                },
                (res, err) => {
                    if (err === null) {
                        if (res) {
                            document.location.href = "../../index.php";
                        }
                    } else {
                        console.log(err);
                    }
                }
            );
        })
    }
    chart() {
        Ajax.$({
                path: `../../server/api/request.php`,
                name: 'name string or null',
                methods: 'post',
                url: `chart`
            },
            (res, err) => {
                if (err === null) {
                    if (res) {
                        const ctx = S.$("#myChart");
                        // eslint-disable-next-line no-unused-vars
                        const myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: res.label,
                                datasets: [{
                                    data: res.data,
                                    lineTension: 0,
                                    backgroundColor: 'transparent',
                                    borderColor: '#007bff',
                                    borderWidth: 4,
                                    pointBackgroundColor: '#007bff'
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                legend: {
                                    display: false
                                }
                            }
                        })
                    }
                }
            }
        );
    }
    validate_username() {
        Event.$(S.$("#u-username"), "keyup", () => {
            if (S.$("#u-username").value !== "") {
                const obj = JSON.stringify({
                    username: S.$("#u-username").value,
                });
                Ajax.$({
                        path: this.path,
                        name: 'name string or null',
                        methods: 'post',
                        url: `username&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res) {
                                S.$("#u-username").setCustomValidity("Username Dont't Match");
                            } else {
                                S.$("#u-username").setCustomValidity("");
                            }
                        } else {
                            console.log(err);
                        }
                    }
                );
            }
        })
    }
    sign_up() {
        Event.$(S.$("#u-sign-up"), "click", () => {
            if (Validate.sign_up()) {
                const obj = JSON.stringify({
                    username: S.$("#u-username").value,
                    password: S.$("#u-password").value
                });
                Ajax.$({
                        path: this.path,
                        name: 'name string or null',
                        methods: 'post',
                        url: `sign-up&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res !== "usernameExisted" && res !== false) {
                                alert("Successfully Sign up")
                                document.location.href = "sign-in.php";
                            }
                        } else {
                            console.log(err);
                        }
                    }
                );
            }
        })
    }
    sign_in() {
        Event.$(S.$("#i-sign-in"), "click", () => {
            if (Validate.sign_in()) {
                const obj = JSON.stringify({
                    username: S.$("#i-username").value,
                    password: S.$("#i-password").value
                });
                Ajax.$({
                        path: this.path,
                        name: 'name string or null',
                        methods: 'post',
                        url: `sign-in&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res) {
                                S.$("#i-username").setCustomValidity("");
                                S.$("#i-password").setCustomValidity("");
                                document.location.href = "../../index.php";
                            } else {
                                S.$("#i-password").setCustomValidity("Password Don't Match");
                                S.$("#i-username").setCustomValidity("Username Dont't Match");
                            }
                        } else {
                            console.log(err);
                        }
                    }
                );
            }

        });
    }
    checkIfHaveEmployee() {
        Event.$(S.$("#create-payroll"), "click", () => {
            Ajax.$({
                    path: this.path,
                    name: 'name string or null',
                    methods: 'post',
                    url: `check-if-have-employee`
                },
                (res, err) => {
                    if (err === null) {
                        if (res === null) {
                            alert("You don't have employee yet. Please add employee first.");
                            document.location.href = "../../index.php";
                        } else {
                            this.create_payroll();
                        }
                    } else {
                        console.log(err);
                    }
                }
            );
        });
    }
    create_payroll() {
        Event.$(S.$("#c-create-payroll"), "click", () => {
            if (Validate.create_payroll()) {
                S.$("#c-create-payroll").disabled = true;
                const obj = JSON.stringify({
                    month: S.$("#c-month").value,
                    from: S.$("#c-from").value,
                    to: S.$("#c-to").value,
                    year: S.$("#c-year").value
                });
                Ajax.$({
                        path: this.path,
                        name: 'name string or null',
                        methods: 'post',
                        url: `create-payroll&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res) {
                                alert("New payroll successfully created");
                                document.location.href = "../static/index.php";
                            } else {
                                alert("Failed to create");
                                document.location.href = "../static/index.php";
                                //console.log(err);
                            }
                        } else {
                            alert("Failed to create");
                            document.location.href = "../static/index.php";
                            //console.log(err);
                        }
                    }
                );
            }
        });
    }
    checkIfHavePayroll() {
        Event.$(S.$("#payroll-processing"), "click", () => {
            Ajax.$({
                    path: this.path,
                    name: 'name string or null',
                    methods: 'post',
                    url: `check-if-have-payroll`
                },
                (res, err) => {
                    if (err === null) {
                        if (res === null) {
                            alert("You don't have payroll yet. Please create payroll first.");
                            document.location.href = "../../index.php";
                        }
                    } else {
                        console.log(err);
                    }
                }
            );
        });
    }
    add_employee() {
        Event.$(S.$("#a-add-employee"), "click", () => {
            if (Validate.add_employee()) {
                const obj = JSON.stringify({
                    firstname: S.$("#a-firstname").value,
                    lastname: S.$("#a-lastname").value,
                    designation: S.$("#a-designation").value,
                    birthday: S.$("#a-birthday").value,
                    age: S.$("#a-age").value,
                    gender: S.$("#a-gender").value,
                    address: S.$("#a-address").value,
                    contact: S.$("#a-contact").value,
                    salary_rate_basis: S.$("#a-salary-rate-basis").value,
                    salary_rate_peso: S.$("#a-salary-rate-peso").value,
                    sss: S.$("#a-sss").value,
                    pagibig: S.$("#a-pagibig").value,
                    philhealth: S.$("#a-philhealth").value
                });
                Ajax.$({
                        path: this.path,
                        name: 'name string or null',
                        methods: 'post',
                        url: `add-employee&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res) {
                                alert("New employee successfully added");
                                document.location.href = "../static/index.php"
                            }
                        } else {
                            console.log(err);
                        }
                    }
                );
            }

        });
    }
    static employee_details(e, id, payroll_period_id) {
        const obj = JSON.stringify({
            id,
            payroll_period_id
        });
        Ajax.$({
                path: `../../server/api/request.php`,
                name: 'name string or null',
                methods: 'post',
                url: `employee-details&data=${obj}`
            },
            (res, err) => {
                if (err === null) {
                    if (res) {
                        const details = res.details;
                        const rate = res.rate;
                        const contri = res.contributions;
                        const summ = res.summ;
                        const att = res.attendance;
                        const history = res.history;
                        const leave = res.leave;
                        const leave_history = res.leave_history;
                        console.log(leave_history);
                        For.$(SA.$("#fullname"), "innerText", `${details.firstname} ${details.lastname}`);
                        if (e === "edit-employee") {
                            S.$("#e-id").value = details.id;
                            S.$("#l-id").value = details.id;
                            //S.$("#fullname").innerHTML = `${details.firstname} ${details.lastname}`;
                            S.$("#e-firstname").value = details.firstname;
                            S.$("#e-lastname").value = details.lastname;
                            S.$("#e-designation").value = details.designation;
                            S.$("#e-birthday").value = details.birthday;
                            S.$("#e-age").value = details.age;
                            S.$("#e-gender").value = details.gender;
                            S.$("#e-contact").value = details.contact;
                            S.$("#e-address").value = details.address;
                            S.$("#e-salary-rate-basis").value = rate.salary_rate_basis;
                            S.$("#e-salary-rate-peso").value = rate.salary_rate_peso;
                            S.$("#e-sss").value = contri.sss;
                            S.$("#e-philhealth").value = contri.philhealth;
                            S.$("#e-pagibig").value = contri.pagibig;
                        } else if (e === "view-employee") {
                            S.$("#v-firstname").value = details.firstname;
                            S.$("#v-lastname").value = details.lastname;
                            S.$("#v-designation").value = details.designation;
                            S.$("#v-birthday").value = details.birthday;
                            S.$("#v-age").value = details.age;
                            S.$("#v-gender").value = details.gender;
                            S.$("#v-contact").value = details.contact;
                            S.$("#v-address").value = details.address;
                            S.$("#l-start").value = details.start;
                            S.$("#l-end").value = details.end;
                            S.$("#v-salary-rate-basis").value = rate.salary_rate_basis;
                            S.$("#v-salary-rate-peso").value = rate.salary_rate_peso;
                            S.$("#v-sss").value = contri.sss;
                            S.$("#v-philhealth").value = contri.philhealth;
                            S.$("#v-pagibig").value = contri.pagibig;
                            S.$("#v-account-created").value = details.account_created;
                            Insert.employeeHistory(history);
                            Insert.employeeLeave(leave_history);
                        } else if (e === "leave-employee") {
                            if (leave.status == 1) {
                                S.$("#ls-start").value = leave.start_leave;
                                S.$("#ls-end").value = leave.end_leave;
                                S.$("#ls-status").innerText = "on-leave";
                            } else {
                                S.$("#ls-status").innerText = "-";
                                S.$("#ls-start").value = "";
                                S.$("#ls-end").value = "";
                            }

                        } else {
                            S.$("#ppu-employee-id").value = details.id;
                            S.$("#ppu-fullname").value = `${details.firstname} ${details.lastname}`;
                            S.$("#ppu-designation").value = details.designation;
                            S.$("#ppu-salary-rate-basis").value = rate.salary_rate_basis;
                            S.$("#ppu-salary-rate-peso").value = rate.salary_rate_peso;
                            S.$("#ppu-sss").value = contri.sss + " - 85% / 2";
                            S.$("#ppu-philhealth").value = contri.philhealth + " - 50% / 2";
                            S.$("#ppu-pagibig").value = contri.pagibig + " - 50% / 2";
                            if (summ != null) {

                                S.$("#ppu-basic-pay").innerText = summ.basic_pay;
                                S.$("#ppu-sum-overtime").innerText = summ.total_overtime;
                                S.$("#ppu-sum-late").innerText = summ.total_late;
                                S.$("#ppu-total-earnings").innerText = summ.total_earnings;
                                S.$("#ppu-total-deductions").innerText = summ.total_deductions;
                                S.$("#ppu-netpay").innerText = summ.net_pay;
                            } else {
                                S.$("#ppu-basic-pay").innerText = 0;
                                S.$("#ppu-sum-overtime").innerText = 0;
                                S.$("#ppu-sum-late").innerText = 0;
                                S.$("#ppu-total-earnings").innerText = 0;
                                S.$("#ppu-total-deductions").innerText = 0;
                                S.$("#ppu-netpay").innerText = 0;
                            }

                        }
                    }
                } else {
                    console.log(err);
                }
            }
        );
    }
    static employeeHistory(history) {
        const all_summ = history.all_summ;
        const payroll_period = history.payroll_period;
        let html = "";
        for (let x = 0; x < all_summ.length; x++) {
            html += `<tr>`;
            html += `<td>${payroll_period[x][0].year}</td>`;
            html += `<td>${payroll_period[x][0].month} ${payroll_period[x][0].from_day}-${payroll_period[x][0].to_day}</td>`;
            html += `<td>&#8369 ${all_summ[x].basic_pay}</td>`;
            html += `<td>&#8369 ${all_summ[x].total_overtime}</td>`;
            html += `<td>-&#8369 ${all_summ[x].total_late}</td>`;
            html += `<td>&#8369 ${all_summ[x].total_deductions}</td>`;
            html += `<td>&#8369 ${all_summ[x].total_earnings}</td>`;
            html += `<td>&#8369 ${all_summ[x].net_pay}</td>`;
            html += `</tr>`;
        }
        S.$("#tbody").innerHTML = html;
    }
    static employeeLeave(leave_history) {
        let html = "";
        for (let x = 0; x < leave_history.length; x++) {
            html += `<tr>`;
            html += `<td>${leave_history[x].start_leave}</td>`;
            html += `<td>${leave_history[x].end_leave}</td>`;
            //html += `<td>${leave_history[x].leave_total}</td>`;
            html += `</tr>`;
        }
        S.$("#tbody_leave").innerHTML = html;
    }
    update_employee() {
        Event.$(S.$("#e-update-employee"), "click", () => {
            if (Validate.update_employee()) {
                const obj = JSON.stringify({
                    id: S.$("#e-id").value,
                    firstname: S.$("#e-firstname").value,
                    lastname: S.$("#e-lastname").value,
                    designation: S.$("#e-designation").value,
                    birthday: S.$("#e-birthday").value,
                    age: S.$("#e-age").value,
                    gender: S.$("#e-gender").value,
                    address: S.$("#e-address").value,
                    contact: S.$("#e-contact").value,
                    salary_rate_basis: S.$("#e-salary-rate-basis").value,
                    salary_rate_peso: S.$("#e-salary-rate-peso").value,
                    sss: S.$("#e-sss").value,
                    pagibig: S.$("#e-pagibig").value,
                    philhealth: S.$("#e-philhealth").value,
                });
                Ajax.$({
                        path: this.path,
                        name: 'name string or null',
                        methods: 'post',
                        url: `update-employee&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res) {
                                alert("Employee successfully updated");
                                document.location.href = "../static/index.php"
                            }
                        } else {
                            console.log(err);
                        }
                    }
                );
            }

        });
    }
    static delete(id) {
        const obj = JSON.stringify({
            id
        });
        Ajax.$({
                path: `../../server/api/request.php`,
                name: 'name string or null',
                methods: 'post',
                url: `delete-employee&data=${obj}`
            },
            (res, err) => {
                if (err === null) {
                    if (res) {
                        alert("Employee successfully deleted");
                        document.location.href = "../static/index.php";
                    }
                }
            }
        );
    }
    clickPayrollProcessing() {
        Event.$(S.$("#payroll-processing"), "click", () => {
            Ajax.$({
                    path: `../../server/api/request.php`,
                    name: 'name string or null',
                    methods: 'post',
                    url: `latest-payroll`
                },
                (res, err) => {
                    if (err === null) {
                        if (res) {
                            For.$(SA.$(".latest-payroll"), "innerText", `${res.month} ${res.from_day}-${res.to_day}, ${res.year}`);
                        }
                    }
                }
            )
        })
    }
    static time_attendance(employee_id, payroll_period_id) {
        const obj = JSON.stringify({
            employee_id,
            payroll_period_id
        })
        Ajax.$({
                path: `../../server/api/request.php`,
                name: 'name string or null',
                methods: 'post',
                url: `view-time-attendance&data=${obj}`
            },
            (res, err) => {
                if (err === null) {
                    if (res) {
                        S.$("#ppu-present").value = parseFloat(res.days_present);
                        S.$("#ppu-late").value = parseFloat(res.late_undertime);
                        S.$("#ppu-overtime").value = parseFloat(res.overtime);
                    } else {
                        S.$("#ppu-present").value = 0;
                        S.$("#ppu-late").value = 0;
                        S.$("#ppu-overtime").value = 0;
                    }
                }
            }
        )
    }
    save_payroll() {
        Event.$(S.$("#ppu-save"), "click", () => {
            if (S.$("#ppu-netpay").innerText !== "0") {
                const obj = JSON.stringify({
                    days_present: S.$("#ppu-present").value,
                    overtime: S.$("#ppu-overtime").value,
                    late_undertime: S.$("#ppu-late").value,
                    employee_id: S.$("#ppu-employee-id").value,
                    basic_pay: S.$("#ppu-basic-pay").innerText,
                    total_overtime: S.$("#ppu-sum-overtime").innerText,
                    total_late: S.$("#ppu-sum-late").innerText,
                    payroll_period_id: S.$("#ppu-payroll-period-id").value,
                    total_earnings: S.$("#ppu-total-earnings").innerText,
                    total_deductions: S.$("#ppu-total-deductions").innerText,
                    net_pay: S.$("#ppu-netpay").innerText
                })
                Ajax.$({
                        path: `../../server/api/request.php`,
                        name: 'name string or null',
                        methods: 'post',
                        url: `save-payroll&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res === "failed") {
                                alert(`${res} to setup the payroll of ${S.$("#ppu-fullname").value} `);
                            }
                            alert(`Successfully ${res} the payroll of ${S.$("#ppu-fullname").value} `);
                            document.location.href = "../static/index.php";
                        }
                    }
                )
            }
        })
    }
    onChangeYear() {
        Event.$(S.$("#year"), "change", () => {
            const obj = JSON.stringify({
                year: S.$("#year").value
            })
            Ajax.$({
                    path: `../../server/api/request.php`,
                    name: 'name string or null',
                    methods: 'post',
                    url: `overall-salary&data=${obj}`
                },
                (res, err) => {
                    if (err === null) {
                        if (res) {
                            alert(1)
                        }
                    }
                }
            )
        });
    }
    static setLeave(employee_id) {
        Event.$(S.$("#l-set-leave"), "click", (e) => {
            e.preventDefault();
            if (Validate.leave()) {
                console.log(S.$("#l-start").value);
                const obj = JSON.stringify({
                    employee_id,
                    start_leave: S.$("#l-start").value,
                    end_leave: S.$("#l-end").value
                });
                Ajax.$({
                        path: `../../server/api/request.php`,
                        name: 'name string or null',
                        methods: 'post',
                        url: `set-leave&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res) {
                                alert("Successfully set");
                                document.location.href = "../static/index.php";
                            }
                        }
                    }
                )
            }
        });
        Event.$(S.$("#l-cancel-leave"), "click", (e) => {
            e.preventDefault();
            if (Validate.cancelLeave()) {
                const obj = JSON.stringify({
                    employee_id
                });
                Ajax.$({
                        path: `../../server/api/request.php`,
                        name: 'name string or null',
                        methods: 'post',
                        url: `cancel-leave&data=${obj}`
                    },
                    (res, err) => {
                        if (err === null) {
                            if (res) {
                                alert("Successfully canceled");
                                document.location.href = "../static/index.php";
                            }
                        }
                    }
                )
            }
        });
    }
}
const insert = new Insert();