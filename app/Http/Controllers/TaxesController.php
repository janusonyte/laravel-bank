<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;

use Illuminate\Http\Request;

class TaxesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::all();
        $accounts = Account::all();

        return view('home', [
            'clients' => $clients,
            'accounts' => $accounts
        ]);
    }
}
