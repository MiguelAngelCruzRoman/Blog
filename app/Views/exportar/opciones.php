<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0" align="center">POSTS</h5>
                </div>
                <div class="card-body">
                    <p align="center">Exportar posts en diferentes formatos:</p>
                    <a href="<?= base_url('/exportar/csv_posts'); ?>" class="btn btn-primary mr-2">.CSV</a>
                    <a href="<?= base_url('/exportar/pdf_posts'); ?>" class="btn btn-primary">.PDF</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0" align="center">CATEGORIES</h5>
                </div>
                <div class="card-body">
                    <p align="center">Exportar categories en diferentes formatos:</p>
                    <a href="<?= base_url('/exportar/csv_categories'); ?>" class="btn btn-primary mr-2">.CSV</a>
                    <a href="<?= base_url('/exportar/pdf_categories'); ?>" class="btn btn-primary">.PDF</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0" align="center">USERS</h5>
                </div>
                <div class="card-body">
                    <p align="center">Exportar users en diferentes formatos:</p>
                    <a href="<?= base_url('/exportar/csv_users'); ?>" class="btn btn-primary mr-2">.CSV</a>
                    <a href="<?= base_url('/exportar/pdf_users'); ?>" class="btn btn-primary">.PDF</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0" align="center">COMMENTS</h5>
                </div>
                <div class="card-body">
                    <p align="center">Exportar comments en diferentes formatos:</p>
                    <a href="<?= base_url('/exportar/csv_comments'); ?>" class="btn btn-primary mr-2">.CSV</a>
                    <a href="<?= base_url('/exportar/pdf_comments'); ?>" class="btn btn-primary">.PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
