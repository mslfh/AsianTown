<?php

namespace App\Http\Controllers;

use App\Models\DeliveryRecord;
use App\Models\Product;
use App\Models\Purchaser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryRecordController extends Controller
{
    public function index()
    {
        $deliveryRecords = DeliveryRecord::all();
        return view('deliveries.index', compact('deliveryRecords'));
    }

    public function create()
    {
        $purchasers = Purchaser::query()->select(['id','name'])->get()->toArray();
        $products = Product::query()->select(['id','main_name','chinese_name','unit'])->get()->toArray();
        return view('deliveries.create',[
            "purchasers" => $purchasers,
            "products" => $products,
        ]);
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();  // 开始事务

            // 这里可以添加你的逻辑代码，例如保存数据
            $data = $request->get('data');

            $delivery = new DeliveryRecord;
            $delivery->status = 'pending';
            $delivery->save();

            foreach ($data as $record) {
                foreach ($record['products'] as $product) {
                    $delivery->deliveryDetails()->create([
                        'purchaserId' => $record['purchaserId'],
                        'purchaserName' => $record['purchaserName'],
                        'productId' => $product['productId'],
                        'productName' => $product['productName'],
                        'number' => $product['number'],
                    ]);
                }
            }

            DB::commit();  // 提交事务

            return response()->json([
                'message' => 'Successfully created delivery record!',
                'delivery' => $delivery
            ]);
        } catch (\Exception $e) {
            DB::rollBack();  // 回滚事务

            return response()->json([
                'message' => 'Failed to create delivery record!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function handleDelivery()
    {
        $data = DeliveryRecord::query()->select(['id','status','created_at'])->with('deliveryDetails')->orderByDesc('created_at')->first()->toArray();

        $groupedData = [];
        foreach ($data['delivery_details'] as $detail) {
            $purchaserId = $detail['purchaserId'];
            $purchaserName = $detail['purchaserName'];

            if (!isset($groupedData[$purchaserId])) {
                $groupedData[$purchaserId] = [
                    'purchaserId' => $purchaserId,
                    'purchaserName' => $purchaserName,
                    'productList' => []
                ];
            }

            $groupedData[$purchaserId]['productList'][] = [
                'productId' => $detail['productId'],
                'productName' => $detail['productName'],
                'number' => $detail['number']
            ];
        }

        $data['delivery_details'] = array_values($groupedData);

        return view('deliveries.handle',[
            "records" => $data
        ]);
    }

    public function show(DeliveryRecord $deliveryRecord)
    {
        $data = $deliveryRecord->toArray();
        $data['delivery_details'] = $deliveryRecord->deliveryDetails()->get()->toArray();

        $groupedData = [];
        foreach ($data['delivery_details'] as $detail) {
            $purchaserId = $detail['purchaserId'];
            $purchaserName = $detail['purchaserName'];

            if (!isset($groupedData[$purchaserId])) {
                $groupedData[$purchaserId] = [
                    'purchaserId' => $purchaserId,
                    'purchaserName' => $purchaserName,
                    'productList' => []
                ];
            }

            $groupedData[$purchaserId]['productList'][] = [
                'productId' => $detail['productId'],
                'productName' => $detail['productName'],
                'number' => $detail['number']
            ];
        }

        $data['delivery_details'] = array_values($groupedData);

        return view('deliveries.detail', [
            "records" => $data
        ]);
    }

    public function edit(DeliveryRecord $deliveryRecord)
    {
        return view('deliveries.edit', compact('deliveryRecord'));
    }

    public function update(Request $request, DeliveryRecord $deliveryRecord)
    {
        $validatedData = $request->validate([
            'order_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'remark' => 'nullable',
            'delivery_date' => 'nullable',
        ]);

        $deliveryRecord->update($validatedData);

        return redirect()->route('deliveries.index');
    }

    public function destroy(DeliveryRecord $deliveryRecord)
    {
        $deliveryRecord->delete();

        return redirect()->route('deliveries.index');
    }
}
