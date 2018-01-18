<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use Core\ProductCreator;
use Core\ProductModifier;
use Core\ProductRetriever;
use \Illuminate\Support\Facades\DB;
use Exception;
use App\Product;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    public function listProducts()
    {
        $products = Product::all();

        return response($products);

    }

    public function createProduct(CreateProductRequest $request, ProductCreator $creator)
    {
        $dto = $request->getProductDto();

        DB::beginTransaction();
        try {
            $product = $creator->createProduct($dto);
            $product->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response($product, Response::HTTP_CREATED);
    }

    public function getProduct($productId)
    {
        $prod = Product::find($productId);

        return response($prod);
    }

    public function updateProduct(UpdateProductRequest $request, ProductRetriever $retriever, ProductModifier $modifier, int $productId)
    {
        $product = $retriever->retrieveById($productId);
        $dto = $request->getProductDto();

        DB::beginTransaction();
        try {
            $modifier->modifyProduct($product, $dto);
            $product->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response($product);
    }

    public function deleteProduct(DeleteProductRequest $request, ProductRetriever $retriever, int $productId)
    {
        $product = $retriever->retrieveById($productId);

        DB::beginTransaction();
        try {
            $product->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response('', Response::HTTP_NO_CONTENT);
    }
}
