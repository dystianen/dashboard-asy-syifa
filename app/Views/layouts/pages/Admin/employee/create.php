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
                >Add</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5 class="card-title mb-0 text-gray-900">Create Employee</h5>
        </div>

        <div class="card-body">
            <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>
            <form action="<?php echo base_url(); ?>/admin/employee/save" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="nik">NIK <span style="color: red">*</span></label>
                            <input
                                name="nik"
                                class="form-control"
                                id="nik"
                                placeholder="example: 3521067738749"
                                value="<?= set_value('nik') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span style="color: red">*</span></label>
                            <input
                                    name="email"
                                    class="form-control"
                                    id="email"
                                    type="email"
                                    placeholder="example: example@gmail.com"
                                    value="<?= set_value('email') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password <span style="color: red">*</span></label>
                            <input
                                    name="confirmPassword"
                                    class="form-control"
                                    id="confirmPassword"
                                    type="password"
                                    placeholder="Input confirm password"
                                    value="<?= set_value('confirmPassword') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="place_of_birth">Place of Birth <span style="color: red">*</span></label>
                            <input
                                name="place_of_birth"
                                class="form-control"
                                id="place_of_birth"
                                placeholder="example: Malang"
                                value="<?= set_value('place_of_birth') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="age">Age <span style="color: red">*</span></label>
                            <input
                                name="age"
                                class="form-control"
                                id="age"
                                placeholder="example: 20"
                                value="<?= set_value('age') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="address">Address <span style="color: red">*</span></label>
                            <textarea
                                    name="address"
                                    class="form-control"
                                    id="address"
                                    placeholder="example: Jl. Danau Ranau, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139"
                                    value="<?= set_value('address') ?>"
                            ></textarea>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="fullname">Fullname <span style="color: red">*</span></label>
                            <input
                                name="fullname"
                                class="form-control"
                                id="fullname"
                                placeholder="example: brotherhood"
                                value="<?= set_value('fullname') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span style="color: red">*</span></label>
                            <input
                                    name="password"
                                    class="form-control"
                                    id="password"
                                    type="password"
                                    placeholder="Input password"
                                    value="<?= set_value('email') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth <span style="color: red">*</span></label>
                            <input
                                name="date_of_birth"
                                class="form-control"
                                id="date_of_birth"
                                type="date"
                                value="<?= set_value('date_of_birth') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label>Gender <span style="color: red">*</span></label>
                            <select name="gender" class="form-select" id="basicSelect" value="<?= set_value('gender') ?>">
                                <option selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number <span style="color: red">*</span></label>
                            <input
                                    name="phone_number"
                                    class="form-control"
                                    id="phone"
                                    placeholder="example: 08146635529"
                                    value="<?= set_value('phone_number') ?>"
                            >
                        </div>
                    </div>
                </div>

                <div class="float-end pt-3">
                    <a
                            type="button"
                            class="btn btn-secondary"
                            href="/admin/employee"
                    >Cancel</a>
                    <button
                            type="submit"
                            class="btn btn-primary"
                    >Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>