<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <div class="text-center">
        <h5 style="color: gray">List Your Task today!</h5>
    </div>
</section>

<section>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Job Type</th>
                        <th>Description</th>
                        <th>Point</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection() ?>