<?php

namespace App\Http\Controllers\Backend\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Brand\StoreRequest;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(): View
    {
        $collection = Brand::all();

        return view('backend.admin.product.brand.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        return view('backend.admin.product.brand.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();        
        // $validated['slug'] = Str::slug($validated['name']);
        Brand::create($validated);
        
        return redirect(route('backend.admins.products.brands.index'))->with('message', 'Dodano');
    }

    public function show(Brand $brand): View
    {
        return view('backend.admin.product.brand.show', ['item' => $brand]);
    }

    public function edit(Brand $brand): View
    {
        return view('backend.admin.product.brand.edit', ['item' => $brand]);
    }

    public function update(StoreRequest $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validated();
        $brand->update($validated);
        
        return redirect(route('backend.admins.products.brands.index'))->with('message', 'Zmieniono');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect(route('backend.admins.products.brands.index'))->with('message', 'Usunięto');
    }
}
