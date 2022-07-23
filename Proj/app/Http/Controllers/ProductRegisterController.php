<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductRegisterController extends Controller
{
    //
    public function registerProduct(Request $request)
    {
        $inputs = $request->all();
        $start_price = $request->start_price;
        $buyout_price = $request->buyout_price;
        if($buyout_price < $start_price)
        {
            return back()->withErrors(['err_msg'=>'即決価格が初期価格より低い']);
        }
        if($file = $request->thumbnail)
        {
            $fileName = time().$file->getClientOriginalName();
            $target_path = public_path('trunk/img/');
            $file->move($target_path, $fileName);
            $inputs['thumbnail']=$fileName;
        }
        else
        {
            return back()->withErrors(['err_msg'=>'ファイルが正しくアップロードしませんでした']);
        }


        \DB::beginTransaction();
        try{
            Product::create($inputs);
            \DB::commit();
        }catch(\Throwable $e)
        {
            echo $e->getMessage();
            \DB::rollback();
            abort(500);
        }
        return redirect('productRegister')->with('upload_success','アップロード成功しました');
    }

    public function show()
    {
        return view('productRegister');
    }
}
