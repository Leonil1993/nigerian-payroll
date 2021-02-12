<main data-main="add-employee" class="d-none col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 id="employees">Add New Employee</h1>
    <span class="icon-large" data-feather="user-plus">
  </div>
    <form class="needs-validation" novalidate>
      <h4 class="mb-3">Employee Details</h4>
      
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="a-firstname" placeholder="First name" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="a-lastname" placeholder="Last name" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Designation</label>
          <input type="text" class="form-control" id="a-designation" placeholder="designation" required>
          <div class="invalid-feedback">
            Valid position is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Age</label>
          <input type="text" class="form-control" id="a-age" placeholder="Age" required>
          <div class="invalid-feedback">
            Valid age is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Birthday</label>
          <input type="date" class="form-control" id="a-birthday" placeholder="Month/Day/Year" required>
          <div class="invalid-feedback">
            Valid birthday is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="position" class="form-label">Contact #</label>
          <input type="text" class="form-control" id="a-contact" placeholder="Contact #" required>
          <div class="invalid-feedback">
            Valid contact is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="country" class="form-label">Gender</label>
          <select class="form-select" id="a-gender" required>
            <option value="">Choose...</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid gender.
          </div>
        </div>

        <div class="col-12">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="a-address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your address.
          </div>
        </div>


        <hr class="my-4">
        <h4 class="mb-3">Employee Salary Rate</h4>

        <div class="col-sm-6">
          <label for="country" class="form-label">Salary Rate Basis</label>
          <input type="text" class="form-control" id="a-salary-rate-basis" value="daily" placeholder="Daily" disabled="">
          <div class="invalid-feedback">
            Please select a valid rate basis.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="username" class="form-label">Salary Rate in Peso</label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="a-salary-rate-peso" placeholder="Salary rate daily" required>
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
            <input type="number" class="form-control" id="a-sss" placeholder="Contribution amount">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="state" class="form-label">Pagibig <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="a-pagibig" placeholder="Contribution amount">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="state" class="form-label">PhilHealth <span class="text-muted">(Optional)</span></label>
          <div class="input-group">
            <span class="input-group-text">&#8369</span>
            <input type="number" class="form-control" id="a-philhealth" placeholder="Contribution amount">
          </div>
        </div>
        
      </div>

      <hr class="my-4">
      <div class="col-md-12 col-lg-8 offset-lg-2 mb-5 mt-5">
        <button class="w-100 btn btn-outline-primary btn-md" type="submit" id="a-add-employee"><span data-feather="user-plus"></span> Add Employee</button>
      </div>
    </form>
</main>