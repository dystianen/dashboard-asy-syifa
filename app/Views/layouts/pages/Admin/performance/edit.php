<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
<div class="container-fluid">

    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-3 text-gray-800">Performances</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/performance">Performances</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit
                </li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5 class="card-title mb-0 text-gray-900">Edit Performance Employee</h5>
        </div>

        <div class="card-body mt-2">
            <form action="<?php echo base_url(); ?>/admin/performance/edit/submit/<?= $performance['performanceId']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user" class="form-label">User <span style="color: red">*</span></label>
                                    <select name="user_id" class="form-select <?= ($validation->hasError('user_id') ? 'is-invalid' : '') ?>" id="basicSelect">
                                        <option value="">--please select--</option>
                                        <?php foreach ($user as $e) : ?>
                                            <option value="<?= $e['userId'] ?>" selected><?= $e['fullname'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('user_id') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="score" class="form-label">Score <span style="color: red">*</span></label>
                                    <input name="score" class="form-control <?= ($validation->hasError('score') ? 'is-invalid' : '') ?>" id="score" placeholder="example: 500" value="<?= $performance['score'] ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('score') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description<span style="color: red">*</span></label>
                            <textarea name="description" id="editor" cols="30" rows="10">
                                    <?= $performance['description'] ?>
                            </textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('description') ?>
                            </div>
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