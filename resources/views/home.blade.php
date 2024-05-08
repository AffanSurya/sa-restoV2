<x-layout>
    <x-slot:title>Home</x-slot:title>
    <x-slot:user>{{ $user->name }}</x-slot:user>
    <x-slot:role>{{ $user->role }}</x-slot:role>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Home Page</h1>

    </div>
    <!-- /.container-fluid -->

</x-layout>
