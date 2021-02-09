<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardList;

class ApiController extends Controller
{
    public function index()
    {
        $data = CardList::all();
        return view('user_input', compact('data'));
    }






    public function store(Request $request)
    {
        //dd($request);
        if (CardList::where('card_id', $request->id)->first() == NULL) {
            $data = new CardList;
            $data->card_id = $request->id;
            $data->valid_date = $request->valid_date;
            $data->save();
            return redirect('/input');
        }
        else {
            return response("Sudah Terdaftar");
        }
    }
    public function delete($id)
    {
        $data = CardList::find($id);
        $data->delete();
        return redirect('/input');
    }
    public function edit($id)
    {
        $data = CardList::find($id);
        return view('user_edit', compact('data'));
    }
    public function edit_save(Request $request)
    {
        $data = CardList::find($request->id);
        //dd($request);
        $data->valid_date = $request->valid_date;
        $data->save();
        return redirect('/input');
    }
}
