<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/29331ca922.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/Medical Supplies/style.css')}}"rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
           <div class="h-100">
              <div class="sidebar-logo">
                  <a href="#">Emergency Medical Assistance System</a>
              </div>
              <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Admin Elements
                </li>
                <li class="sidebar-item">
                     <a href="{{route('admin_panel.index'}}" class="sidebar-link">
                        <i class="fa-solid fa-list"></i>
                        Dashboard
                     </a>
                </li>
                <li clas="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-file-lines pe-2"></i>
                        Medical Supplies Service
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{route('admin_panel.admin_medical_supplies'}}" class="sidebar-link">Medical Supplies Admin Panel</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">service 2</a>
                        </li>
                    </ul>
                </li>
                <li clas="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-sliders pe-2" ></i>
                        Posts
                    </a>
                    <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Post 1</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Post 2</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Post 3</a>
                        </li>
                    </ul>
                </li>
                <li clas="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-regular fa-user pe-2" ></i>
                        Auth
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Forgot Password</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-header">
                    Multi-Level Menu
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-share-nodes pe-2" ></i>
                        Multi Dropdown
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#level-1" data-bs-toggle="collapse" aria-expanded="false">Medical Supplies</a>
                            <ul id="level-1" class="sidebar-dropdown list-unstyled collapse" >
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Medical Supplies Table</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Technical Supplies Table</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
              </ul>
           </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="pictures/profile.jpg" class="avatar img-fluid rouded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                   <div class="row g-0 w-100">
                                      <div class="col-6">
                                           <div class="p-3 m-1">
                                              <h4><b>Welcome Back, Admin</b></h4>
                                              <p class="mb-0"><b>Admin Dashboard ,CodzSword</b></p>
                                           </div>
                                      </div>
                                      <div class="col-6 align-self-end text-end">
                                        <img src="pictures/customer-support.jpg" class="img-fluid illustration-img">
                                      </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                <b>&#8377 345</b>
                                            </h4>
                                            <p class="mb-2">
                                                <b>Total Earnings</b>
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                      <b>+9.0%</b> 
                                                </span>
                                                <span class="text-muted">
                                                    <b>Since Last Month</b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-tittle">
                                <b>Basic Table</b>
                            </h5>
                            <h6 class="card-subtittle text-muted">
                                <b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius eligendi, perspiciatis quas, delectus est, voluptate consectetur et quaerat culpa similique ad. Earum quibusdam mollitia quo ratione. Voluptates inventore pariatur maiores?</b>
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="foooter">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted" id="">
                                    <strong>CodzSword</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                     <a href="#" class="text-muted"><b>Contact</b></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted"><b>About Us</b></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted"><b>Terms</b></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted"><b>Booking</b></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{asset('js/Medical Supplies/script.js'}}"></script>
</body>
</html>