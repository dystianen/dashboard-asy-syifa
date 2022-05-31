<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo base_url(); ?>/user/permission/submit" method="post">
                <div class="form-group">
                    <label class="form-label" for="category">Category <span style="color: red">*</span></label>
                    <select name="category" class="form-select  <?= ($validation->hasError('category') ? 'is-invalid' : '') ?>" id="basicSelect" value="<?= old('category') ?>">
                        <option value="">--please select--</option>
                        <?php foreach ($category as $e) : ?>
                            <option value="<?= $e['slug'] ?>"><?= $e['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('category') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nik">Reason <span style="color: red">*</span></label>
                    <textarea name="description" class="form-control <?= ($validation->hasError('description') ? 'is-invalid' : '') ?>" placeholder="example: Covid-19"><?= old('description') ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="upload">Upload Proof <span style="color: red">*</span></label>
                    <input name="file" class="form-control <?= ($validation->hasError('file') ? 'is-invalid' : '') ?>" id="formFileSm" type="file" value="<?= old('file') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('file') ?>
                    </div>
                </div>
                <div class="mt-4">
                    <a class="btn btn-secondary" href="/user/absent">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>