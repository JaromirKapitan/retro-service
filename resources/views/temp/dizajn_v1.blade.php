<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Adminer CMS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <style>
            body { background-color: #f8f9fa; }
            .sidebar {
                width: 240px;
                height: 100vh;
            }
            .sidebar .nav-link.active {
                background-color: rgba(255,255,255,0.2);
                border-radius: 0.375rem;
            }
        </style>
    </head>
    <body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3">
            <h4 class="mb-4"><i class="bi bi-speedometer2"></i> Adminer</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white"><i class="bi bi-house"></i> Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white active"><i class="bi bi-file-earmark-text"></i> Articles</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white"><i class="bi bi-people"></i> Users</a>
                </li>
            </ul>
            <hr class="text-white-50">
            <a href="#" class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Articles</h3>
                <button class="btn btn-primary"><i class="bi bi-plus-lg"></i> New Article</button>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Repudiandae et dignissimos voluptatem nulla nisi dolor omnis magnam.</td>
                            <td><span class="badge bg-success">Published</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Et cupiditate quia dolor sequi.</td>
                            <td><span class="badge bg-danger">Archived</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Ducimus eos facilis fuga veritatis aut ullam beatae voluptates.</td>
                            <td><span class="badge bg-warning text-dark">Draft</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
