<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
class ItemController extends Controller
{
    

    public function index(Item $item)
{
    return view('items.index')->with(['items' => $item->getPaginateByLimit()]);
}
    public function show(Item $item)
    {
        return view('items.show')->with(['item' => $item]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function create()
    {
        return view('items.create');
    }
    public function store(ItemRequest $request, Item $item)
    {
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        
        $item->fill($request->item);
        $item->image = $image_url;
        $item->user_id = Auth::id();
        $item->save();
        return redirect('/items/' . $item->id);
    }
    public function edit(Item $item)
    {
        return view('items.edit')->with(['item' => $item]);
    }
    public function update(ItemRequest $request, Item $item)
    {
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        
        $item->fill($request->item);
        $item->image = $image_url;
        $item->user_id = Auth::id();
        $item->save();
        return redirect('/items/' . $item->id);
    }
    
    public function delete(Item $item)
    {
        $item->delete();
        return redirect('/');
    }
}
