# TALK ZONE – Platform Konseling Daring (KONSELINK)

Repository ini berisi source code website **Talk Zone** dengan fitur utama layanan pendaftaran konseling bernama **Konselink**.  
Project dikembangkan menggunakan **PHP (tanpa framework besar)**, HTML, CSS, dan JavaScript sederhana.

---

## 1. Tujuan & Gambaran Umum

Talk Zone dirancang sebagai platform:

- Pendampingan psikologis awal bagi pelajar dan remaja.
- Media untuk menyampaikan keluhan/curhat, mendaftar konseling, mengikuti tes psikologi sederhana, dan berdiskusi di forum.
- Alat bantu koordinasi antara **konselor/guru BK/psikolog**, siswa/klien, dan pihak sekolah/lembaga.

Layanan Talk Zone **bukan** layanan darurat medis/psikiatri dan **tidak menggantikan** konsultasi langsung dengan profesional kesehatan jiwa.

---

## 2. Struktur Folder Project

Struktur utama sesuai direktori saat ini:

```text
KONSELINK/
├─ After-login/
│  ├─ dashboard/
│  │  ├─ dashboard.php
│  │  └─ dashboarde.css
│  └─ fitur/
│     ├─ daftar_konseling_style.css
│     ├─ daftar_konseling.php
│     ├─ edit_jadwal.php
│     ├─ jadwal_konseling.php
│     ├─ jadwal_script.js
│     └─ jadwal.css
│
├─ Config/
│  └─ ... (konfigurasi koneksi database, dsb.)
│
├─ konselink/
│  ├─ fitur/
│  │  ├─ ddd.png
│  │  ├─ fitur.css
│  │  ├─ fitur.php
│  │  └─ (berbagai file ilustrasi PNG)
│  │
│  ├─ form login/
│  │  ├─ login.php
│  │  ├─ register.php
│  │  ├─ style.css
│  │  └─ (screenshot pendukung)
│  │
│  ├─ forumm/
│  │  ├─ forum.php
│  │  └─ forum.css
│  │
│  ├─ home page/
│  │  ├─ hp.php
│  │  ├─ hp.css
│  │  └─ gambar burung flamin.png
│  │
│  ├─ info/
│  │  ├─ info.php
│  │  ├─ info.css
│  │  └─ ilustrasi animasi 3d.png
│  │
│  ├─ Jadwal/
│  │  ├─ jadwal.php
│  │  └─ jadwal.css
│  │
│  ├─ tes/
│  │  ├─ tes.php
│  │  └─ tes.css
│  │
│  ├─ artikel/
│  │  ├─ art.php
│  │  └─ art.css
│  │
│  ├─ contact us/
│  │  ├─ contact.php
│  │  └─ contact.css
│  │
│  └─ curon/
│     ├─ curon.php
│     └─ curon.css
│
└─ README.md   # dokumen ini
