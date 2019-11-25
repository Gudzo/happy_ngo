<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Client;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clients'] = Client::get();

        $data['valid_coupons'] = Client::where('status', 1)->get();
        $data['expired_coupons'] = Client::where('status', 2)->get();

        return view('client-list', $data);
    }
    public function edit($id){
		$data['client'] = Client::where('id', $id)->first();
        return view('edit', $data)->with('success','Client modified successfully');;
    }
    public function update(Request $request, $id){
        $request->validate([
            'mail' => 'required',
            'code' => 'required',
            'status' => 'required',
        ]);

        $update = ['mail' => $request->mail, 'code' => $request->code, 'status' => $request->status ];

        Client::where('id', $id)->update($update);

        return Redirect::to('clients')->with('success','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::where('id', $id)->delete();
        return Redirect::to('clients')->with('success','Client deleted successfully');
    }

    public function search(Request $request){
        $query = $request->get('query');
    	$data['clients'] = Client::where('mail','LIKE', '%' . $query . '%')->orWhere('code', 'LIKE', '%' . $query . '%')->get();

    	$data['valid_coupons'] = Client::where('status', 1)->get();
        $data['expired_coupons'] = Client::where('status', 2)->get();
        //$data['clients'] = Client::get();

    	return view('client-list', $data);
    }
}
