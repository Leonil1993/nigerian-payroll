<main data-main="view-employee" class="d-none col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h2><span class="icon-large" data-feather="user"></span><span class="text-primary text-capitalize" id="fullname"></span></h2>
  </div>
    <form class="needs-validation" novalidate>
      <hr class="my-4">
      <h4 class="mb-3">Employee Details</h4>
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="v-firstname" disabled>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="v-lastname" disabled>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Designation</label>
          <input type="text" class="form-control" id="v-designation" disabled>
          <div class="invalid-feedback">
            Valid position is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Age</label>
          <input type="text" class="form-control" id="v-age" disabled>
          <div class="invalid-feedback">
            Valid age is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Birthday</label>
          <input type="text" class="form-control" id="v-birthday" disabled>
          <div class="invalid-feedback">
            Valid birthday is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Contact #</label>
          <input type="text" class="form-control" id="v-contact" placeholder="Contact #" disabled>
          <div class="invalid-feedback">
            Valid contact is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="country" class="form-label">Gender</label>
          <input type="text" class="form-control" id="v-gender" disabled>
          <div class="invalid-feedback">
            Please select a valid gender.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="country" class="form-label">Account Created</label>
          <input type="text" class="form-control" id="v-account-created" disabled>
          <div class="invalid-feedback">
            Please select a valid account.
          </div>
        </div>

        <div class="col-12">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="v-address" disabled>
          <div class="invalid-feedback">
            Please enter your address.
          </div>
        </div>


        <hr class="my-4">
        <h4 class="mb-3">Employee Salary Rate</h4>

        <div class="col-sm-6">
          <label for="country" class="form-label">Salary Rate Basis</label>
          <input type="text" class="form-control" id="v-salary-rate-basis" disabled="">
          <div class="invalid-feedback">
            Please select a valid rate basis.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="username" class="form-label">Salary Rate in Peso</label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="v-salary-rate-peso" disabled>
            <div class="invalid-feedback">
              Valid rate is required.
            </div>
          </div>
        </div>

        <hr class="my-4">
        <h4 class="mb-3">Employee Contributions</h4>

        <div class="col-sm-4">
          <label for="state" class="form-label">SSS <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="v-sss" disabled>
          </div>
        </div>

        <div class="col-sm-4">
          <label for="state" class="form-label">Pagibig <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="v-pagibig" disabled>
          </div>
        </div>

        <div class="col-sm-4">
          <label for="state" class="form-label">PhilHealth <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="v-philhealth" disabled>
          </div>
        </div>
        
      </div>
      <div class="order-md-last mt-5 mb-5">
        <h4 class="text-center mb-3">
          <span class="">Paid History</span>
        </h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Year</th>
                  <th>Month</th>
                  <th>Basic Pay</th>
                  <th>Total OT</th>
                  <th>Total Late/UDT</th>
                  <th>Total Deductions</th>
                  <th>Total Earnings</th>
                  <th>Net Pay</th>
                </tr>
              </thead>
              <tbody id="tbody">

              </tbody>
            </table>
          </div>
      </div>
      <div class="order-md-last mt-5 mb-5">
        <h4 class="text-center mb-3">
          <span class="">Leave History</span>
        </h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Start</th>
                  <th>End</th>
                </tr>
              </thead>
              <tbody id="tbody_leave">

              </tbody>
            </table>
          </div>
      </div>
    </form>
  </div>
</main>