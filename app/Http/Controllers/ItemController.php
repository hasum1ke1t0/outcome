<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\ItemRequest;
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
        $input = $request['item'];
        $item->fill($input)->save();
        return redirect('/items/' . $item->id);
    }
    public function edit(Item $item)
    {
        return view('items.edit')->with(['item' => $item]);
    }
    public function update(ItemRequest $request, Item $item)
    {
        $input_item = $request['item'];
        $item->fill($input_item)->save();
    
        return redirect('/items/' . $item->id);
    }
    
    public function delete(Item $item)
    {
        $item->delete();
        return redirect('/');
    }
}
