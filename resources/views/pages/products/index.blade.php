<x-app-layout>
    <x-slot:title>
        Product
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Barang</h3>
                    <p class="text-subtitle text-muted">List Barang</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('products.search') }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="text" class="form-control form-control-xs" placeholder="Search" name="search">
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
                        <div class="col">
                            <a href="{{ route('products.create') }}" class="btn btn-primary float-end">Tambah Barang</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-bold-500">{{ $product->code }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product) }}" class="text-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger border-0 bg-transparent" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?');">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
