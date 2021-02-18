<main data-main="edit-employee" class="d-none col-md-9 ms-sm-auto col-lg-9 px-md-4 ">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 id="employees">Update Employee</h1>
    <h2><span class="icon-large" data-feather="user"></span><span class="text-primary text-capitalize" id="fullname"></span></h2>
  </div>
    <form class="needs-validation" novalidate>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="mb-3">Employee Details</h4>
      </div>
      
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="e-firstname" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="e-lastname" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Designation</label>
          <input type="text" class="form-control" id="e-designation" required>
          <div class="invalid-feedback">
            Valid position is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Age</label>
          <input type="text" class="form-control" id="e-age" required>
          <div class="invalid-feedback">
            Valid age is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Birthday</label>
          <input type="text" class="form-control" id="e-birthday" required>
          <div class="invalid-feedback">
            Valid birthday is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Contact #</label>
          <input type="text" class="form-control" id="e-contact" placeholder="Contact #" required>
          <div class="invalid-feedback">
            Valid contact is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="country" class="form-label">Gender</label>
          <select class="form-select" id="e-gender" required>
            <option value="">Choose...</option>
            <option>Male</option>
            <option>Female</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid gender.
          </div>
        </div>

        <div class="col-12">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="e-address" required>
          <div class="invalid-feedback">
            Please enter your address.
          </div>
        </div>


        <hr class="my-4">
        <h4 class="mb-3">Employee Salary Rate</h4>

        <div class="col-sm-6">
          <label for="country" class="form-label">Salary Rate Basis</label>
          <input type="text" class="form-control" id="e-salary-rate-basis" disabled="">
          <div class="invalid-feedback">
            Please select a valid rate basis.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="username" class="form-label">Salary Rate in Peso</label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="e-salary-rate-peso" required>
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
            <input type="number" class="form-control" id="e-sss">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="state" class="form-label">Pagibig <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="e-pagibig">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="state" class="form-label">PhilHealth <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="e-philhealth">
          </div>
        </div>
        
      </div>

      <hr class="my-4">
      <div class="col-md-12 col-lg-8 offset-lg-2 mb-5 mt-5">
        <input type="text" disabled="" hidden="" name="" id="e-id">
        <button class="w-100 btn btn-outline-primary btn-md" type="submit" id="e-update-employee"><span data-feather="user"></span> Update</button>
      </div>
    </form>
</main>