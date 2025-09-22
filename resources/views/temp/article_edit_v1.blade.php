<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Article - Adminer CMS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <style>
            body { background-color: #f8f9fa; }
            .sidebar { width: 240px; height: 100vh; }
            .sidebar .nav-link.active { background-color: rgba(255,255,255,0.2); border-radius: .375rem; }
        </style>
    </head>
    <body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3">
            <h4 class="mb-4"><i class="bi bi-speedometer2"></i> Adminer</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link text-white"><i class="bi bi-house"></i> Dashboard</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-white active"><i class="bi bi-file-earmark-text"></i> Articles</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link text-white"><i class="bi bi-people"></i> Users</a></li>
            </ul>
            <hr class="text-white-50">
            <a href="#" class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Edit Article</h3>
                <button class="btn btn-success"><i class="bi bi-save"></i> Save</button>
            </div>

            <div class="row g-3">
                <!-- Main form -->
                <div class="col-md-8">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Page</label>
                                <input type="text" class="form-control" value="Blanditiis est necessitatibus pariatur est deserunt.">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" value="Repudiandae et dignissimos voluptatem nulla nisi dolor omnis magnam.">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Short text</label>
                                <textarea class="form-control" rows="3">Similique ullam sed qui...</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Text</label>
                                <textarea class="form-control" rows="6">Similique ullam sed qui...</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label><br>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-warning">Draft</button>
                                    <button type="button" class="btn btn-outline-success active">Published</button>
                                    <button type="button" class="btn btn-outline-danger">Archived</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar form -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">SEO</h6>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keywords</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </body>
</html>
