<?= $this->extend("layouts/components/base") ?>
<?= $this->section("content") ?>
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 500px;">
        <div class="card-header text-center">
            <span style="font-size: 20px">Register Form</span>
        </div>
        <div class="card-body">
            <?php if(isset($validation)):?>
            <div class="alert alert-warning">
                <?= $validation->listErrors() ?>
            </div>
            <?php endif;?>
            <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                <div class="form-group mb-3">
                    <input type="text" name="fullname" placeholder="Nama Lengkap" value="<?= set_value('fullname') ?>"
                        class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="email" name="email" placeholder="Alamat Email" value="<?= set_value('email') ?>"
                        class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="confirmPassword" placeholder="Konfirmasi Password"
                        class="form-control">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>