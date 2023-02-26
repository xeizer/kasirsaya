<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Barcode</label>
                        <input type="text" class="form-control" wire:model='barcode'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nmaa Barang</label>
                        <input type="text" class="form-control" wire:model='namabarang'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="text" class="form-control" wire:model='harga'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">stok</label>
                        <input type="text" class="form-control" wire:model='stok'>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" wire:click='simpan'>SIMPAN</button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>BARCODE</th>
                                    <th>NAMA</th>
                                    <th>HARGA</th>
                                    <th>STOK</th>
                                    <th>AKSI</th>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->barcode }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td><button wire:click="edit('{{ $item->id }}')">EDIT</button>
                                                <button wire:click="hapus('{{ $item->id }}')">HAPUS</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
