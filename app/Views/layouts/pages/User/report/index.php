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
        <?php endif; ?>
    </section>
<?= $this->endSection() ?>