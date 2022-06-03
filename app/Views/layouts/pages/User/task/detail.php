<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <div class="card">
        <div class="card-header" style="background-color: #435ebe; text-align: center">
            <h5 style="color: white">Detail Your Task today</h5>
        </div>
        <div class="row p-4">
            <div class="col-12 col-md-4">
                <h5>Task</h5>
                <span><?= $job['description'] ?></span>
            </div>
            <div class="col-12 col-md-2">
                <h5>Point</h5>
                <span><?= $job['point'] ?></span>
            </div>
            <div class="col-12 col-md-4">
                <h5>Date Created</h5>
                <span><?= date_format(date_create($job['created_at']), 'd M Y H:i') ?></span>
            </div>
            <div class="col-12 col-md-2">
                <h5>Status</h5>
                <?php if ($job['is_completed'] == 0) : ?>
                    <span class="badge bg-danger">NOT DONE</span>
                <?php else : ?>
                    <span class="badge bg-success">DONE</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>