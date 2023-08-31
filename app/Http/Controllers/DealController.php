<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Item;
use App\Models\Message;
use App\Http\Requests\DealRequest;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
class DealController extends Controller
{
    public function index(Deal $deal)
    {
        return view('deals.index')->with(['deals' => $deal->getPaginateByLimit()]);
    }
    
    public function index2(Deal $deal)
    {
        return view('deals.message')->with(['messages' => $deal->messages()->orderBy('created_at','DESC')->paginate(5),'deal'=> $deal]);
    }

    public function show(Deal $deal)
    {
        return view('deals.show')->with(['deal' => $deal]);
    }
    public function store(DealRequest $request, Deal $deal, Item $item)
    {
        $item->delete();
        $deal->purchased_id = Auth::id();
        $deal->item_id = $item -> id;
        $deal->save();
        return redirect('/deals/' . $deal->id);
    }
    
    public function store2(MessageRequest $request, Message $message, Deal $deal){
        $input = $request['message'];
        $message->send_id = Auth::id();
        $message->deal_id = $deal->id;
        $message->fill($input)->save();
        return redirect('/deals/'.$deal->id. '/messages/');
    }
    
    public function delete(Deal $deal)
    {
        $deal->delete();
        return redirect('/deals/');
    }
    
}
