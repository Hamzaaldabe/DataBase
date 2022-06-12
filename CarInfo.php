<?php include "sections/header.php" ?>
<?php include "connect.php" ?>
<?php include "navbar.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plateNo = $_POST['PlateNo'];
    $stmt = $con->prepare("select *
from car
where plate_number = ? ;");

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
      <th scope="col">Plate Number</th>
      <th scope="col">Owner </th>
      <th scope="col">Engine Type</th>
      <th scope="col">Engine Number</th>
      <th scope="col">Color</th>
      <th scope="col">Production Year</th>
      <th scope="col">VIN Number</th>
      <th scope="col">Regestered Date</th>
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
      <th scope="row">' . $row_count . '</th>
      <td>'  .$row['plate_number'].'</td>
      <td>' . $row['owner'] . '</td>
      <td>'  .$row['engine_type'].'</td>
      <td>' . $row['engine_number'] . '</td>
      <td>'  .$row['color'].'</td>
      <td>' . $row['production_year'] . '</td>
      <td>'  .$row['VIN_number'].'</td>
      <td>' . $row['registeration_date'] . '</td>
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