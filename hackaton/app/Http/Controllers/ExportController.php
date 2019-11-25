<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Client;
use App\Exports\ClientsExport;

class ExportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function exportCSV()
	{
		$clients = Client::get();
		return Excel::download(new ClientsExport, 'client-list.csv');
	}
}
