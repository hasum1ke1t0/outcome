<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Item;
use App\Http\Requests\DealRequest;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
class DealController extends Controller
{
    public function index(Deal $deal)
    {
        return view('deals.index')->with(['deals' => $deal->getPaginateByLimit()]);
    }
    public function show(Deal $deal)
    {
        //dd($deal);
        return view('deals.show')->with(['deal' => $deal::with('item')->first()]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function store(DealRequest $request, Deal $deal, Item $item)
    {
        $deal->purchased_id = Auth::id();
        $deal->item_id = $item -> id;
        $deal->save();
        return redirect('/deals/' . $deal->id);
    }
    public function delete(Item $item)
    {
        $item->delete();
    }
}
