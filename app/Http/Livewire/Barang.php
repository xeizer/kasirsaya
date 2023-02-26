<?php

namespace App\Http\Livewire;

use App\Models\Barang as ModelsBarang;
use Livewire\Component;

class Barang extends Component
{
    public $barcode, $namabarang, $stok, $harga, $barangyangdiedit;
    public function simpan()
    {
        if ($this->barangyangdiedit) {
            $simpan = $this->barangyangdiedit;
        } else {
            $simpan = new ModelsBarang();
        }
        $simpan->barcode = $this->barcode;
        $simpan->name = $this->namabarang;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();
        $this->reset();
    }
    public function edit($id)
    {

        $this->barangyangdiedit = ModelsBarang::find($id);
        $this->barcode = $this->barangyangdiedit->barcode;
        $this->namabarang = $this->barangyangdiedit->name;
        $this->stok = $this->barangyangdiedit->stok;
        $this->harga = $this->barangyangdiedit->harga;
    }
    public function hapus($id)
    {
        ModelsBarang::find($id)->delete();
        $this->reset();
    }
    public function render()
    {
        return view('livewire.barang', [
            'datas' => ModelsBarang::all()
        ]);
    }
}
