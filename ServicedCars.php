<?php include "sections/header.php" ?>
<?php include "connect.php" ?>
<?php include "navbar.php";
session_start();
if (!isset($_SESSION['Username'])) {
    header('Location:index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['startDate'];
    $end_date = $_POST['EndDate'];

    $stmt = $con->prepare("select plate_number,service_date 
from service_car 
join service on service.serviceID = service_car.serviceID 
where service.service_type = 1 
and service_date 
between ? and ?

");

// Execute The Statement

    $stmt->execute(array($start_date,$end_date));

// Assign To Variable

    $rows = $stmt->fetchAll();
}

echo '
<div class="container main-container">
<div class="row">
<form class="form-inline" method="POST" action="' . $_SERVER['PHP_SELF'] . '">

<div class="form-group mb-2" >
<label class="form-label" for="form1Example1">Start Date</label>
<input type="date" id="form1Example1" class="form-control" name="startDate" required />
</div>

<div class="form-group mb-2" >
<label class="form-label" for="form2Example2">End Date</label>
<input type="date" id="form2Example2" class="form-control" name="EndDate" required />
</div>

<button type="submit" class="btn btn-primary btn-block mb-2">Search</button>

</form>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">PlateNO.</th>
      <th scope="col">Service Date</th>
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
        $row_count++;
        echo '
    <tr>
      <th scope="row">'.$row_count.'</th>
      <td>' . $row['plate_number'] . '</td>
      <td>' . $row['service_date'] . '</td>
    </tr>
        <tr>
      <th></th>
      <td></td>
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