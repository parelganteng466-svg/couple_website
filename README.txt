# 🌸 Couple Website — Farel & Zahro
## Cara Pakai di XAMPP/Laragon

---

### 📁 Struktur Folder

```
couple_website/
├── index.php          ← Halaman utama (yang dilihat Zahro)
├── data.json          ← Tempat nyimpan semua data/konten
├── uploads/           ← Folder foto (otomatis dibuat)
├── admin/
│   └── index.php      ← Halaman admin buat edit konten
└── README.txt         ← File ini
```

---

### 🚀 Cara Setup

1. **Copy folder `couple_website`** ke:
   - XAMPP: `C:\xampp\htdocs\couple_website\`
   - Laragon: `C:\laragon\www\couple_website\`

2. **Jalankan Apache** di XAMPP/Laragon

3. **Buka di browser:**
   - Halaman utama: `http://localhost/couple_website/`
   - Halaman admin: `http://localhost/couple_website/admin/`

---

### 🔐 Login Admin

- **Password default:** `peyek123`
- Untuk ganti password, buka `admin/index.php`, cari baris:
  ```php
  define('ADMIN_PASSWORD', 'peyek123');
  ```
  Ganti `peyek123` dengan password baru kamu.

---

### ✏️ Cara Edit Konten

Buka `http://localhost/couple_website/admin/` lalu login.

Di dalam admin ada 4 tab:

| Tab | Fungsi |
|-----|--------|
| ✏️ Teks & Konten | Edit nama, nickname, deskripsi |
| 📸 Foto | Upload, hapus, atur urutan foto |
| 💬 Quote | Edit kata-kata romantis |
| 💌 Penutup | Edit bagian penutup & footer |

---

### 📸 Upload Foto

1. Masuk admin → tab **Foto**
2. Klik area upload atau drag foto
3. Bisa pilih banyak foto sekaligus
4. Klik tombol **Upload Foto**

Foto akan otomatis muncul di galeri halaman utama!

---

### 💡 Tips

- Foto terbaik buat galeri: ukuran portrait (tinggi lebih dari lebar)
- Klik foto di galeri utama → bisa fullscreen
- Admin bisa dibuka dari mana saja selama di jaringan yang sama
- Kalau mau online, upload semua file ini ke hosting PHP biasa

---

Made with 💕 untuk Farel & Zahro
