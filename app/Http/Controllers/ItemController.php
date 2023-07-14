<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
        public function index(Item $item)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return $item->get();//$postの中身を戻り値にする。
    }
}
