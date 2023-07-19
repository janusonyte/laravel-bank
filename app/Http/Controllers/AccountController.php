<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $accounts = Account::all();


        return view('accounts.index', [
            'accounts' => $accounts
        ]);

        // Sort
        // $sortBy = $request->sort_by ?? '';
        // $orderBy = $request->order_by ?? '';
        // if ($orderBy && !in_array($orderBy, ['asc', 'desc'])) {
        //     $orderBy = '';
        // }

        // // Pagination
        // $perPage = (int) 5;

        // if ($request->s) {

        //     $accounts = Account::where('account', 'like', '%' . $request->s . '%')->paginate(5)->withQueryString();
        // } else {

        //     // $accounts = Account::select('accounts.*');
        //     $accounts = Account::select('accounts.*')
        //         ->join('clients', 'clients.id', '=', 'accounts.client_id')
        //         ->orderBy('clients.last_name')
        //         ->get();

        //     // Sort
        //     $accounts = match ($sortBy) {
        //         'accounts' => $accounts->orderBy('accounts', $orderBy),
        //         'last_name' => $accounts->sortByDesc('clients.last_name'),
        //         default => $accounts
        //     };
        //     $accounts = $accounts->paginate($perPage)->withQueryString();
        // }

        // return view('accounts.index', [
        //     'accounts' => $accounts,
        //     'sortBy' => $sortBy,
        //     'orderBy' => $orderBy,
        //     'perPage' => $perPage,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $iban = Account::generateIban();

        return view('accounts.create', [
            'clients' => $clients,
            'iban' => $iban
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'client_id' => 'required|integer',
                'balance' => 'required|integer'
            ],
            [
                'client_id.required' => 'You must select a client',
                'client_id.integer' => 'You must select a client',
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $account = new Account;
        $account->iban = $request->iban;
        $account->client_id = $request->client_id;
        $account->balance = $request->balance;

        $account->save();
        return redirect()
            ->route('accounts-index')
            ->with('success', 'Success! A new account has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $clients = Client::all();

        return view('accounts.edit', [
            'account' => $account,
            'clients' => $clients
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'balance' => 'required|integer'
            ],
            [
                'balance.required' => 'Please enter an amount',
                'balance.integer' => 'Incorrect value. The amount has to be a number',
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        if ($request->has('addFunds')) {
            $addFunds = $request->balance;
            $account->balance += $addFunds;
        } elseif ($request->has('withdrawFunds')) {
            $withdrawFunds = $request->balance;
            if ($withdrawFunds > $account->balance) {
                return redirect()->back()->withErrors(['balance' => 'Error. Insufficient funds for transfer.']);
            }
            $account->balance -= $withdrawFunds;
        }

        // $account->balance = $request->balance;

        $account->save();
        return redirect()
            ->route('accounts-index')
            ->with('success', 'Success. Account balance has been changed.');
    }

    public function delete(Account $account)
    {

        if ($account->balance > 0) {
            return redirect()->back()->with('info', 'The account cannot be deleted - the balance is not zero');
        }

        return view('accounts.delete', [
            'account' => $account
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()
            ->route('accounts-index')
            ->with('success', 'Account ' . $account->iban . ' has been deleted!');
    }
}
