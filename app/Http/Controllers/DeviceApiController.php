<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardList;
use Illuminate\Support\Carbon;

class DeviceApiController extends Controller
{
    public function search(Request $request){

        $data = CardList::where('card_id', $request->card_id)->first();
        if ($data != NULL){
            $now = Carbon::now();
            if ($now->greaterThan($data->valid_date)){
                return response("Expired");
            }
            else{
                return response("Valid");
            }
        }
        else {
            return response('Not Found');
        }
    }
}
