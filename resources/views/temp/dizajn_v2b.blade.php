<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Adminer CMS - Light Sidebar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <style>
            body { background-color: #fdfdfd; }
            .sidebar {
                width: 220px; height: 100vh; border-right: 1px solid #dee2e6; background: #fff; transition: all 0.3s ease;
            }
            .sidebar .nav-link { color: #333; font-weight: 500; white-space: nowrap; }
            .sidebar .nav-link.active { background-color: #e9ecef; border-radius: .375rem; }
            .submenu { padding-left: 1.5rem; }
            .submenu .nav-link { font-size: 0.9rem; }

            /* Tablet – iba ikony, bez textov podmenu */
            @media (max-width: 991px) {
                .sidebar { width: 70px; }
                .sidebar .nav-link span { display: none; }
                .submenu { display: none !important; }
            }
        </style>
    </head>
    <body>
    <!-- Topbar -->
    <nav class="navbar navbar-light bg-light border-bottom d-lg-none">
        <div class="container-fluid">
            <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
                <i class="bi bi-list"></i>
            </button>
            <span class="navbar-brand mb-0 h1">Adminer</span>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar pre desktop/tablet -->
        <div class="sidebar p-3 d-none d-lg-block">
            <h5 class="fw-bold mb-4"><i class="bi bi-box"></i> Adminer</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="bi bi-house"></i> <span>Dashboard</span></a></li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center" data-bs-toggle="collapse" href="#submenuWeb" role="button">
                        <i class="bi bi-globe me-1"></i> <span>Web stránky</span>
                    </a>
                    <div class="collapse submenu" id="submenuWeb">
                        <ul class="nav flex-column">
                            <li><a href="#" class="nav-link">Usporiadanie stránok</a></li>
                            <li><a href="#" class="nav-link">Tvorba menu</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link active d-flex align-items-center" data-bs-toggle="collapse" href="#submenuArticles" role="button" aria-expanded="true">
                        <i class="bi bi-journal-text me-1"></i> <span>Articles</span>
                    </a>
                    <div class="collapse submenu show" id="submenuArticles">
                        <ul class="nav flex-column">
                            <li><a href="#" class="nav-link active"><i class="bi bi-list me-1"></i> Výpis článkov</a></li>
                            <li><a href="#" class="nav-link"><i class="bi bi-plus-lg me-1"></i> Pridanie článku</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Offcanvas pre mobil -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Adminer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="bi bi-house"></i> Dashboard</a></li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" data-bs-toggle="collapse" href="#mobileSubWeb"><i class="bi bi-globe me-1"></i> Web stránky</a>
                        <div class="collapse" id="mobileSubWeb">
                            <ul class="nav flex-column ms-3">
                                <li><a href="#" class="nav-link">Usporiadanie stránok</a></li>
                                <li><a href="#" class="nav-link">Tvorba menu</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" data-bs-toggle="collapse" href="#mobileSubArticles" aria-expanded="true"><i class="bi bi-journal-text me-1"></i> Articles</a>
                        <div class="collapse show" id="mobileSubArticles">
                            <ul class="nav flex-column ms-3">
                                <li><a href="#" class="nav-link active">Výpis článkov</a></li>
                                <li><a href="#" class="nav-link">Pridanie článku</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
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
