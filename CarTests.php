<?php include "sections/header.php" ?>
<?php include "connect.php" ?>
<?php include "navbar.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plateNo = $_POST['PlateNo'];

    $stmt = $con->prepare("select service_car.test_pass,service_car.service_date 
from service, service_car, car
where service_car.plate_number = ? 
and service_car.plate_number = car.plate_number 
and service.serviceID = service_car.serviceID;");

// Execute The Statement

    $stmt->execute(array($plateNo));

// Assign To Variable

    $rows = $stmt->fetchAll();
}

echo '
<div class="container main-container">
<div class="row">
<form class="form-inline" method="POST" action="' . $_SERVER['PHP_SELF'] . '">

<div class="form-group mb-2" >
<label class="form-label" for="form1Example2">Plate Number</label>
<input type="text" id="platNo" class="form-control" name="PlateNo" required placeholder="PlateNo"/>
</div>

<button type="submit" class="btn btn-primary btn-block mb-2">Search</button>

</form>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Test Pass</th>
      <th scope="col">Service Date </th>
     
    </tr>
  </thead>
  <tbody>
  ';
if (empty($rows)) {
    echo '
    <tr>
     
    </tr>
    ';
} else {


    $row_count = 0;
    foreach ($rows as $row) {

        if ($row['test_pass'] == 1) {
            $test_pass = "Passed";
        }
        if ($row['test_pass'] == 2) {
            $test_pass = "Not Yet";
        } else {
            $test_pass = "Failed";

        }
        $row_count++;
        echo '
    <tr>
      <th scope="row">' . $row_count . '</th>
      <td>' . $test_pass . '</td>
      <td>' . $row['service_date'] . '</td>
    </tr>
    ';
    }
}
echo '
</div>
  </tbody>
</table>
</div>';


include "sections/footer.php";