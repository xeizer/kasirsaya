<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Semuatransaksi;
use Livewire\Component;

class Transaksi extends Component
{
    public $barcode, $jumlah, $barang, $daftarbarangdibeli, $status, $pelanggan;
    public $catatan;
    public function transaksibaru()
    {
        $this->status = 'BARU';
        $this->pelanggan = rand();
    }
    public function caribarang()
    {
        $caribarang = Barang::where('barcode', $this->barcode)->first();
        if ($caribarang) {
            $this->barang = $caribarang;
        } else {
            $this->reset('barang');
            $this->catatan = 'Tidak Ditemukan';
        }
    }
    public function tambahkan()
    {
        $tambahkan = new Semuatransaksi();
        $tambahkan->pelanggan = $this->pelanggan;
        $tambahkan->id_barang = $this->barang->id;
        $tambahkan->jumlah = $this->jumlah;
        $tambahkan->total = $this->jumlah * $this->barang->harga;
        $tambahkan->save();
        $this->barang->stok = $this->barang->stok - $this->jumlah;
        $this->barang->save();
    }
    public function selesai()
    {
        $this->reset();
    }
    public function batal()
    {
        $hapus = Semuatransaksi::where('pelanggan', $this->pelanggan)->delete();
        $this->reset();
    }
    public function hapus($id)
    {
        $hapus = Semuatransaksi::find($id);
        $kembalikanstok = Barang::find($hapus->id_barang);
        $kembalikanstok->stok = $kembalikanstok->stok + $hapus->jumlah;
        $kembalikanstok->save();
        $hapus->delete();
        $this->reset(['barcode', 'barang']);
    }
    public function render()
    {
        return view('livewire.transaksi', [
            'datas' => Semuatransaksi::where('pelanggan', $this->pelanggan)->get(),
            'totalsemua' => Semuatransaksi::where('pelanggan', $this->pelanggan)->sum('total'),
        ]);
    }
}
