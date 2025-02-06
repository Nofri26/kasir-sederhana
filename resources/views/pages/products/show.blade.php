<x-app-layout>
    <x-slot:title>
        Barang
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Barang</h3>
                    <p class="text-subtitle text-muted">Edit Barang</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg" placeholder="Kode" name="code" value="{{ $product->code }}">
                            <div class="form-control-icon">
                                <i class="bi bi-upc"></i>
                            </div>
                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg" placeholder="Nama" name="name" value="{{ $product->name }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" class="form-control form-control-lg" placeholder="Harga" name="price" value="{{ $product->price }}">
                            <div class="form-control-icon">
                                <i class="bi bi-tag"></i>
                            </div>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-md shadow-md mt-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
