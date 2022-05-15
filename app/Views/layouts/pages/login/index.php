<?= $this->extend("layouts/components/base") ?>
<?= $this->section("content") ?>
<div class="container d-flex justify-content-center">
    <div class="card">
        <div class="card-header text-center">
            <span style="font-size: 20px">Sign In</span>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input name="email" type="email" class="form-control" id="email">
                    <div id="emailHelp" class="form-text" style="font-size: 15px">We'll never share your email with
                        anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>