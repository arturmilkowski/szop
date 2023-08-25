<?php

namespace App\Http\Controllers\Backend\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
// use App\Http\Services\File;
use App\Models\Product\{Brand, Category, Concentration, Product};
use App\Http\Requests\Product\StoreProductRequest;
use App\Services\File;

class ProductController extends Controller
{
    public function index(): View
    {
        $collection = Product::all();

        return view('backend.admin.product.product.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        $brands = Brand::all();
        $categories = Category::all();
        $concentrations = Concentration::all();

        return view('backend.admin.product.product.create', [
            'brands' => $brands, 'categories' => $categories, 'concentrations' => $concentrations
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $hide = $request->input('hide', '0');
        // $validated = $request->validated();
        $validated = $request->validated();
        $slug = Str::slug($validated['name']);
        $validated['slug'] = $slug;
        $validated['hide'] = $hide;
        
        $file = $request->file('img');
        if ($file) {
            // dd($file);
            $extension = $file->extension();
            // $filename = $request->file('img')->storeAs('public/images/products', $slug . '.' . $extension);
            $filename = $slug . '.' . $extension;
            // dd($path);
            $path = 'public/images/products';
            $path = File::store($request, $path, $filename);
            // dd($path);
            $validated['img'] = $path;
        }
        
        Product::create($validated);
        
        return redirect(route('backend.admins.products.products.index'))->with('message', 'Dodano');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('backend.admin.product.product.show', ['item' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('backend.admin.product.product.edit', ['item' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);
        $product->update($validated);
        
        return redirect(route('backend.admins.products.products.index'))->with('message', 'Zmieniono');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect(route('backend.admins.products.products.index'))->with('message', 'Usunięto');
    }
}
