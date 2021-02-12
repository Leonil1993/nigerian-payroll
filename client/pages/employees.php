<main data-main="employees" class="d-none col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 id="employees">Employees</h1>
    <button data-nav="add-employee" type="button" class="button btn btn-sm btn-outline-primary" ><span data-feather="user-plus"></span> Add New Employee</button>
  </div>
  <div class="col-sm-12 mb-3">
    <!--input class="form-control w-100" type="text" placeholder="Search Employee" aria-label="Search"--->
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
          <th>Designation</th>
          <th>Leave status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <?php
        foreach ($userInfo->getAllEmployeeData() as $key => $value){?>
        <tr>
          <td><?php echo $value->id ?></td>
          <td><?php echo $value->firstname ?></td>
          <td><?php echo $value->lastname ?></td>
          <td><?php echo $value->designation ?></td>
          <td class="text-danger"><?php  if($userInfo->getLeaveStatus($value->id)->status == 1){echo "on-leave";}else{echo "-";} ?></td>
          <td class="text-center">
             <a
              onclick="nav.leave('leave-employee','<?php echo $value->id ?>')"
              title="Leave"
              href="#"
              class="button btn btn-sm btn-outline-secondary">
              <span data-feather="calendar"></span>
            </a>
            <a
              onclick="nav.edit_view('view-employee','<?php echo $value->id ?>')"
              title="View Employee"
              href="#"
              class="button btn btn-sm mr-2 btn-outline-success">
              <span data-feather="eye"></span>
            </a>
            <a 
              onclick="nav.edit_view('edit-employee','<?php echo $value->id ?>')"
              title="Update Employee"
              href="#"
              class="button btn btn-sm mr-2 btn-outline-primary">
              <span data-feather="edit"></span>
            </a>
            <a
              onclick="nav.delete('<?php echo $value->id ?>')"
              title="Delete Employee"
              href="#"
              class="button btn btn-sm btn-outline-danger">
              <span data-feather="trash-2"></span>
            </a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</main>