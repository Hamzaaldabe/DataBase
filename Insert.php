<?php include "sections/header.php" ?>
<?php include "navbar.php";
session_start();

if (!isset($_SESSION['Username'])) {
    header('Location:index.php');
}

?>
    <div class="container main-container">

        <div class="row justify-content-center">
            <div class="card" style="width: 40rem; margin-bottom: 70px">
                <div class="card-body">
                    <div class="name">
                        <p class="h1" style="text-align: center">Dynometer Al-Dabe</p>
                        <p class="h3" style="text-align: center">09-2692444</p>
                    </div>
                    <div class="col-xl-12 col-md-12 col-lg-12">
                        <form class="bg-white rounded shadow-5-strong p-5" method="post" action="InsertCar.php">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example1">PlateNO.</label>
                                <input type="text" id="form1Example1" class="form-control" autocomplete="off" name="platNo" required/>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example2">date</label>
                                <input type="date" id="form1Example12" class="form-control" name="date" required />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example4">Service Type</label>
                                <select class="form-select" aria-label="Service Type" id="form1Example4" name="serviceType" required>
                                    <option selected>Select Service</option>
                                    <option value="1">Diagnosis</option>
                                    <option value="2">Parts Registration</option>
                                </select>

                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example5">Engine Type</label>
                                <select class="form-select" aria-label="Service Type" id="form1Example5" name="engineType" required>
                                    <option selected>Select Engine Type</option>
                                    <option value="1">Petrol</option>
                                    <option value="2">Diesel</option>
                                </select></div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example6">Test Pass</label>
                                <select class="form-select" aria-label="Service Type" id="form1Example6" name="testPass" required>
                                    <option selected>Test Result</option>
                                    <option value="1">Passed</option>
                                    <option value="2">Not Yet</option>
                                    <option value="3">Failed</option>
                                </select></div>
                            <!-- 2 column grid layout for inline styling -->
                            <!-- Submit button -->
                            <div class="d-grid gap-1 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Insert</button>
                            </div>
                            <br>
                            <div class="d-grid gap-1 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php include "sections/footer.php" ?>
