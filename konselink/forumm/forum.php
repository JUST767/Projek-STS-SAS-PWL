<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi | Talk Zone</title>
    <link rel="stylesheet" href="forum.css">
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
    
    <section class="forum-header">
        <h1>Forum<br>Diskusi</h1>
    </section>

    
    <section class="kategori-section">
        <span class="kategori-label">kategori</span>
        <div class="kategori-buttons">
            <button type="button" class="pill active">Anak anak</button>
            <button type="button" class="pill">Remaja</button>
        </div>
    </section>

    
    <section class="input-section">
        <form id="formPesan">
            <div class="input-wrapper">
                <textarea id="teksPesan" placeholder="Tulis pesanmu di sini..."></textarea>
                <button type="submit" class="btn-send" title="Kirim">
                    ✈
                </button>
            </div>
        </form>
    </section>

    
    <section id="daftarPesan" class="pesan-list">
        
        <article class="pesan-card">
            <div class="pesan-username">Username</div>
            <div class="pesan-body">
                Ini contoh pesan pertama di forum diskusi.
            </div>
        </article>
        <article class="pesan-card">
            <div class="pesan-username">Username</div>
            <div class="pesan-body">
                Pesan kedua sebagai contoh tampilan.
            </div>
        </article>
        <article class="pesan-card">
            <div class="pesan-username">Username</div>
            <div class="pesan-body">
                Kamu bisa menambahkan pesanmu sendiri lewat kolom abu-abu di atas.
            </div>
        </article>
    </section>
</main>


<script>
document.getElementById('formPesan').addEventListener('submit', function (e) {
    e.preventDefault(); 

    const textarea = document.getElementById('teksPesan');
    const isi = textarea.value.trim();

    if (!isi) return; 

    
    const card = document.createElement('article');
    card.className = 'pesan-card';

    const username = document.createElement('div');
    username.className = 'pesan-username';
    username.textContent = 'Username'; 

    const body = document.createElement('div');
    body.className = 'pesan-body';
    body.textContent = isi;

    card.appendChild(username);
    card.appendChild(body);

    
    document.getElementById('daftarPesan').appendChild(card);

    textarea.value = '';
});
</script>
</body>
</html>
