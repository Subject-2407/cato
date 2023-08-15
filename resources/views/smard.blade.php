<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/smard/logo.ico">
    <link rel="stylesheet" href="/css/smard.css">
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/smard.js"></script>
    <title>SMARD - Absensi RFID Real-time</title>
</head>
<body>
    <div id="heading">
        <img src="/img/smard/logo.png">
        <div id="title">
            <h1>S M A R D</h1>
            <h2>Sistem Absensi RFID</h2>
            <br>
            <div id="navbar">
                <div class="btn" id="registrasi">Registrasi</div>
                <div class="btn" id="rfid">Data RFID</div>
                <div class="btn" id="siswa">Data Siswa</div>
                <div class="btn" id="absensi">Data Absensi</div>
            </div>
        </div>
        <img src="/img/smard/rfid.png">
    </div>
    <div id="content">
        <div id="con-registrasi" class="cons">
            <h3>REGISTRASI</h3>
            <hr><br>
            <input type="text" id="rfid-id" name="rfid-id" class="input-field" placeholder="Nomor RFID"><br>
            <input type="text" id="siswa-id" name="siswa-id" class="input-field" placeholder="Nama Siswa"><br>
            <input type="text" id="kelas-id" name="kelas-id" class="input-field" placeholder="Kelas"><br>
            <input type="text" id="nis-id" name="nis-id" class="input-field" placeholder="Nomor Induk Sekolah"><br>
            <p id="notification"></p>
            <button id="selesai">Daftar</button><br>
        </div>
        <div id="con-rfid" class="cons">
            <h3>DATA RFID<h3>
            <hr><br>
            <table class="tables" id="table-rfid">
                <thead>
                    <th>Nomor RFID</th>
                    <th>Terdaftar pada</th>
                </thead>
            </table>
        </div>
        <div id="con-siswa" class="cons">
            <h3>DATA SISWA<h3>
            <hr><br>
            <table class="tables" id="table-siswa">
                <thead>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Nomor RFID</th>
                </thead>
                <tr>
                    <td>20.7.0700</td>
                    <td>Tomi Sudarsono</td>
                    <td>IX A</td>
                    <td>24ec9d684400</td>
                </tr>
                <tr>
                    <td>20.7.0701</td>
                    <td>Salma Atika Putri</td>
                    <td>IX A</td>
                    <td>41712ea656380</td>
                </tr>
                <tr>
                    <td>20.7.0702</td>
                    <td>Muhammad Zulkifli</td>
                    <td>IX A</td>
                    <td>b196f71d</td>
                </tr>
            </table>
        </div>
        <div id="con-absensi" class="cons">
            <h3>DATA ABSENSI<h3>
            <hr><br>
            <table class="tables" id="table-absensi">
                <thead>
                    <th>Nama Siswa</th>
                    <th>Nomor RFID</th>
                    <th>Tanggal & Waktu Absensi</th>
                </thead>
                <tr>
                    <td>Tomi Sudarsono</td>
                    <td>24ec9d684400</td>
                    <td>16 March 2023 06:39 AM</td>
                </tr>
                <tr>
                    <td>Muhammad Zulkifli</td>
                    <td>b196f71d</td>
                    <td>16 March 2023 06:24 AM</td>
                </tr>
                <tr>
                    <td>Salma Atika Putri</td>
                    <td>41712ea656380</td>
                    <td>16 March 2023 06:01 AM</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>