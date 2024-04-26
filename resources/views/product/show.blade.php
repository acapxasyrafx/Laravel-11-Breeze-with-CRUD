<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Show Product</h1>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <hr />
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Name : </label>
                                <label class="form-label">{{$products->name}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Price (RM) : </label>

                                <label class="form-label">{{$products->price}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Details : </label>

                                <label class="form-label">{{$products->details}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label"><strong>Publish : </strong></label>
                                <label class="form-label">
                                    @if ($products->status_publish === 0)
                                        Yes
                                    @elseif ($products->status_publish === 1)
                                        No
                                    @else
                                        No
                                    @endif
                                </label>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
