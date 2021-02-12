<main data-main="overall-salary" class="d-non col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Overall Salary Paid</h1>
        <div class="col-sm-3">
          <div class="input-group">
            <select class="form-select" id="year" required>
              <?php
                foreach ($userInfo->allYear() as $key => $value) {?>
                  <option <?php if($value->selected == 1){echo "selected";$year = $value->year;}?> value="<?php echo $value->year ?>"><?php echo $value->year; ?></option>
              <?php }//end forEach?> 
            </select>
            <span class="input-group-text"><span data-feather="calendar"></span></span>
          </div>
        </div>
  </div>

  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

  <div class="col-md-12 col-lg-8 offset-lg-2 order-md-last">
    <h4 class="text-center mb-3">
      <span class=""><?php if (isset($year)){echo $year;} ?> Payroll History</span>
    </h4>
    <ul class="list-group mb-3">
      <?php
        if (true) {
        $total = 0;  
        foreach ($userInfo->overall_payroll() as $key => $value){$year=$value->year?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo "$value->month $value->from_day - $value->to_day" ?></h6>
            </div>
            <span class="">&#8369
              <span>
                <?php 
                  $total += $userInfo->overall_sum_period($value->id);
                  echo number_format($userInfo->overall_sum_period($value->id),2);
                ?>                  
              </span></span>
          </li>
       <?php } ?>
      <li class="list-group-item d-flex justify-content-between">
        <h5><strong>Total</strong></h5>
        <h5><strong>&#8369<span><?php echo number_format($total,2);//number_format($userInfo->overall_sum_period($value->id),2) ?></span></strong></h5>
      </li>
      <?php } ?>
    </ul>
  </div>
</main>