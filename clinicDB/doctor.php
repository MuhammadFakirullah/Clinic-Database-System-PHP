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
    
    <title>Database for Doctor</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

</head>
<body>

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
                    <input type="text" name="name" id="name" class="form-control" readonly/>
                </div>
                <div class="mb-3">
                    <label for="">IC number</label>
                    <input type="text" name="icno" id="icno" class="form-control" readonly/>
                </div>
                <div class="mb-3">
                    <label for="">Diagnose result</label>
                    <textarea name="diagnose_status" id="diagnose_status" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Appointment status</label>
                    <input type="radio" name="appointment_status" id="edit_appointment_yes" value="Yes" /> Yes
                    <input type="radio" name="appointment_status" id="edit_appointment_no" value="No"/> No
                </div>
                <div class="mb-3">
                    <label for="">Appointment datetime</label>
                    <input type="datetime-local" name="appointmentDateTime" id="edit_appointmentDateTime" value="" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Medicine prescription</label>
                    <textarea name="medicinePrescription" id="edit_medicinePrescription" class="form-control"></textarea>
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
                    <label for="view_name">Name</label>
                    <p id="view_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="view_icno">IC number</label>
                    <p id="view_icno" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="view_diagnose_status">Diagnose result</label>
                    <p id="view_diagnose_status" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="view_appointment_status">Appointment status</label>
                    <p id="view_appointment_status" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="view_appointmentDateTime">Appointment date</label>
                    <p id="view_appointmentDateTime" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="view_medicinePrescription">Medicine prescription</label>
                    <p id="view_medicinePrescription" class="form-control"></p>
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
                    <h4>Patient Record (Doctor)
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
                            <th>Diagnose result</th>
                            <th>Appointment status</th>
                            <th>Appointment date</th>
                            <th>Medicine prescription</th>
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
                                    $query = "SELECT * FROM patient WHERE name LIKE '%$search%' OR icno LIKE '%$search%' OR diagnose_status LIKE '%$search%' OR appointment_status LIKE '%$search%' OR appointmentDateTime LIKE '%$search%' OR medicinePrescription LIKE '%$search%' LIMIT $starting_record, $records_per_page";
                                } else {
                                    $query = "SELECT * FROM patient LIMIT $starting_record, $records_per_page";
                                }

                                $query_run = mysqli_query($con, $query);

                                if (!$query_run) {
                                    die("Query failed: " . mysqli_error($con));
                                }

                                if (isset($_GET['search'])) {
                                    $search = $_GET['search'];
                                    $count_query = "SELECT COUNT(*) as total FROM patient WHERE name LIKE '%$search%' OR icno LIKE '%$search%' OR diagnose_status LIKE '%$search%' OR appointment_status LIKE '%$search%' OR appointmentDateTime LIKE '%$search%' OR medicinePrescription LIKE '%$search%'";
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
                                        $appointmentDateTime = date("d-m-Y H:i", strtotime($patient['appointmentDateTime']));
                                        ?>
                                        <tr>
                                            <td><?= $patient['id'] ?></td>
                                            <td><?= $patient['name'] ?></td>
                                            <td><?= $patient['icno'] ?></td>
                                            <td><?= $patient['diagnose_status'] ?></td>
                                            <td><?= $patient['appointment_status'] ?></td>
                                            <td><?= $appointmentDateTime ?></td>
                                            <td><?= $patient['medicinePrescription'] ?></td>
                                            <td>
                                                <button type="button" value="<?= $patient['id'] ?>" class="viewPatientBtn btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                                <button type="button" value="<?= $patient['id'] ?>" class="editPatientBtn btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                                <!--<button type="button" value="<?= $patient['id'] ?>" class="deletePatientBtn btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>-->
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
        
        $(document).on('click', '.editPatientBtn', function () {
    var id = $(this).val();

    $.ajax({
        type: "GET",
        url: "code_doctor.php?id=" + id,
        success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 404) {
                alert(res.message);
            } else if (res.status == 200) {
                $('#id').val(res.data.id);
                $('#name').val(res.data.name);
                $('#icno').val(res.data.icno);
                $('#diagnose_status').val(res.data.diagnose_status);

                // Set appointment status radio buttons based on the retrieved data
                if (res.data.appointment_status === 'Yes') {
                    $('#edit_appointment_yes').prop('checked', true);
                    $('#edit_appointment_no').prop('checked', false);
                } else if (res.data.appointment_status === 'No') {
                    $('#edit_appointment_yes').prop('checked', false);
                    $('#edit_appointment_no').prop('checked', true);
                }

                // Set appointment date and medicine prescription values
                $('#edit_appointmentDateTime').val(res.data.appointmentDateTime);
                $('#edit_medicinePrescription').val(res.data.medicinePrescription);

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
                url: "code_doctor.php",
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
                url: "code_doctor.php?id=" + id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_name').text(res.data.name);
                        $('#view_icno').text(res.data.icno);
                        $('#view_diagnose_status').text(res.data.diagnose_status);
                        $('#view_appointment_status').text(res.data.appointment_status);
                        $('#view_appointmentDateTime').text(res.data.appointmentDateTime);
                        $('#view_medicinePrescription').text(res.data.medicinePrescription);

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
                    url: "code_doctor.php",
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
