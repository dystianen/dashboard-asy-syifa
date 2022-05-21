<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
    <div class="container-fluid">

        <div class="d-sm-flex flex-column mb-4">
            <h1 class="h3 mb-3 text-gray-800">Employee</h1>

            <nav aria-label="breadcrumb">
                <ol
                        class="breadcrumb"
                >
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/employee">Employee</a></li>
                    <li
                            class="breadcrumb-item active"
                            aria-current="page"
                    >Add
                    </li>
                </ol>
            </nav>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5 class="card-title mb-0 text-gray-900">Create Employee</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo base_url(); ?>/admin/employee/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK <span style="color: red">*</span></label>
                                <input
                                        name="nik"
                                        class="form-control <?= ($validation->hasError('nik') ? 'is-invalid' : '') ?>"
                                        id="nik"
                                        placeholder="example: 3521067738749"
                                        value="<?= old('nik') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span style="color: red">*</span></label>
                                <input
                                        name="email"
                                        class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>"
                                        id="email"
                                        type="email"
                                        placeholder="example: example@gmail.com"
                                        value="<?= old('email') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password <span style="color: red">*</span></label>
                                <input
                                        name="confirmPassword"
                                        class="form-control <?= ($validation->hasError('confirmPassword') ? 'is-invalid' : '') ?>"
                                        id="confirmPassword"
                                        type="password"
                                        placeholder="Input confirm password"
                                        value="<?= old('confirmPassword') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('confirmPassword') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="place_of_birth">Place of Birth <span style="color: red">*</span></label>
                                <input
                                        name="place_of_birth"
                                        class="form-control <?= ($validation->hasError('place_of_birth') ? 'is-invalid' : '') ?>"
                                        id="place_of_birth"
                                        placeholder="example: Malang"
                                        value="<?= old('place_of_birth') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('place_of_birth') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="age">Age <span style="color: red">*</span></label>
                                <input
                                        name="age"
                                        class="form-control <?= ($validation->hasError('age') ? 'is-invalid' : '') ?>"
                                        id="age"
                                        placeholder="example: 20"
                                        value="<?= old('age') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('age') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address <span style="color: red">*</span></label>
                                <textarea
                                        name="address"
                                        class="form-control <?= ($validation->hasError('address') ? 'is-invalid' : '') ?>"
                                        id="address"
                                        placeholder="example: Jl. Danau Ranau, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139"
                                ><?= old('address') ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('address') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="fullname">Fullname <span style="color: red">*</span></label>
                                <input
                                        name="fullname"
                                        class="form-control <?= ($validation->hasError('fullname') ? 'is-invalid' : '') ?>"
                                        id="fullname"
                                        placeholder="example: brotherhood"
                                        value="<?= old('fullname') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fullname') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password <span style="color: red">*</span></label>
                                <input
                                        name="password"
                                        class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : '') ?>"
                                        id="password"
                                        type="password"
                                        placeholder="Input password"
                                        value="<?= old('password') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth <span style="color: red">*</span></label>
                                <input
                                        name="date_of_birth"
                                        class="form-control <?= ($validation->hasError('date_of_birth') ? 'is-invalid' : '') ?>"
                                        id="date_of_birth"
                                        type="date"
                                        value="<?= old('date_of_birth') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('date_of_birth') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gender <span style="color: red">*</span></label>
                                <select name="gender"
                                        class="form-select <?= ($validation->hasError('gender') ? 'is-invalid' : '') ?>"
                                        id="basicSelect" value="<?= old('gender') ?>">
                                    <option value="">--please select--</option>
                                    <option value="Male" <?php if(old('gender') == 'Male') {echo 'selected';}?>>Male</option>
                                    <option value="Female"<?php if(old('gender') == 'Female') {echo 'selected';}?>>Female</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gender') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number <span style="color: red">*</span></label>
                                <input
                                        name="phone_number"
                                        class="form-control <?= ($validation->hasError('phone_number') ? 'is-invalid' : '') ?>"
                                        id="phone"
                                        placeholder="example: 08146635529"
                                        value="<?= old('phone_number') ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('phone_number') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-end pt-3">
                        <a
                                type="button"
                                class="btn btn-secondary"
                                href="/admin/employee"
                        ><i class="bi bi-x-lg"></i> Cancel</a>
                        <button
                                type="submit"
                                class="btn btn-primary"
                        ><i class="bi bi-check-lg"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>