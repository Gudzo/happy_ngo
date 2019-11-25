<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Client;

class ClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
		return Client::all();
    }
}
