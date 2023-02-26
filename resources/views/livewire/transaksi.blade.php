<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <button class="btn btn-primary" wire:click='transaksibaru'>TRANSAKSI BARU</button>
                    </div>
                    @if ($status == 'BARU')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Barcode</label>
                            <input type="text" class="form-control" wire:model='barcode'>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" wire:click='caribarang'>CEK</button>
                        </div>
                        <hr />
                        @if ($barang)
                            Nama Barang : {{ $barang->name }}<br />
                            Harga : {{ $barang->harga }}<br />
                            Stok : {{ $barang->stok }}<br />
                            Jumlah : <input type="number" min="1" value="1" wire:model='jumlah' />
                            <button class="btn btn-primary" wire:click='tambahkan'
                                @if ($jumlah > $barang->stok) disabled @endif>TAMBAH</button>
                        @endif
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>BARANG</th>
                                    <th>HARGA SATUAN</th>
                                    <th>JUMLAH</th>
                                    <th>SUB TOTAL</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $item)
                                    <tr>
                                        <td>{{ $item->barang->name }}</td>
                                        <td>{{ $item->barang->harga }}N</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td><button class="btn btn-sm btn-danger"
                                                wire:click="hapus('{{ $item->id }}')">X</button></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td>{{ $totalsemua }}</td>
                                    <td><button class="btn btn-info" wire:click='selesai'>SELESAI</button> <button
                                            class="btn btn-secondary" wire:click='batal'>BATAL</button></td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
</div>
