<main data-main="payroll-processing-user" class="d-none col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 id="employees">Payroll Setup</h1>
  </div>
    <form class="needs-validation" novalidate>
      <div class="row g-3">
        <h3 class="mb-3">Payroll Period of <span class="latest-payroll text-primary"></span></h3>

        <div class="col-sm-2">
          <label for="id" class="form-label">ID</label>
          <div class="input-group">
            <input type="text" class="form-control" id="ppu-employee-id" disabled>
          </div>
        </div>

        <div class="col-sm-6">
          <label for="name" class="form-label">Name</label>
          <div class="input-group">
            <input type="text" class="form-control" id="ppu-fullname" disabled>
          </div>
        </div>

        <div class="col-sm-4">
          <label for="designation" class="form-label">Designation</label>
          <div class="input-group">
            <input type="text" class="form-control" id="ppu-designation" disabled>
          </div>
        </div>

        <hr class="my-4">
        <h4 class="mb-3">Time and Attendance</h4>
        <div class="col-sm-4">
          <label for="present" class="form-label">Days Present</label>
          <div class="input-group">
            <span class="input-group-text"><span data-feather="calendar"></span></span>
            <input type="number" step="0.01" class="form-control clear_input" id="ppu-present" min="0" required="">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="overtime" class="form-label">Overtime (hrs)</label>
          <div class="input-group">
            <span class="input-group-text"><span data-feather="clock"></span></span>
            <input type="number" step="0.01" class="form-control clear_input" id="ppu-overtime" min="0" required="">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="late" class="form-label">Late / Under Time (hrs)</label>
          <div class="input-group">
            <span class="input-group-text"><span data-feather="clock"></span></span>
            <input type="number" step="0.01" class="form-control clear_input" id="ppu-late" min="0" required="">
          </div>
        </div>

        <hr class="my-4">
        <h4 class="mb-3">Salary Rate</h4>

        <div class="col-sm-6">
          <label for="country" class="form-label">Salary Rate Basis</label>
          <input type="text" class="form-control" id="ppu-salary-rate-basis" disabled>
        </div>

        <div class="col-sm-6">
          <label for="username" class="form-label">Salary Rate in Peso</label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="ppu-salary-rate-peso" disabled>
          </div>
        </div>

        <hr class="my-4">
        <h4 class="mb-3">Deductions</h4>

        <div class="col-sm-4">
          <label for="state" class="form-label">SSS</label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="text" class="form-control" id="ppu-sss" disabled required="">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="state" class="form-label">Pagibig</label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="text" class="form-control" id="ppu-pagibig" disabled required="">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="state" class="form-label">PhilHealth</label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="text" class="form-control" id="ppu-philhealth" disabled required="">
          </div>
        </div>

        <hr class="my-4">
        <div class="col-md-12 col-lg-8 offset-lg-2 order-md-last">
          <h4 class="mb-3 text-center">
            <span class="">Payroll Summary</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Basic pay</h6>
              </div>
              <span class="">&#8369<span id="ppu-basic-pay">0</span></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Overtime</h6>
              </div>
              <span class="">&#8369<span id="ppu-sum-overtime">0</span></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Late/UnderTime</h6>
              </div>
              <span class="">-&#8369<span id="ppu-sum-late">0</span></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Total Earnings</h6>
              </div>
              <span class="">&#8369<span id="ppu-total-earnings">0</span></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Total Deductions</h6>
              </div>
              <span class="">&#8369<span id="ppu-total-deductions">0</span></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <h5><strong>Net Pay</strong></h5>
              <h5><strong>&#8369<span id="ppu-netpay">0</span></strong></h5>
            </li>
          </ul>
        </div>

      </div>

      <hr class="my-4">
       
      <div class="col-md-12 col-lg-8 offset-lg-2 mb-5">
        <input type="text" id="ppu-payroll-period-id" disabled hidden>
        <button class="w-100 btn btn-outline-secondary btn-md" id="ppu-calculate"><span data-feather="plus"></span> Calculate</button>
        <button class="w-100 btn btn-outline-primary btn-md mt-2" id="ppu-save"><span data-feather="save"></span> Save</button>
      </div>
      
    </form>
</main>