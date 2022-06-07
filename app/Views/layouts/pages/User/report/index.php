<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <?php if ($job['is_completed'] == 1) : ?>
        <div class="card card-success d-flex align-items-center p-5">
            <span><i class="bi bi-check-circle" style="font-size: 50px; color: green"></i></span>
            <h5 class="text-center">Your task for today is done!</h5>
        </div>
    <?php else : ?>
        <div class="card">
            <div class="card-header" style="background-color: #435ebe;">
                <h5 style="color: white">Report Your Task today</h5>
            </div>
            <div class="row p-4">
                <div class="col-12 col-md-4 detail-task">
                    <h5>Task</h5>
                    <span><?= $job['description'] ?></span>
                </div>
                <div class="col-12 col-md-2 detail-task">
                    <h5>Point</h5>
                    <span><?= $job['point'] ?></span>
                </div>
                <?php if ($job['is_completed'] == 0) : ?>
                    <div class="col-12 col-md-2 detail-task">
                        <h5>Date Created</h5>
                        <span><?= date_format(date_create($job['created_at']), 'd M Y H:i') ?></span>
                    </div>
                <?php else : ?>
                    <div class="col-12 col-md-4 detail-task">
                        <h5>Date Created</h5>
                        <span><?= date_format(date_create($job['created_at']), 'd M Y H:i') ?></span>
                    </div>
                <?php endif; ?>
                <div class="col-12 col-md-2 detail-task">
                    <h5>Status</h5>
                    <?php if ($job['is_completed'] == 0) : ?>
                        <span class="badge bg-danger">NOT DONE</span>
                    <?php else : ?>
                        <span class="badge bg-success">DONE</span>
                    <?php endif; ?>
                </div>
                <?php if ($job['is_completed'] == 0) : ?>
                    <div class="col-12 col-md-2 detail-task">
                        <h5>Action</h5>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#FinishModal">Finish Task?</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<div class=" modal fade" id="FinishModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3>Are you sure?</h3>
                Do you really Complete your Job?
                </br>
                <div class="pt-3">
                    <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">No</button>
                    <form class="d-inline" method="post" action="<?= base_url(); ?>/user/report/submit/<?= $job['id'] ?>">
                        <button type="submit" class="btn btn-primary m-2">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>