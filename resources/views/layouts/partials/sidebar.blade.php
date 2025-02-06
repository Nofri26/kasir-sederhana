<x-mazer-sidebar :href="route('dashboard')" logo="asset('static/images/logo/logo.png')">
    <x-mazer-sidebar-item icon="bi bi-grid-fill" :link="route('dashboard')" name="Dashboard" />
    <x-mazer-sidebar-item icon="bi bi-box" :link="route('products.index')" name="Data Barang" />
    <x-mazer-sidebar-item icon="bi bi-people" :link="route('users.index')" name="Data User" />
    <x-mazer-sidebar-item icon="bi bi-cart" :link="route('transactions.create')" name="Transaksi" />
    <x-mazer-sidebar-item icon="bi bi-journals" :link="route('transactions.index')" name="Laporan" />
    <x-mazer-sidebar-item icon="bi bi-door-open" :link="route('destroy')" name="Logout" />
</x-mazer-sidebar>
