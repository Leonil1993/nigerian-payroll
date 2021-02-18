<main data-main="leave-employee" class="d-none col-md-9 ms-sm-auto col-lg-9 px-md-4 ">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 id="employees">Leave</h>
    <h3><span class="icon-large" data-feather="user"></span><span class="text-primary text-capitalize" id="fullname"></span></h3>
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h2 id="employees">Leave status</h2>
    <h3><span class="text-danger" id="ls-status"></span></h3>
  </div>
    <form>
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="start" class="form-label">Start</label>
            <input type="text" class="form-control" id="ls-start" disabled="">
        </div>

        <div class="col-sm-6 ">
          <label for="end" class="form-label">End</label>
          <input type="text" class="form-control" id="ls-end" disabled="">
          </div>
        </div>
      
      <div class="col-md-12 col-lg-8 offset-lg-2 mb-5 mt-5">
        <button class="w-100 btn btn-outline-primary btn-md" type="submit" id="l-cancel-leave"><span data-feather="x"></span> Cancel Leave</button>
      </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-top">
      <h3 id="employees">Set Leave</h3>
    </div>
    <form>
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="start" class="form-label">Start</label>
            <input type="date" class="form-control" id="l-start">
        </div>

        <div class="col-sm-6 ">
          <label for="end" class="form-label">End</label>
          <input type="date" class="form-control" id="l-end">
          </div>
        </div>
      <div class="col-md-12 col-lg-8 offset-lg-2 mb-5 mt-5">
        <input type="text" disabled="" hidden="" name="" id="l-id">
        <button class="w-100 btn btn-outline-primary btn-md" type="submit" id="l-set-leave"><span data-feather="settings"></span> Set</button>
      </div>
    </form>
</main>