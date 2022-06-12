<?php include "sections/header.php" ?>
<?php include "connect.php" ?>
<?php include "navbar.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $stmt = $con->prepare("select plate_number  from car where production_year <= ? ");

// Execute The Statement

    $stmt->execute(array($date));

// Assign To Variable

    $rows = $stmt->fetchAll();
}

echo '
<div class="container main-container">
<div class="row">
<form class="form-inline" method="POST" action="' . $_SERVER['PHP_SELF'] . '">

<div class="form-group mb-2" >
<label class="form-label" for="form1Example2">date</label>
<input type="date" id="form1Example3" class="form-control" name="date" required />
</div>

<button type="submit" class="btn btn-primary btn-block mb-2">Search</button>

</form>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">plateNO.</th>
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
      <td></td>
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