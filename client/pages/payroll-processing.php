<main data-main="payroll-processing" class="d-none col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 id="employees">Payroll Processing</h1>
    <h2 id="employees"><span class="icon-large" data-feather="calendar"></span> Payroll Period <span class="latest-payroll text-primary"></span></h2>
  </div>
  <div class="col-sm-12 mb-3">
    <!--input class="form-control w-100" type="text" placeholder="Search Employee" aria-label="Search"-->
    <div class="invalid-feedback">
        Employee not found.
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Id</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Payroll setup</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($userInfo->payroll_process() as $key => $value){?>
        <tr>
          <td><?php echo $value->employee_id; ?></td>
          <td><?php echo $value->firstname; ?></td>
          <td><?php echo $value->lastname; ?></td>
          <td><?php if($value->payroll_setup == false){echo '<span data-feather="x"></span>';}else{echo '<span data-feather="check"></span>';} ?></td>
          <td class="text-center">
            <a
              onclick="nav.setup('payroll-processing-user','<?php echo $value->employee_id ?>','<?php echo $value->payroll_period_id ?>')"
              title="Payroll Setup"
              href="#"
              class="button btn btn-sm mr-2 btn-outline-primary">
              <span data-feather="more-vertical"></span>
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>