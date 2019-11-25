<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;


class CouponController extends Controller
{
    //
    public function add(Request $request){
        $request->validate([
            'mail' => 'required|email'
        ]);
        // if email exists
        if(Client::where('mail', $request->mail )->first()){
			//return response('0', 200)->header('Content-Type', 'text/plain');
            return redirect('/');
        }

        // Code generator
        // If exists, generate new
        $code = randomString(5);

        $codes = json_decode(Client::select('code')->where('code', $code)->get());

        while(1){
        	if(in_array($code, $codes)){
        		$code = randomString(5);
        	}else{
        		break;
        	}
        }

        $client = new Client();
        $client->mail = $request->mail;
        $client->code = $code;
        $client->status = 1;

        $client->save();

		//return response('1', 200)->header('Content-Type', 'text/plain');
        return redirect('/');

    }
}

function randomString($length = 5) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}
