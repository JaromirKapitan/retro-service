<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Adminer CMS - Light</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <style>
            body { background-color: #fdfdfd; }
            .sidebar {
                width: 220px;
                height: 100vh;
                border-right: 1px solid #dee2e6;
                background: #ffffff;
            }
            .sidebar .nav-link {
                font-weight: 500;
            }
            .sidebar .nav-link.active {
                background-color: #e9ecef;
                border-radius: .375rem;
            }
        </style>
    </head>
    <body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h5 class="fw-bold mb-4"><i class="bi bi-box"></i> Adminer</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link active text-dark"><i class="bi bi-house"></i> Dashboard</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-dark"><i class="bi bi-file-earmark-text"></i> Articles</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-dark"><i class="bi bi-people"></i> Users</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="fw-bold">Articles</h3>
                <button class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i> Add Article</button>
            </div>

            <table class="table table-hover align-middle shadow-sm">
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
                    <td><span class="badge rounded-pill bg-success-subtle text-success">Published</span></td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Et cupiditate quia dolor sequi.</td>
                    <td><span class="badge rounded-pill bg-danger-subtle text-danger">Archived</span></td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ducimus eos facilis fuga veritatis aut ullam beatae voluptates.</td>
                    <td><span class="badge rounded-pill bg-warning-subtle text-warning">Draft</span></td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>
