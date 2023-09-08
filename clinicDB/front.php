<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Awesomefont Icons CSS via CDN -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <title>Database for Front-Desk</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

</head>
<body>

<!-- Add Patient -->
<div class="modal fade" id="patientAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="savePatient">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">IC number</label>
                    <input type="text" name="icno" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Phone number</label>
                    <input type="text" name="phone_no" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Timestamps</label>
                    <input type="datetime-local" name="timestamp" id="datePicker" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Gender</label>
                    <input type="radio" name="gender" id="gender_male" value="Male" /> Male
                    <input type="radio" name="gender" id="gender_female" value="Female"/> Female
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Patient</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Patient Modal -->
<div class="modal fade" id="patientEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Patient</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updatePatient">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="id" id="id" >

                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">IC number</label>
                    <input type="text" name="icno" id="icno" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Phone number</label>
                    <input type="text" name="phone_no" id="phone_no" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Timestamps</label>
                    <input type="datetime-local" name="timestamp" id="timestamp" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Gender</label>
                    <input type="radio" name="gender" id="edit_gender_male" value="Male" /> Male
                    <input type="radio" name="gender" id="edit_gender_female" value="Female"/> Female
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Patient</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Patient Modal -->
<div class="modal fade" id="patientViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Patient</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Name</label>
                    <p id="view_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">IC number</label>
                    <p id="view_icno" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Phone number</label>
                    <p id="view_phone_no" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Timestamps</label>
                    <p id="view_timestamp" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Address</label>
                    <p id="view_address" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Gender</label>
                    <p id="view_gender"></p>
                    <p id="view_gender"></p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Patient Record (Front Desk)
                        <button type="button" class="btn btn-primary float-end " data-bs-toggle="modal" data-bs-target="#patientAddModal">
                            <i class="fa fa-plus-circle"></i> Add Patient
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Search filter -->
                    <div class="col-md-7">
                        <form action="" method="GET" id="searchForm">
                            <div class="input-group mb-3">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search data">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>IC number</th>
                            <th>Phone number</th>
                            <th>Timestamps</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Include your database connection code (dbcon.php or equivalent)
                                require 'dbcon.php';

                                // Initialize variables
                                $records_per_page = 5;
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $starting_record = ($current_page - 1) * $records_per_page;

                                if (isset($_GET['search'])) {
                                    $search = $_GET['search'];
                                    $query = "SELECT * FROM patient WHERE name LIKE '%$search%' OR icno LIKE '%$search%' OR phone_no LIKE '%$search%' OR timestamp LIKE '%$search%' OR address LIKE '%$search%' OR gender LIKE '%$search%' LIMIT $starting_record, $records_per_page";
                                } else {
                                    $query = "SELECT * FROM patient LIMIT $starting_record, $records_per_page";
                                }

                                $query_run = mysqli_query($con, $query);

                                if (!$query_run) {
                                    die("Query failed: " . mysqli_error($con));
                                }

                                if (isset($_GET['search'])) {
                                    $search = $_GET['search'];
                                    $count_query = "SELECT COUNT(*) as total FROM patient WHERE name LIKE '%$search%' OR icno LIKE '%$search%' OR phone_no LIKE '%$search%' OR timestamp LIKE '%$search%' OR address LIKE '%$search%' OR gender LIKE '%$search%'";
                                } else {
                                    $count_query = "SELECT COUNT(*) as total FROM patient";
                                }

                                $count_query_run = mysqli_query($con, $count_query);

                                if (!$count_query_run) {
                                    die("Query failed: " . mysqli_error($con));
                                }

                                $count_data = mysqli_fetch_assoc($count_query_run);
                                $total_records = $count_data['total'];
                                $total_pages = ceil($total_records / $records_per_page);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $formattedtimestamp = date("d-m-Y H:i", strtotime($patient['timestamp']));
                                        ?>
                                        <tr>
                                            <td><?= $patient['id'] ?></td>
                                            <td><?= $patient['name'] ?></td>
                                            <td><?= $patient['icno'] ?></td>
                                            <td><?= $patient['phone_no'] ?></td>
                                            <td><?= $formattedtimestamp ?></td>
                                            <td><?= $patient['address'] ?></td>
                                            <td><?= $patient['gender'] ?></td>
                                            <td>
                                                <button type="button" value="<?= $patient['id'] ?>" class="viewPatientBtn btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                                <button type="button" value="<?= $patient['id'] ?>" class="editPatientBtn btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                                <button type="button" value="<?= $patient['id'] ?>" class="deletePatientBtn btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No Record Found</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-end">
                                <?php if ($current_page > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link"
                                        href="?page=<?= ($current_page - 1) ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                            Previous
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php
                                $max_buttons = 5; // Number of buttons to display at a time
                                $start_page = max(1, $current_page - 1); // Calculate the start page
                                $end_page = min($start_page + $max_buttons - 1, $total_pages); // Calculate the end page

                                for ($page = $start_page; $page <= $end_page; $page++) :
                                ?>
                                    <li class="page-item <?php if ($page == $current_page) echo 'active'; ?>">
                                        <a class="page-link"
                                        href="?page=<?= $page ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                            <?= $page ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($current_page < $total_pages) : ?>
                                    <li class="page-item">
                                        <a class="page-link"
                                        href="?page=<?= ($current_page + 1) ?>&search=<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                            Next
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Logout button-->
    <div class="d-flex justify-content-end mt-4">
        <button type="button" class="btn btn-secondary" onclick="location.href='logout.php';"><i class="fas fa-door-open"></i> Log out</button>
    </div>

</div>


<script>
    // Get the date input element
    const datePicker = document.getElementById('datePicker');

    // Get the current date
    const currentDate = new Date();

    // Set the minimum date to today
    datePicker.min = currentDate.toISOString().split('T')[0];

    // Add an event listener to block past dates
    datePicker.addEventListener('input', function () {
        const selectedDate = new Date(this.value);
        
        if (selectedDate < currentDate) {
            // Reset the input value to the current date if a past date is selected
            this.value = currentDate.toISOString().split('T')[0];
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
        $(document).on('submit', '#savePatient', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_patient", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#patientAddModal').modal('hide');
                        $('#savePatient')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editPatientBtn', function () {

            var id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?id=" + id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#id').val(res.data.id);
                        $('#name').val(res.data.name);
                        $('#icno').val(res.data.icno);
                        $('#phone_no').val(res.data.phone_no);
                        $('#timestamp').val(res.data.timestamp);
                        $('#address').val(res.data.address);
                        
                        // Check gender radio buttons based on the retrieved data
                        if (res.data.gender === 'Male') {
                            $('#edit_gender_male').prop('checked', true);
                            $('#edit_gender_female').prop('checked', false);
                        } else if (res.data.gender === 'Female') {
                            $('#edit_gender_male').prop('checked', false);
                            $('#edit_gender_female').prop('checked', true);
                        }


                        $('#patientEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updatePatient', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_patient", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#patientEditModal').modal('hide');
                        $('#updatePatient')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewPatientBtn', function () {

            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?id=" + id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_name').text(res.data.name);
                        $('#view_icno').text(res.data.icno);
                        $('#view_phone_no').text(res.data.phone_no);
                        $('#view_timestamp').text(res.data.timestamp);
                        $('#view_address').text(res.data.address);
                        $('#view_gender').text(res.data.gender);

                        $('#patientViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deletePatientBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_patient': true,
                        'id': id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });

    </script>

</body>
</html>
