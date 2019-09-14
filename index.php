<?php

require_once './config/database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <title>Data Siswa</title>
    <link rel="shortcut icon" href="" />
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/plugins/datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/plugins/fontawesome-free-5.4.2-web/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal"><i class="fas fa-user title-icon"></i> <a href='index.php'>Data Siswa</a></h5>
        </div>
    </div>

    <div class="container-fluid">
        <?php
        if (empty($_GET['page'])) {
            include 'tampil_data.php';
        } else if ($_GET['page'] == 'tambah') {
            include 'form_tambah.php';
        } else if ($_GET['page'] == 'ubah') {
            include 'form_ubah.php';
        }
        ?>
    </div>

    <div class="container-fluid">
        <footer class="pt-4 my-md-4 pt-md-3 border-top">
            <div class="row">
                <div class="col-12 col-md center">
                    &copy;2019 - <a class="text-info" href="#">Copyright</a>
                </div>
            </div>
        </footer>
    </div>

    <script type='text/javascript' src='assets/js/jquery-3.3.1.min.js'></script>
    <script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='assets/plugins/fontawesome-free-5.4.2-web/js/all.min.js'></script>
    <script type='text/javascript' src='assets/plugins/datepicker/js/bootstrap-datepicker.min.js'></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('.date-picker').datepicker({
                autoclose: true,
                todayHiglight: true
            });
        });

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function getKey(e) {
            if (window.event) {
                return window.event.keyCode;
            } else if (e) {
                return e.which;
            } else {
                return null;
            }
        }

        function goodChars(e, goods, field) {
            var key, keychar;
            key = getKey(e);
            if (key == null) return true;

            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();

            if (goods.indexOf(keyChar) != -1) {
                return true;
            }

            if (key == null || key == 0 || key == 8 || key == 9 || key == 27) {
                return true;
            }

            if (key == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++) {
                    if (field == field.form.elements[i]) break;

                    i = (i + 1) % field.form.elements.length;
                    field.form.elements[i].focus;
                }
                return false;
            }

            return false;
        }

        function validasiFile() {
            var fileInput = document.getElementById('foto');
            var filePath = fileInput.value;
            var fileSize = $('foto')[0].files[0].size;

            var allowedExtensions = /(\.jpg|\.jpeg|\.png)/$ / i;

            if (!allowedExtensions.exec(filePath)) {
                alert("Tipe file foto tidak sesuai, Harap unggah file foto yang memiliki tipe *.jpg atau *.png");
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
                return false;
            } else if (fileSize >= 1000000) {
                alert('Ukuran file foto lebih dari 1 mb. harap unggah file foto yang memiliki ukuran maksimal 1 mb.');
                fileInput.value = '';
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
                return false;
            } else {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataurl(fileInput.files[0]);
                }
            }
        }
    </script>
</body>

</html>