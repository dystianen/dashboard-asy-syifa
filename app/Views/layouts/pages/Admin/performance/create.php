<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
    <div class="container-fluid">

        <div class="d-sm-flex flex-column mb-4">
            <h1 class="h3 mb-3 text-gray-800">Performances</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/performance">Performances</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add
                    </li>
                </ol>
            </nav>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5 class="card-title mb-0 text-gray-900">Create Performance</h5>
            </div>

            <div class="card-body mt-2">
                <form action="<?php echo base_url(); ?>/admin/performance/create/submit" method="post">
                    <?= csrf_field(); ?>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user" class="form-label">User <span style="color: red">*</span></label>
                                    <select name="user_id" class="form-select <?= ($validation->hasError('user_id') ? 'is-invalid' : '') ?>" id="basicSelect">
                                        <option value="">--please select--</option>
                                        <?php foreach ($user as $e) : ?>
                                            <option value="<?= $e['id'] ?>"><?= $e['fullname'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('user_id') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="point" class="form-label">Score <span style="color: red">*</span></label>
                                    <input disabled name="point" class="form-control <?= ($validation->hasError('score') ? 'is-invalid' : '') ?>" placeholder="example: A" value="<?= old('score') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('score') ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">Description Performance Employee<span style="color: red">*</span></label>
                            <textarea name="description" id="editor" cols="30" rows="10"></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('description') ?>
                            </div>
                        </div>
                    </div>

                    <div class="float-end pt-3">
                        <a type="button" class="btn btn-secondary" href="/admin/performance">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
<?= $this->endSection() ?>