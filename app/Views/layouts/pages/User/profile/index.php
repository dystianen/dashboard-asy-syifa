<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <div class="row d-flex align-items-center flex-column">
        <img src="https://joeschmoe.io/api/v1/random" class="rounded-circle" alt="..." style="width: 120px; height: 120px">
        <h3 class="text-center mt-4"><?= $user['fullname'] ?></h3>
        <?php if ($point['point']) : ?>
            <h5 class="text-center"><i class="bi bi-star-fill text-warning"></i> <?= $point['point'] ?></h5>
        <?php else : ?>
            <h5 class="text-center"><i class="bi bi-star-fill text-warning"></i> 0</h5>
        <?php endif; ?>
        </h5>
    </div>
</section>

<section class="pt-0">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="alert alert-light" role="alert">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Position</div>
                    <?= $user['position'] ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="alert alert-light" role="alert">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">NIK</div>
                    <?= $user['nik'] ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="alert alert-light" role="alert">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Email</div>
                    <?= $user['email'] ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="alert alert-light" role="alert">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Phone Number</div>
                    <?= $user['phone_number'] ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="alert alert-light" role="alert">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Place, Date of Birth</div>
                    <?= $user['place_of_birth'] ?>, <?= $user['date_of_birth'] ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="alert alert-light" role="alert">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Age</div>
                    <?= $user['age'] ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>