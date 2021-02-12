<body>
  <?php include'header.php' ?>
  <div class="container-fluid">
    <div class="row">
      <?php
        include'../static/nav.php';

        include'../pages/create-payroll.php';
        include'../pages/overall-salary.php';
        include'../pages/view-employee.php';
        include'../pages/leave-employee.php';
        include'../pages/employees.php';
        include'../pages/add-employee.php';
        include'../pages/edit-employee.php';
        include'../pages/payroll-processing.php';
        include'../pages/payroll-processing-user.php';
      ?>
    </div>
  </div>
</body>