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

    /* Classes page styling */
    .card-body {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                                <a class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" href="/home">
                                    Dashboard
                                </a>
                            </li>
                            <!-- Classes Link -->
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == 'classes.php') ? 'active' : ''; ?>" href="/classes">
                                    Classes
                                </a>
                            </li>
                            <!-- Session Link -->
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == 'session.php') ? 'active' : ''; ?>" href="/sessions">
                                    Sessions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == 'aboutus.php') ? 'active' : ''; ?>" href="/about-us">
                                    About Us
                                </a>
                            </li>
                            <!-- Logout Link -->
                            <!-- Add your logout link here if needed -->
                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3 pt-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">About Us</div>
                                    <div class="card-body">
                                        <h2>Welcome to the About Us Page!</h2>
                                        <p>Here you can view and manage your dance classes, instructors, and schedules.</p>
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
