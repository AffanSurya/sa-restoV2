<x-layout>
    <x-slot:title>Edit Menu 1</x-slot:title>
    <x-slot:user>{{ $user->name }}</x-slot:user>
    <x-slot:role>{{ $user->role }}</x-slot:role>



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Item di Menu</h1>

        <div class="col-lg-7 m-auto">
            <div class="card p-3 shadow-lg">
                <div class="card-body">

                    {{-- error alert --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('menuItem1.store') }}" method="POST" class="user">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nama Item</label>
                            <input type="text" class="form-control form-control-user" id="name" name="name"
                                placeholder="Nama Item" required value="{{ $menuItem->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control form-control-user" id="description" name="description" rows="3" required>{{ $menuItem->description }}</textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control form-control-user" id="price"
                                    name="price" placeholder="hanya angka" required value="{{ $menuItem->price }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="category">Kategori</label>
                                <input type="text" class="form-control form-control-user" id="category"
                                    name="category" placeholder="kategori" required value="{{ $menuItem->category }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">URL Gambar</label>
                            <input type="url" class="form-control form-control-user" id="image" name="image"
                                placeholder="URL Gambar" required value="{{ $menuItem->image }}">
                        </div>

                        <button type="reset" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Reset</span>
                        </button>

                        <button type="submit" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Edit</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
