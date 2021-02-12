<main data-main="create-payroll" class="d-none col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 id="employees">Create New Payroll</h1>
  </div>
      <form class="needs-validation" novalidate method="post">
        <div class="row g-3">
          <h4 class="mb-3">New Payroll for the month of <span class="month"></span></h4>
          <div class="col-sm-3">
            <label for="present" class="form-label">Month</label>
            <div class="input-group">
              <span class="input-group-text"><span data-feather="calendar"></span></span>
              <input type="text" class="form-control" id="c-month" required>
            </div>
          </div>

          <div class="col-sm-3">
            <label for="overtime" class="form-label">From</label>
            <div class="input-group">
              <span class="input-group-text"><span data-feather="calendar"></span></span>
              <input type="number" class="form-control" min="1" max="31" id="c-from" required="">
            </div>
          </div>

          <div class="col-sm-3">
            <label for="overtime" class="form-label">To</label>
            <div class="input-group">
              <span class="input-group-text"><span data-feather="calendar"></span></span>
              <input type="number" class="form-control" min="1" max="31" id="c-to" required="">
            </div>
          </div>

          <div class="col-sm-3">
            <label for="late" class="form-label">Year</label>
            <div class="input-group">
              <span class="input-group-text"><span data-feather="calendar"></span></span>
              <input type="text" class="form-control" id="c-year" required disabled>
            </div>
          </div>
        </div>

      <div class="col-md-12 col-lg-8 offset-lg-2 mt-5">
        <button class="w-100 btn btn-outline-primary btn-md" type="submit" id="c-create-payroll"><span data-feather="plus"></span> Create</button>
      </div>
      
    </form>
</main>