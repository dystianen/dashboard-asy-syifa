<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
    <section>
        <form id="myForm" name="myForm" action="<?php echo base_url(); ?>/user/scan/form/submit" method="post" style="visibility:hidden">
            <button id="submit" type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>

    <script type="text/javascript">
        function formAutoSubmit () {
            let frm = document.getElementById("myForm");

            frm.submit();
        }

        window.onload = formAutoSubmit;
    </script>

<?= $this->endSection() ?>