  <!DOCTYPE html>
  <html lang="id">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Curhat Online | TALK ZONE</title>
      <link rel="stylesheet" href="curon.css">
  </head>
  <body>

      <header>
      

      <div class="logo">
        <img src="Screenshot_2025-09-06_143612-removebg-preview.png" alt="Talk Zone Logo" width="50">
        <span>Talk Zone</span>
      </div>
      <nav>
        <a href="#">Home</a>
        <a href="#">Fitur</a>
        <a href="#">Artikel</a>
        <a href="#">Contact us</a>
      </nav>     
      <a href="../form login/login.html" class="btn-login">Login/Register</a>
    </header>

    <main class="page">
        <h1 class="page-title">Curhat Online</h1>

        <form class="curhat-form" action="#" method="post">
            
            <div class="form-row">
                <label for="nama-asli">Nama Asli</label>
                <div class="field-with-note">
                    <input type="text" id="nama-asli" name="nama_asli">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="sembunyi-nama" name="sembunyi_nama">
                        <span class="custom-checkbox"></span>
                        <span class="checkbox-text">Jangan Ditampilkan Nama Asli Saya</span>
                    </label>
                </div>
            </div>

            
            <div class="form-row">
                <label for="nama-samaran">Nama Samaran</label>
                <input type="text" id="nama-samaran" name="nama_samaran">
            </div>

            
            <div class="form-row">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="Laki-laki">
                        <span class="custom-radio male"></span>
                        <span class="radio-text male-text">Laki - Laki</span>
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="gender" value="Perempuan">
                        <span class="custom-radio female"></span>
                        <span class="radio-text female-text">Perempuan</span>
                    </label>
                </div>
            </div>

            
            <div class="form-row">
                <label for="usia">Usia</label>
                <input type="number" id="usia" name="usia">
            </div>

            
            <div class="form-row">
                <label for="kota">Kota Domisili</label>
                <input type="text" id="kota" name="kota">
            </div>

            
            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            
            <div class="form-row">
                <label for="isi-curhat">Isi Curhat</label>
                <textarea id="isi-curhat" name="isi_curhat" rows="10"></textarea>
            </div>

            
            <div class="submit-row">
                <button type="submit" class="btn-submit">Submit</button>
            </div>
        </form>
    </main>
</body>
</html>
