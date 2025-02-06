<x-app-layout>
    <x-slot:title>
        User
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>User</h3>
                    <p class="text-subtitle text-muted">List Transaction</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('transactions.search') }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="date" class="form-control form-control-xs" placeholder="Search" name="start_date">
                                            <div class="form-control-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-1 text-center items-center">S/D</div>
                                    <div class="col">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="date" class="form-control form-control-xs" placeholder="Search" name="end_date">
                                            <div class="form-control-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col text-start">
                                        <button class="btn btn-secondary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>SubTotal</th>
                                    <th>Kasir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactionDetails as $transactionDetail)
                                    <tr>
                                        <td class="text-bold-500">{{ $transactionDetail->created_at->diffForHumans() }}</td>
                                        <td>{{ $transactionDetail->product->code }}</td>
                                        <td>{{ $transactionDetail->product->name }}</td>
                                        <td>{{ $transactionDetail->quantity }}</td>
                                        <td>{{ $transactionDetail->product->price }}</td>
                                        <td>{{ $transactionDetail->price }}</td>
                                        <td class="text-capitalize">{{ $transactionDetail->creator->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $transactionDetails->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
