<x-app-layout>
    <x-slot:title>
        Barang
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Transaksi</h3>
                    <p class="text-subtitle text-muted">Transaksi Barang</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('transactions.add-to-chart') }}" method="POST">
                                @csrf
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="text" class="form-control form-control-lg" placeholder="Kode Barang" name="code">
                                    <div class="form-control-icon">
                                        <i class="bi bi-code"></i>
                                    </div>
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="number" class="form-control form-control-lg" placeholder="Jumlah Barang" name="product_quantity">
                                    <div class="form-control-icon">
                                        <i class="bi bi-tag"></i>
                                    </div>
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-md shadow-md mt-2">Tambah Ke Keranjang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('transactions.store') }}" method="POST">
                                @csrf
                                <div class="table-responsive mb-4">
                                    <table class="table mb-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Sub Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactionDetails as $transactionDetail)
                                                <tr>
                                                    <td class="text-bold-500">{{ $transactionDetail->product->code }}</td>
                                                    <td class="text-bold-500">{{ $transactionDetail->product->name }}</td>
                                                    <td>{{ $transactionDetail->quantity }}</td>
                                                    <td class="text-capitalize">{{ $transactionDetail->product->price }}</td>
                                                    <td class="text-capitalize">{{ $transactionDetail->price }}</td>
                                                    <td>
                                                        <button type="button" class="text-danger border-0 bg-transparent" onclick="deleteTransaction('{{ route('transactions.remove-from-chart', $transactionDetail) }}')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $transactionDetails->links() }}
                                </div>

                                <input type="hidden" name="quantity" value="{{ $transactionDetails->sum('quantity') }}">

                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="text" class="form-control form-control-lg" placeholder="Total" name="total_price" value="{{ $total }}" readonly>
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    @error('total_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="number" class="form-control form-control-lg" placeholder="Bayar" name="paid" id="paid">
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    @error('paid')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="number" class="form-control form-control-lg" placeholder="Kembalian" name="change" id="change" readonly>
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    @error('change')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary btn-md shadow-md mt-2">Simpan & Cetak Struk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</x-app-layout>
<script>
    document.getElementById('paid').addEventListener('input', function() {
        const paid = document.getElementById('paid').value;
        const total = document.querySelector('input[name="total_price"]').value;
        const change = paid - total;
        document.getElementById('change').value = change;
    });

    function deleteTransaction(url) {
        if (confirm('Apakah Anda yakin ingin menghapus ini?')) {
            let form = document.getElementById('delete-form');
            form.action = url;
            form.submit();
        }
    }
</script>
