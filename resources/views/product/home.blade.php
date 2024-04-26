<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Product</h1>
                        <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
                    </div>
                    <hr />
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0"></h1>
                        <form action="{{ route('products.search') }}" method="GET">
                            <div>
                                <label for="search">Search:</label>
                                <input type="text" name="search" id="search" placeholder="Enter product name">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price (RM) </th>
                                <th>Details</th>
                                <th>Publish</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $product->name }}</td>
                                    <td class="align-middle">{{ $product->price }}</td>
                                    <td class="align-middle">{{ $product->details }}</td>
                                    <td class="align-middle">
                                        @if ($product->status_publish === 0)
                                            Yes
                                        @elseif ($product->status_publish === 1)
                                            No
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <a href="{{ route('products.show', ['id' => $product->id]) }}" type="button"
                                                class="btn btn-info">Show</a>
                                            <a href="{{ route('products.edit', ['id' => $product->id]) }}" type="button"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('products.delete', ['id' => $product->id]) }}"
                                                type="button" class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">Product not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
