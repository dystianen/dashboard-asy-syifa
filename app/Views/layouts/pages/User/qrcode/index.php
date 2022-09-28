<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>

<section class="d-flex flex-column align-items-center text-center">
    <span style="color: gray">Please scan this QR Code for today!</span>
    <img style="width: 15rem;" src="<?= base_url($qr['file']) ?>">
</section>

<?= $this->endSection() ?>
