<?php

namespace App\Http\Controllers\Backend\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Product\{Brand, Category, Concentration, Product};
use App\Http\Requests\Product\StoreProductRequest;
use App\Services\File;

class ProductController extends Controller
{
    private $filepath = 'public/images/products/';

    public function index(): View
    {
        $collection = Product::latest()->get();

        return view('backend.admin.product.product.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        $brands = Brand::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $concentrations = Concentration::orderBy('name')->get();

        return view('backend.admin.product.product.create', [
            'brands' => $brands, 'categories' => $categories, 'concentrations' => $concentrations
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $hide = $request->input('hide', '0');
        $validated = $request->validated();
        $slug = Str::slug($validated['name']);
        $validated['slug'] = $slug;
        $validated['hide'] = $hide;

        $file = $request->file('img');
        if ($file) {
            $extension = $file->extension();
            $filename = $slug . '.' . $extension;
            File::store($request, $this->filepath, $filename);
            $validated['img'] = $filename;
        }

        Product::create($validated);

        return redirect(route('backend.admins.products.products.index'))->with('message', 'Dodano');
    }

    public function show(Product $product): View
    {
        return view('backend.admin.product.product.show', ['item' => $product]);
    }

    public function edit(Product $product): View
    {
        $brands = Brand::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $concentrations = Concentration::orderBy('name')->get();

        return view('backend.admin.product.product.edit', [
            'item' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'concentrations' => $concentrations
        ]);
    }

    public function update(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $hide = $request->input('hide', '0');
        $validated = $request->validated();
        $slug = Str::slug($validated['name']);
        $validated['slug'] = $slug;
        $validated['hide'] = $hide;
        $file = $request->file('img');
        if ($file) {
            $extension = $file->extension();
            $filename = $slug . '.' . $extension;
            $path = File::update($request, $product->img, $this->filepath, $filename);
            if ($path) {
                $validated['img'] = $filename; // assign new path
            }
        }
        $product->update($validated);

        return redirect(route('backend.admins.products.products.index'))->with('message', 'Zmieniono');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->img) {
            Storage::delete($this->filepath . $product->img);
        }
        $product->delete();

        return redirect(route('backend.admins.products.products.index'))->with('message', 'Usunięto');
    }
}
