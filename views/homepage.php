<?php
include APP_DIR.'views/templates/header.php';

// Get the current page name to highlight the active link
$current_page = basename($_SERVER['PHP_SELF']);
?>
<style>
    /* General styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f9fc;
        color: #333;
    }
    #app {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    /* Sidebar styling */
    #sidebar {
        background-color: #242582;
        color: #fff;
        min-height: 100vh;
    }
    #sidebar .nav-link {
        color: #bfc5d8;
        font-weight: 500;
    }
    #sidebar .nav-link.active {
        color: #fff;
        background-color: #553d67;
    }
    #sidebar .nav-link:hover {
        color: #f64c72;
    }
    #sidebar .nav-item {
        margin: 15px 0;
    }

    /* Header styling */
    .card-header {
        background-color: #f64c72;
        color: #fff;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Table styling */
    #users-table {
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    #users-table thead {
        background-color: #242582;
        color: #fff;
    }
    #users-table tbody tr:hover {
        background-color: #f1f3f8;
    }
    #users-table th, #users-table td {
        text-align: center;
        padding: 12px;
    }

    /* Main content styling */
    main {
        background-color: #f9fafb;
    }
    .container {
        padding-top: 20px;
    }
    h1#users-header {
        color: #242582;
        font-weight: 600;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        #sidebar {
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
        main {
            margin-top: 60px;
        }
    }
</style>

<body>
    <div id="app">
        <?php
        include APP_DIR.'views/templates/nav.php';
        ?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <!-- Dashboard Link -->
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == '/home') ? 'active' : ''; ?>" href="/home">
                                    Dashboard
                                </a>
                            </li>
                            <!-- Classes Link -->
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == '/classes') ? 'active' : ''; ?>" href="/classes">
                                    Classes
                                </a>
                            </li>
                            <!-- Session Link -->
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == '/sessions') ? 'active' : ''; ?>" href="/sessions">
                                    Sessions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == 'aboutus.php') ? 'active' : ''; ?>" href="/about-us">
                                    About Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3 pt-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Dashboard</div>
                                    <div class="card-body">
                                        <div class="container mt-4">
                                            <h1 id="users-header" class="mb-4">Users</h1>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="users-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Class Name</th>
                                                                <th>Instructor Name</th>
                                                                <th>Class Time</th>
                                                                <th>Available Slots</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($userdata as $usrdt): ?>
                                                            <tr>
                                                                <td><?=$usrdt['class_id'];?></td>
                                                                <td><?=$usrdt['class_name'];?></td>
                                                                <td><?=$usrdt['instructor_name'];?></td>
                                                                <td><?=$usrdt['class_time'];?></td>
                                                                <td><?=$usrdt['available_slots'];?></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
</html>
