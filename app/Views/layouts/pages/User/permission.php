<!DOCTYPE html>
<!-- <html lang="en" style="background-color: #e3e8ee;"> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Absensi Karyawan</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/shared/iconly.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/fc-4.0.2/r-2.2.9/sb-1.3.2/sp-2.0.0/datatables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }

        *:focus {
            background-color: rgba(67, 94, 190, 0.2);
            outline: none;
        }

        html,
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            width: 100%;
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        header {
            width: 100%;
            padding: .4rem 0 0;
        }

        .menu {
            padding: .4rem 2rem;
        }

        section {
            max-width: 100%;
            padding: 2rem 1.75rem 1rem 1.75rem;
        }

        section h1 {
            margin-bottom: 2.5rem;
        }

        section h2 {
            font-size: 120%;
            line-height: 2.5rem;
            padding-top: 1.5rem;
        }

        section pre {
            background-color: rgba(247, 248, 249, 1);
            border: 1px solid rgba(242, 242, 242, 1);
            display: block;
            font-size: .9rem;
            margin: 2rem 0;
            padding: 1rem 1.5rem;
            white-space: pre-wrap;
            word-break: break-all;
        }

        section code {
            display: block;
        }

        section a {
            color: rgba(221, 72, 20, 1);
        }

        section svg {
            margin-bottom: -5px;
            margin-right: 5px;
            width: 25px;
        }

        .card-menu {
            display: flex;
            align-items: center;
            height: 100%;
            margin: 0;
            border: none;
            border-radius: 10px;
            box-shadow: 11px 11px 22px #ebebeb,
                -11px -11px 22px #ffffff;
        }

        .card-menu:hover {
            cursor: pointer;
            box-shadow: 20px 20px 60px #d9d9d9,
                -20px -20px 60px #ffffff;
        }

        .card-img {
            height: 400px;
        }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .card-img {
                height: 400px;
            }

            .img-checkin {
                height: 300px;
            }

            .title {
                font-size: 14px;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .card-img {
                height: 400px;
            }

            .img-checkin {
                height: 300px;
            }

            .title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a href="/user" class="navbar-brand"><i class="bi bi-alarm" style="font-size: 26px;"></i> <span style="font-size: 26px; font-weight: bold">Absensi</span></a>
                    <div class="justify-content-end">
                        <h5 style="font-size: 16px; margin: 0">Brotherhood</h5>
                        <span style="font-size: 14px; color: gray; margin: 0">Project Manager</span>
                    </div>
                </div>
            </nav>
        </header>

        <section>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label class="form-label" for="category">Category <span style="color: red">*</span></label>
                            <select name="category" class="form-select" id="basicSelect">
                                <option value="">--please select--</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                                <option value="Cuti">Cuti</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nik">Reason <span style="color: red">*</span></label>
                            <textarea name="reason" class="form-control" placeholder="example: Covid-19"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="upload">Upload Proof <span style="color: red">*</span></label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>
                        <div class="mt-4">
                            <a class="btn btn-secondary" href="/user/absent">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>