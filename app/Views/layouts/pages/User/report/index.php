<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
    <section>
        <?php if ($report !== null) :  ?>
            <div class="card card-success d-flex align-items-center p-5">
                <span><i class="bi bi-check-circle" style="font-size: 50px; color: green"></i></span>
                <h5 class="text-center">You have reported today's task!</h5>
            </div>
        <?php else :  ?>

        <div class="card">
            <form action="<?php echo base_url(); ?>/user/report/create/submit" method="post">
                <div class="card-body">

                    <!-- Content -->
                    <div class="form-label mb-4">
                        <span>Please report your Task today!</span>
                    </div>
                    <textarea name="description" class="form-control" rows="8" required></textarea>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-secondary" onclick="history.back()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

        <div class=" modal fade" id="FinishModal" data-bs-backdrop="static" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3>Are you sure?</h3>
                        Do you really Complete your Job?
                        </br>
                        <div class="pt-3">
                            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">No</button>
                            <form class="d-inline" method="post"
                                  action="<?= base_url(); ?>/user/report/submit/<?= $job['jobId'] ?>">
                                <button type="submit" class="btn btn-primary m-2">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>
<?= $this->endSection() ?>