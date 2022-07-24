<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
<div class="container-fluid">

    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-3 text-gray-800">QR</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/qr">QR</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add
                </li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5 class="card-title mb-0 text-gray-900">Create QR</h5>
        </div>

        <div class="card-body mt-2">
            <form action="<?php echo base_url(); ?>/admin/qr/save" method="post">
                <div class="modal-body mb-3">

                    <!-- Content -->
                    <textarea name="content" placeholder="aaaf4932-bb49-4e95-a5dd-b641719b7ec9" class="form-control <?= ($validation->hasError('content') ? 'is-invalid' : '') ?>" required></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('content') ?>
                    </div>

                    <span>* for content take from <a href="https://www.uuidgenerator.net/" target="_blank">https://www.uuidgenerator.net/</a></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="history.back()">Cancel</button>
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>