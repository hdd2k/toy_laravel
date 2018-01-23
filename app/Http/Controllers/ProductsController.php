<?php

namespace App\Http\Controllers;

use App\Events\ProductCreatedEvent;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\DownloadProductsRequest;
use App\Http\Requests\ListProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Jobs\ProcessListProductJob;
use Core\ProductCreator;
use Core\ProductModifier;
use Core\ProductRetriever;
use Illuminate\Contracts\Bus\Dispatcher as JobDispatcher;
use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use \Illuminate\Support\Facades\DB;
use Exception;
use App\Product;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    public function listProducts(ListProductRequest $request, ProductRetriever $retriever)
    {
        $searchParamDto = $request->getListProductSearchParamDto();
        $products = $retriever->retrieveBySearchParam($searchParamDto);

        return response($products);
    }

    public function downloadProducts(DownloadProductsRequest $request, ProductRetriever $retriever, JobDispatcher $jobDispatcher)
    {
        $searchParamDto = $request->getListProductSearchParamDto();
        $products = $retriever->retrieveCollectionBySearchParam($searchParamDto);
        $jobDispatcher->dispatch(new ProcessListProductJob($products, $request->user()));

        return response()->json(['message' => '작업이 예약되었습니다. 완료되면 이메일로 알려드립니다.']);
    }

    public function createProduct(CreateProductRequest $request, ProductCreator $creator, EventDispatcher $eventDispatcher)
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

        $eventDispatcher->dispatch(new ProductCreatedEvent($product));

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
