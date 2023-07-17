<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use App\Models\Client;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //empty
    }

    public function moneytransfer(Client $client, Account $account)
    {
        $clients = Client::all();
        $accounts = Account::all();

        return view('transfer.moneytransfer', [
            'account' => $account,
            'client' => $client,
            'clients' => $clients,
            'accounts' => $accounts
        ]);;
    }

    public function transfer(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'moneyfrom' => 'required',
            'moneyto' => 'required',
            'amount' => 'required|numeric|min:0.01'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $fromAccount = Account::findOrFail($request->moneyfrom);
        $toAccount = Account::findOrFail($request->moneyto);
        $fromAccount->balance -= $request->amount;
        $toAccount->balance += $request->amount;

        $fromAccount->save();
        $toAccount->save();

        return redirect()
            ->route('transfer-moneytransfer')
            ->with('success', 'Success - money transfer is complete');
    }
}
