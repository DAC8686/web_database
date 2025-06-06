<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<script>
document.querySelectorAll('.btn-bukti, .btn-hapus').forEach(function(btn) {
    btn.addEventListener('click', function() {
        localStorage.setItem('scrollPos', window.scrollY);
    });
});

window.addEventListener('load', function() {
    if(localStorage.getItem('scrollPos')) {
        window.scrollTo(0, localStorage.getItem('scrollPos'));
        localStorage.removeItem('scrollPos');
    }
});
</script>
<body>
    <header>
        <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#porto">portofolio</a></li>
            <li><a href="#opini">Opini</a></li>
            <li>lainnya
                <ul>
                    <li><a href="https://www.instagram.com/d_adhi_c/" target="_blank">instagram</a></li>
                    <li><a href="https://www.tiktok.com/@dimdimasadhic" target="_blank">tik-tok</a></li>
                    <li><a href="https://www.facebook.com/dimas.csw.3?locale=id_ID" target="_blank">facebook</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <div class="uppage">
        <img src="image/image1.jpg" alt="saya 1" id="beranda">
        <div class="item">
            <H2>Halo saya Dimas Adhi</H2>
            <h2>Seorang karir impian yaitu pengembang AI</h2>
        </div>
    </div>
    <div class="container">
        <div class="subitem">
            <h3>Tentang saya</h3>
            <p>saya adalah seorag mahasiswa unugiri semester 2</p>
            <p>saya programer pemula yang baru mempelajari CSS,HTML</p>
        </div>
        <img src="image/image2.jpg" alt="saya 2">   
    </div>
    <div class="forto">
        <h4 id="porto">Portofolio</h4>
        <table>
            <tr>
                <th>no</th>
                <th>Nama kegiatan</th>
                <th>waktu kegiatan</th>
                <th>bukti kegiatan</th>
            </tr>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM portofolio");
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_kegiatan']}</td>
                    <td>{$row['waktu_kegiatan']}</td>
                    <td>
                        <a href='Bukti/{$row['bukti']}' target='_blank'>
                            <button class='btn-bukti'>Lihat bukti</button>
                        </a>
                        <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin menghapus?')\">
                            <button class='btn-hapus'>Hapus</button>
                        </a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
            <form action="tambah.php" method="POST" enctype="multipart/form-data">
                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" required style="width: 95%;">
                    </td>
                    <td>
                        <input type="text" name="waktu_kegiatan" placeholder="Waktu Kegiatan" required style="width: 95%;">
                    </td>
                    <td>
                        <input type="file" name="bukti" required>
                        <button type="submit" name="simpan" class="btn-bukti" style="margin-top:5px;">Simpan</button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
    <div id="modal-confirm" class="modal">
        <div class="modal-content">
            <p>Yakin ingin menghapus?</p>
            <button id="btn-yes" class="btn-hapus">Iya</button>
            <button id="btn-cancel" class="btn-bukti">Batal</button>
        </div>
    </div>
    <div class="opini">
        <h5 id="opini">Opini</h5><hr>
        <div class="opini-item">
            <img src="Bukti/Perpustakaan.jpg" alt="opini-1">
            <p>keseharian di perpustakaan</p>
        </div>
        <div class="opini-item">
            <img src="image/Membaca buku.jpg" alt="opini-2">
            <p>Memulai hobi membaca</p>
        </div>
    </div>
    <div class="contact">
        <h6 id="contact">Hubungi Saya</h6><hr>
        <div class="contact-container">
            <form action="">
                <ul>
                    <li>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="masukkan email anda" required> 
                    </li>
                    <li>
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" placeholder="masukkan nama anda" required>
                    </li>
                    <li>
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="masukkan subject" required>
                    </li>
                    <li>
                        <label for="massage">Isi</label>
                        <textarea name="massage" id="massage" placeholder="Tulis pesan anda" rows="5"required></textarea>
                    </li>
                    <li>
                        <button type="submit" class="btn-submit">Kirim</button>
                    </li>
                </ul>
            </form>
            <div class="map-container">
                <h6>Tempat tinggal saya</h6>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.3380105886413!2d111.73214708376463!3d-7.146435022184065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e777b91f14f9a3d%3A0x989e25ebf468754f!2sArea%20Persawahan%2C%20Sumengko%2C%20Kalitidu%2C%20Bojonegoro%20Regency%2C%20East%20Java%2062152!5e0!3m2!1sen!2sid!4v1745389830296!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
            </div>
        </div>
    </div>
    <footer>
        <p><cite>Copyright &copy; 2023 Dimas Adhi</cite></p>
    </footer>
</body>
</html>