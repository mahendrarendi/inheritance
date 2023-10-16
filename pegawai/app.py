from flask import Flask, render_template

app = Flask(__name__)

class Pegawai:
    def __init__(self, nama, nip, golongan):
        self.nama = nama
        self.nip = nip
        self.golongan = golongan

    def perhitungan_gaji(self):
        # Metode ini akan di-override oleh kelas anak
        pass

class PegawaiTetap(Pegawai):
    def __init__(self, nama, nip, golongan, gaji_pokok):
        super().__init__(nama, nip, golongan)
        self.gaji_pokok = gaji_pokok

    def perhitungan_gaji(self):
        return self.gaji_pokok

class PegawaiHarian(Pegawai):
    def __init__(self, nama, nip, golongan, jam_kerja, upah_per_jam):
        super().__init__(nama, nip, golongan)
        self.jam_kerja = jam_kerja
        self.upah_per_jam = upah_per_jam

    def perhitungan_gaji(self):
        return self.jam_kerja * self.upah_per_jam

class PegawaiKontrak(Pegawai):
    def __init__(self, nama, nip, golongan, lama_kontrak, gaji_bulanan):
        super().__init__(nama, nip, golongan)
        self.lama_kontrak = lama_kontrak
        self.gaji_bulanan = gaji_bulanan

    def perhitungan_gaji(self):
        return self.gaji_bulanan

@app.route('/')
def index():
    pegawai_tetap = PegawaiTetap("Cak Nun", "12345", "A", 5000000)
    pegawai_harian = PegawaiHarian("Ronaldo Wati", "67890", "B", 120, 5000)
    pegawai_kontrak = PegawaiKontrak("Mr Gondrong", "54321", "C", 6, 2000000)
    return render_template('pegawai.html', pegawai_tetap=pegawai_tetap, pegawai_harian=pegawai_harian, pegawai_kontrak=pegawai_kontrak)

if __name__ == '__main__':
    app.run(debug=True)
