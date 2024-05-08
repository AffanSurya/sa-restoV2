<x-layout>
    <x-slot:title>Edit Menu 1</x-slot:title>
    <x-slot:user>{{ $user->name }}</x-slot:user>
    <x-slot:role>{{ $user->role }}</x-slot:role>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Menu Item 1</h1>

        <a href="{{ route('menuItem1.create') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Tambah Item</span>
        </a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                <b>Yeay </b>{{ session('success') }}
            </div>
        @endif

        <!-- Content Row -->
        <div class="row mt-3">

            @foreach ($menuItems as $item)
                <div class="card mb-4 py-3 mr-3 border-bottom-primary">
                    <div class="card-body">
                        <img src="{{ $item->image }}" alt="Image" width="250" height="200">
                        <h5 class="card-title mt-2">{{ $item->name }}</h5>
                        <p class="card-text">{{ Str::limit($item->description, 30, '...') }}</p>
                        <p class="card-text">Kategori: {{ $item->category }}</p>
                        <p class="card-text">Harga: Rp{{ intval($item->price) }}</p>

                        <div class="d-flex">
                            <form action="{{ route('menuItem1.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </button>
                            </form>

                            <a href="{{ route('menuItem1.edit', $item->id) }}"
                                class="btn btn-warning ml-5 btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- /.container-fluid -->
</x-layout>
