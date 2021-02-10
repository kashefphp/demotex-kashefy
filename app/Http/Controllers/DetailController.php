<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailRequest;
use App\Http\Requests\DetailStoreRequest;
use App\Models\Detail;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DetailController extends Controller
{


    public function getByProduct(Product $product)
    {
        // get all details form product
        $details = [];
        foreach ($product->category->details as $item) {
            $details[] = $item;
        }
        foreach ($product->detailss as $item) {
            $details[] = $item;
        }

        return view('products.details', compact('details'));
    }

    public function getByCategory(ProductCategory $productCategory)
    {
        return view('categories.details', compact('productCategory'));
    }


    public function getKind(Request $request)
    {
        $data = '';
        if (!$request->kind == 'product' || !$request->kind == 'category') {
            return;
        }

        if ($request->kind == 'product') {
            $data = Product::all();
        } elseif ($request->kind == 'category') {
            $data = ProductCategory::all();
        }
        return \Response::json($data);
    }


    public function index()
    {
        $details = Detail::with('detailable')->get();
        return view('details.index', compact('details'));
    }


    public function create()
    {
        return view('details.create');
    }


    public function store(DetailStoreRequest $request)
    {
        $detail = new Detail();
        $detail->key = $request->key;
        $detail->value = $request->value;
        $detail->price = $request->price;
        $detail->detailable_id = $request->kind_id;
        if ($request->kind == 'product') {
            $detail->detailable_type = 'App\Models\Product';
        } elseif ($request->kind == 'category') {
            $detail->detailable_type = 'App\Models\ProductCategory';
        }
        $detail->save();
        if ($detail) {
            alert()->success('Success Message', 'باموفقیت ایجاد شد');
        } else {
            alert()->error('Error Message', 'خطا!');
        }
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Detail $detail
     * @return Response
     */
    public function edit(Detail $detail)
    {
        return view('details.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Detail $detail
     * @return Response
     */
    public function update(Request $request, Detail $detail)
    {
        $validatedData = $request->validate([
            'kind' => ['required', 'string'],
            'key' => ['required', 'string'],
            'price' => ['required'],
            'value' => ['required'],
            'kind_id' => ['required'],
        ]);
        $validatedData['detailable_id']= $validatedData['kind_id'];

        if ($validatedData['kind'] == 'product') {
            $validatedData['detailable_type'] = 'App\Models\Product';
        } elseif ($validatedData['kind'] == 'category') {
            $validatedData['detailable_type'] = 'App\Models\ProductCategory';
        }

        //        unset extra field
        unset($validatedData['kind_id']);
        unset($validatedData['kind']);

        $detail->update($validatedData);
        if ($detail) {
            alert()->success('Success Message', 'باموفقیت بروز شد');
        } else {
            alert()->error('Error Message', 'خطا!');
        }
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Detail $detail
     * @return Response
     */
    public function destroy(Detail $detail)
    {
        $detail->delete();
        if ($detail) {
            alert()->success('Success Message', 'باموفقیت حذف شد');
        } else {
            alert()->error('Error Message', 'خطا!');
        }
        return back();
    }
}
