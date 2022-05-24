<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <div class="text-center">
        <h3 class="greeting"></h3>
        <span style="color: gray">Resep kesuksesan adalah bekerja keras dan pantang menyerah. Selamat bekerja!</span>
    </div>
</section>

<section class="mt-4">
    <div class="row">
        <div class="col">
            <a class="card card-menu stretched-link text-decoration-none" href="/user/absent">
                <div class="card-body text-center">
                    <div class="column justify-content-center">
                        <i class="bi bi-box-arrow-in-right mt-1 mr-3" style="font-size: 32px; color: #6610f2"></i>
                        <h5 class="title text-center m-0 pt-3" style="color: #5e5e5e">Check In</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="card card-menu stretched-link text-decoration-none" href="/user/report">
                <div class="card-body text-center">
                    <div class="column justify-content-center">
                        <i class="bi bi-box-arrow-left mt-1 mr-3" style="font-size: 32px; color: #6610f2"></i>
                        <h5 class="title text-center m-0 pt-3" style="color: #5e5e5e">Check Out</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <a class="card card-menu stretched-link text-decoration-none" href="/user/task">
                <div class="card-body text-center">
                    <div class="column justify-content-center">
                        <i class="bi bi-list-task mt-1 mr-3" style="font-size: 32px; color: #6610f2"></i>
                        <h5 class="title text-center m-0 pt-3" style="color: #5e5e5e">Daily Task</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="card card-menu stretched-link text-decoration-none" href="/user/profile">
                <div class="card-body text-center">
                    <div class="column justify-content-center">
                        <i class="bi bi-file-person mt-1 mr-3" style="font-size: 32px; color: #6610f2"></i>
                        <h5 class="title text-center m-0 pt-3" style="color: #5e5e5e">Profile</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        function dateTime() {
            var ndate = new Date();
            var hours = ndate.getHours();
            var message = hours < 12 ? `Good Morning, <?= session()->get('fullname') ?>` : hours < 18 ? `Good Afternoon, <?= session()->get('fullname') ?>` : `Good Evening, <?= session()->get('fullname') ?>`;
            $(".greeting").text(message);
        }

        setInterval(dateTime, 100);
    });
</script>
<?= $this->endSection() ?>