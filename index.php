<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic DB</title>
    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--Icons CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
          <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class="bi bi-grid"></i>
          </a>
          <a class="navbar-brand text-light" href="index.php">Clinic Database</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link text-light" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Pricing</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="manual.pdf" download>Manual</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sign in
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Front Desk</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#doctorModal">Doctor</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#pharmacyModal">Pharmacy</a></li>

                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
      <!-- Modal --> 
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sign in (Front-Desk)</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="login.php" method="POST">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="email" name="uname" class="form-control" id="exampleInputEmail1" placeholder="Enter your username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" required>
                    </div>
                      
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Login</button>
                </form>

              </div>
            </div>
        </div>
      </div>

      <!-- Doctor Login Modal -->
      <div class="modal fade" id="doctorModal" tabindex="-1" role="dialog" aria-labelledby="doctorModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="doctorModalLabel">Sign in (Doctor)</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="doctor_login.php" method="POST">
                      <div class="modal-body">
                          <div class="mb-3">
                              <label for="doctorUsername" class="form-label">Username</label>
                              <input type="text" name="doctor_uname" class="form-control" id="doctorUsername" placeholder="Enter your username" required>
                          </div>
                          <div class="mb-3">
                              <label for="doctorPassword" class="form-label">Password</label>
                              <input type="password" name="doctor_password" class="form-control" id="doctorPassword" placeholder="Enter your password" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <!-- Pharmacy Login Modal -->
      <div class="modal fade" id="pharmacyModal" tabindex="-1" role="dialog" aria-labelledby="pharmacyModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="pharmacyModalLabel">Sign in (Pharmacy)</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="pharmacy_login.php" method="POST">
                      <div class="modal-body">
                          <div class="mb-3">
                              <label for="pharmacyUsername" class="form-label">Username</label>
                              <input type="text" name="pharmacy_uname" class="form-control" id="pharmacyUsername" placeholder="Enter your username" required>
                          </div>
                          <div class="mb-3">
                              <label for="pharmacyPassword" class="form-label">Password</label>
                              <input type="password" name="pharmacy_password" class="form-control" id="pharmacyPassword" placeholder="Enter your password" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <!--Carousel-->
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/slide1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/slide2.gif" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/slide3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!--Offcanvas-->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">About</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div>
            The Clinic Database System is a robust and efficient software solution designed to streamline the management 
            and operations of healthcare clinics, medical practices, and healthcare facilities. It serves as a centralized 
            repository of patient and clinic information, providing healthcare professionals with the tools they need to 
            deliver high-quality patient care while optimizing administrative processes.
          </div>
          <!--
          <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
              Dropdown button
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div> -->
        </div>
      </div>

      <!--Menu-->
      <div class="bg-warning"><br>
        <h5 class="m-0 text-center">Announcement <i class="bi-volume-up-fill" style="font-size: 24px;"></i></h5><br>
        <div class="alert alert-success m-2" role="alert">
            Dear Clinic Staff, we wish to express our gratitude for your unwavering dedication and commitment 
            to providing exceptional healthcare services to our patients. In our ongoing efforts to improve 
            our clinic's operations, we are implementing new protocols and procedures aimed at enhancing patient 
            care, safety, and efficiency. We value your input and encourage you to share any insights or suggestions 
            you may have. Your continued professionalism, compassion, and teamwork play a crucial role in maintaining 
            the high standards of care that our clinic is known for. Thank you for your hard work and dedication. 
            Together, we will continue to make a positive impact on the health and well-being of our patients.
        </div><br>
      </div>
      
      <!--Gallery-->
      <div class="bg-success">
        <br>
        <h5 class="m-0 text-center">Our Gallery <i class="bi bi-camera-fill" style="font-size:24px;"></i></h5>
        <br>
        <div class="row m-3">
            <div class="col-md-2 mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal1">
                    <img src="img/pic2.jpg" class="rounded mx-auto d-block img-fluid" alt="Image 1" style="max-width: 200px; max-height: 200px;">
                </a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal2">
                    <img src="img/pic4.jpg" class="rounded mx-auto d-block img-fluid" alt="Image 2" style="max-width: 200px; max-height: 200px;">
                </a>
            </div>
            <div class="col-md-2 mb-2">
              <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal3">
                  <img src="img/pic1.jpg" class="rounded mx-auto d-block img-fluid" alt="Image 3" style="max-width: 200px; max-height: 200px;">
              </a>
            </div>
            <div class="col-md-2 mb-2">
              <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal4">
                  <img src="img/pic5.jpeg" class="rounded mx-auto d-block img-fluid" alt="Image 4" style="max-width: 200px; max-height: 200px;">
              </a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal5">
                    <img src="img/pic3.jpg" class="rounded mx-auto d-block img-fluid" alt="Image 5" style="max-width: 200px; max-height: 200px;">
                </a>
            </div>
            <div class="col-md-2 mb-2">
              <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal6">
                  <img src="img/pic6.jpg" class="rounded mx-auto d-block img-fluid" alt="Image 6" style="max-width: 200px; max-height: 200px;">
              </a>
            </div>
            <!-- Add similar anchor tags and modals for other images -->
        </div><br>
      </div>
    
      <!-- Modal for Image 1 -->
      <div class="modal fade" id="imageModal1" tabindex="-1" role="dialog" aria-labelledby="imageModal1Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <img src="img/pic2.jpg" class="img-fluid" alt="Image 1">
                  </div>
              </div>
          </div>
      </div>
      
      <!-- Modal for Image 2 -->
      <div class="modal fade" id="imageModal2" tabindex="-1" role="dialog" aria-labelledby="imageModal2Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <img src="img/pic4.jpg" class="img-fluid" alt="Image 2">
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal for Image 3 -->
      <div class="modal fade" id="imageModal3" tabindex="-1" role="dialog" aria-labelledby="imageModal3Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="img/pic1.jpg" class="img-fluid" alt="Image 3">
                </div>
            </div>
        </div>
      </div>

      <!-- Modal for Image 4 -->
      <div class="modal fade" id="imageModal4" tabindex="-1" role="dialog" aria-labelledby="imageModal4Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="img/pic5.jpeg" class="img-fluid" alt="Image 4">
                </div>
            </div>
        </div>
      </div>
    
      <!-- Modal for Image 5 -->
      <div class="modal fade" id="imageModal5" tabindex="-1" role="dialog" aria-labelledby="imageModal5Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <img src="img/pic3.jpg" class="img-fluid" alt="Image 5">
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal for Image 6 -->
      <div class="modal fade" id="imageModal6" tabindex="-1" role="dialog" aria-labelledby="imageModal6Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="img/pic6.jpg" class="img-fluid" alt="Image 6">
                </div>
            </div>
        </div>
      </div>

      <!--Footer-->
      <footer class="bg-primary text-center" style="padding: 10px;">
        <div>
          <p class="m-2 text-light">&copy; 2023 Clinic Database, Inc</p>
        </div>
      </footer>
      
</body>
</html>