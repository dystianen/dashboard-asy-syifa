<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div id="auth">
    <div class="h-100" style="display: flex; justify-content: center">
        <div class="col-lg-5 col-12">
            <div class="card my-5">
                <div class="card-header" style="background-color: #435ebe">
                    <h3 style="color: #ffffff">Register</h3>
                </div>

                <div class="card-body mt-2">
                    <form action="<?php echo base_url(); ?>/register/submit" method="post">
                        <div class="form-group">
                            <label for="fullname" class="form-label">Fullname <span style="color: red">*</span></label>
                            <input name="fullname" class="form-control <?= ($validation->hasError('fullname') ? 'is-invalid' : '') ?>" placeholder="example: Brotherhood" value="<?= old('fullname') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('fullname') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                            <input name="email" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>" id="email" type="email" placeholder="example: example@gmail.com" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password <span style="color: red">*</span></label>
                            <input name="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : '') ?>" type="password" placeholder="Input password" value="<?= old('password') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password') ?>
                            </div>
                        </div>

                        <div class="float-end pt-3">
                            <a type="button" class="btn btn-secondary" href="/login">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>