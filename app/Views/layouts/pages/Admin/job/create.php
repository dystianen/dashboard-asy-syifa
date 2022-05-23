<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
<div class="container-fluid">

    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-3 text-gray-800">Job</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/job">Job</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add
                </li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5 class="card-title mb-0 text-gray-900">Create Job</h5>
        </div>

        <div class="card-body">
            <form action="<?php echo base_url(); ?>/admin/job/save" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>User <span style="color: red">*</span></label>
                            <select name="user" class="form-select <?= ($validation->hasError('user') ? 'is-invalid' : '') ?>" id="basicSelect">
                                <option value="">--please select--</option>
                                <?php foreach ($user as $e) : ?>
                                    <option value="<?= $e['id'] ?>"><?= $e['fullname'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('user') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description <span style="color: red">*</span></label>
                            <textarea name="description" class="form-control <?= ($validation->hasError('description') ? 'is-invalid' : '') ?>" id="description" placeholder="example: ..."><?= old('description') ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('description') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="type_of_work">Type of Work <span style="color: red">*</span></label>
                            <input name="type_of_work" class="form-control <?= ($validation->hasError('type_of_work') ? 'is-invalid' : '') ?>" id="type_of_work" placeholder="example: Programmer" value="<?= old('type_of_work') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('type_of_work') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="point">Point <span style="color: red">*</span></label>
                            <input name="point" class="form-control <?= ($validation->hasError('point') ? 'is-invalid' : '') ?>" id="point" placeholder="example: 500" value="<?= old('point') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('point') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-end pt-3">
                    <a type="button" class="btn btn-secondary" href="/admin/job">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>