<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kartu Keluarga</title>
</head>
<body>
    <h1>Form Kartu Keluarga</h1>

    <form action="/simpanKK" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="no_kk">Nomor KK:</label>
        <input type="text" id="no_kk" name="no_kk" required maxlength="16">

        <label for="nama_kk">Nama KK:</label>
        <input type="text" id="nama_kk" name="nama_kk" required>

        <label for="alamat">Alamat:</label>
        <select id="alamat" name="alamat" required>
            <option value="Dusun 1">Dusun 1</option>
            <option value="Dusun 2">Dusun 2</option>
        </select>

        <label for="rt">RT:</label>
        <input type="number" id="rt" name="rt" required min="1" max="20">

        <label for="rw">RW:</label>
        <input type="number" id="rw" name="rw" required min="1" max="5">

        <label for="scan_kk">Scan KK (PDF):</label>
        <input type="file" id="scan_kk" name="scan_kk" accept=".pdf">

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
