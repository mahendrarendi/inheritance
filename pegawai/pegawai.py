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
