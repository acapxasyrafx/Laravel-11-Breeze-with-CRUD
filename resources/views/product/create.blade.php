<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Add Product</h1>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif

                    <form action="{{ route('products.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputName" class="form-label"><strong>Name : </strong></label>
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputPrice" class="form-label"><strong>Price (RM) : </strong></label>
                                <input type="text" name="price" class="form-control" placeholder="Price">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputDetails" class="form-label"><strong>Details : </strong></label>
                                <input type="text" name="details" class="form-control" placeholder="Details">
                                @error('details')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputPublish" class="form-label"><strong>Publish : </strong></label>
                                <input type="radio" name="status_publish" value="0">Yes</input>
                                <input type="radio" name="status_publish" value="1">No</input>
                                @error('status_publish')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
