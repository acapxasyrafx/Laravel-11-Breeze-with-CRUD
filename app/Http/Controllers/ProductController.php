<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return view('product.home', compact(['products', 'total']));
    }

    public function show($id): View
    {
        $products = Product::findOrFail($id);
        return view('product.show', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', "%$search%")->get();
        return view('product.home', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'status_publish' => 'required',
        ]);
        $data = Product::create($validation);
        if ($data) {
            session()->flash('success', 'Product Add Successfully');
            return redirect(route('products.index'));
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect(route('products.create'));
        }
    }
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('product.update', compact('products'));
    }

    public function delete($id)
    {
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Product Deleted Successfully');
            return redirect(route('products.index'));
        } else {
            session()->flash('error', 'Product Not Delete successfully');
            return redirect(route('products.index'));
        }
    }

    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $name = $request->name;
        $details = $request->details;
        $price = $request->price;
        $status_publish = $request->status_publish;

        $products->name = $name;
        $products->details = $details;
        $products->price = $price;
        $products->status_publish = $status_publish;
        $data = $products->save();
        if ($data) {
            session()->flash('success', 'Product Update Successfully');
            return redirect(route('products.index'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('products.update'));
        }
    }
}
