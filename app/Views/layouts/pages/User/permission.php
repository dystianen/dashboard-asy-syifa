<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <div class="card">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label class="form-label" for="category">Category <span style="color: red">*</span></label>
                    <select name="category" class="form-select" id="basicSelect">
                        <option value="">--please select--</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nik">Reason <span style="color: red">*</span></label>
                    <textarea name="reason" class="form-control" placeholder="example: Covid-19"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="upload">Upload Proof <span style="color: red">*</span></label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file">
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