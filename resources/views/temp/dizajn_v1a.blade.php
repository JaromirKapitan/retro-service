<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Adminer CMS - Dark Sidebar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <style>
            body { background-color: #f8f9fa; }
            .sidebar { width: 240px; height: 100vh; }
            .sidebar .nav-link { color: #ccc; }
            .sidebar .nav-link.active { background-color: rgba(255,255,255,0.1); color: #fff; border-radius: .375rem; }
            .submenu { padding-left: 1.5rem; }
            .submenu .nav-link { font-size: 0.9rem; }
        </style>
    </head>
    <body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3">
            <h4 class="mb-4"><i class="bi bi-speedometer2"></i> Adminer</h4>
            <ul class="nav flex-column">
                <!-- Dashboard -->
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link"><i class="bi bi-house"></i> Dashboard</a>
                </li>

                <!-- Web stránky -->
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center" data-bs-toggle="collapse" href="#submenuWeb" role="button" aria-expanded="false">
                        <i class="bi bi-globe me-1"></i> Web stránky <i class="bi bi-chevron-down ms-auto small"></i>
                    </a>
                    <div class="collapse submenu" id="submenuWeb">
                        <ul class="nav flex-column">
                            <li><a href="#" class="nav-link">Usporiadanie stránok</a></li>
                            <li><a href="#" class="nav-link">Tvorba menu</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Articles -->
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center active" data-bs-toggle="collapse" href="#submenuArticles" role="button" aria-expanded="true">
                        <i class="bi bi-journal-text me-1"></i> Articles <i class="bi bi-chevron-down ms-auto small"></i>
                    </a>
                    <div class="collapse submenu show" id="submenuArticles">
                        <ul class="nav flex-column">
                            <li><a href="#" class="nav-link active"><i class="bi bi-list me-1"></i> Výpis článkov</a></li>
                            <li><a href="#" class="nav-link"><i class="bi bi-plus-lg me-1"></i> Pridanie článku</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <hr class="text-white-50">
            <a href="#" class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <h3 class="fw-bold">Obsah</h3>
            <p>Tu sa bude zobrazovať obsah podľa zvolenej položky menu.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
