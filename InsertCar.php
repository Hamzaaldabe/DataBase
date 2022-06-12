<?php
include "connect.php";

session_start();

include "functions.php";
if (!isset($_SESSION['Username'])) {
    header('Location:index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $platNo = $_POST['platNo'];
    $date = $_POST['date'];
    $engineType = $_POST['engineType'];
    $testPass = $_POST['testPass'];
    $serviceType = $_POST['serviceType'];

    // Validate The Form

    $formErrors = array();

    if (empty($platNo)) {
        $formErrors[] = 'PlateNO Cant Be <strong>Empty</strong>';
    }

    if (empty($date)) {
        $formErrors[] = 'date Cant Be <strong>Empty</strong>';
    }
    if (empty($engineType)) {
        $formErrors[] = 'Engine Type Cant Be <strong>Empty</strong>';
    }
    if (empty($serviceType)) {
        $formErrors[] = 'Service Type Cant Be <strong>Empty</strong>';
    }
    if (empty($testPass)) {
        $formErrors[] = 'Test Pass Cant Be <strong>Empty</strong>';
    }

    // Loop Into Errors Array And Echo It

    foreach ($formErrors as $error) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }

    $check = checkItem("plate_number", "car", $platNo);
    if (empty($formErrors)) {

        if ($check == 1) {
            // Insert Userinfo In Database

            $stmt = $con->prepare("INSERT INTO 
													service_car(plate_number, test_pass, service_date, serviceID)
												VALUES(:zplate_number, :ztest_pass, :zservice_date, :zserviceID) ");

            if ($engineType == 1 && $serviceType == 1) {
                $serviceId = 1;
            } else if ($engineType == 2 && $serviceType == 1) {
                $serviceId = 2;
            } else if ($engineType == 1 && $serviceType == 2) {
                $serviceId = 3;
            } else {
                $serviceId = 4;
            }

            $stmt->execute(array(

                'zplate_number' => $platNo,
                'ztest_pass' => $testPass,
                'zservice_date' => $date,
                'zserviceID' => $serviceId,
            ));

            // Echo Success Message

            $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';

            redirectHome($theMsg, 'back');
        } else {
            echo "<div class='container'>";

            $theMsg = '<div class="alert alert-danger">Sorry this car does not exist</div>';

            redirectHome($theMsg);

            echo "</div>";
        }
    }
}


?>