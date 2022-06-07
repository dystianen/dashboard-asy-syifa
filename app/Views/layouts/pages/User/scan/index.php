<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
    <section>
        <div style="display: flex; justify-content: center; position: relative; text-align: center">
            <div class="card"
                 style="position: absolute; z-index: 2; width: 60%; height: 200px; margin-top: 10em; background: transparent; border: 2px solid #ffffff; border-style: dashed"></div>
            <h5 class="text-center"
                style="position: absolute; font-size: 12px; color: #fff; z-index: 1; width: 100%; margin-top: 31em;">
                Please QR
                Code inside this square</h5>
            <video id="preview" width="100%" style="object-fit: fill; z-index: 0; height: 80vh"></video>
        </div>
    </section>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            mirror: false,
            captureImage: true,
            backgroundScan: true
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                if (!cameras[1]) {
                    scanner.start(cameras[0]);
                } else {
                    scanner.start(cameras[1]);
                }
            } else {
                alert('No cameras found.');
            }
            scanner.addListener('scan', function (content) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Scan Successfully!',
                    showConfirmButton: false,
                    timer: 3000,
                    heightAuto: false,
                }).then(() => {
                    location.replace('<?= base_url(); ?>/user/scan/form')
                })
            });
        }).catch(function (e) {
            alert(e);
            console.error(e);
        });
    </script>

<?= $this->endSection() ?>