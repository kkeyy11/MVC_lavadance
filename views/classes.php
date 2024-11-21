<?php
include APP_DIR.'views/templates/header.php';

// Get the current page name to highlight the active link
$current_page = basename($_SERVER['PHP_SELF']);
?>
<style>
    /* General Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f9fc;
        color: #333;
    }

    /* Main app container */
    #app {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Sidebar Styling */
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

    /* Card Header Styling */
    .card-header {
        background-color: #f64c72;
        color: #fff;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Main Content Styling */
    main {
        background-color: #f9fafb;
    }

    .container {
        padding-top: 20px;
    }

    h1#sessions-header {
        color: #242582;
        font-weight: 600;
    }

    /* Card Body Styling */
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
                            <!-- Sessions Link -->
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
                            <div class="container mt-4">
    <h1 id="classes-header" class="mb-4">Dance Classes</h1>
    <div class="row">
        <div class="col-md-12">
            <table id="classes-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Class Name</th>
                        <th>Instructor Name</th>
                        <th>Class Time</th>
                        <th>Available Slots</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($classesData)): ?>
                        <?php foreach ($classesData as $class): ?>
                            <tr>
                                <td><?= htmlspecialchars($class['class_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($class['class_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($class['instructor_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars(date("Y-m-d H:i:s", strtotime($class['class_time'])), ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($class['available_slots'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <a href="<?= site_url('classes/update/' . $class['class_id']); ?>" class="btn btn-warning btn-sm">Update</a>
                                    <a href="<?= site_url('classes/delete/' . $class['class_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this class?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No classes found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="<?= site_url('add-class'); ?>" class="btn btn-primary mt-3">Add Class</a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#classes-table').DataTable();
    });
</script>

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
