<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //TODO dodelat autentizaci pro zamestnance

        $clients = DB::table('clients')->leftjoin('users', 'clients.id', '=', 'users.id')->paginate(10);

        return view('clients.clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Client $client)
    {
        $this->authorize('view', $client);

        $client = DB::table('clients')
            ->leftJoin('users', 'clients.id', '=', 'users.id')->where('clients.id', '=', $client->id)
            ->get();

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Client $client)
    {
        $this->authorize('update', $client);

        $client = DB::table('clients')
            ->leftJoin('users', 'clients.id', '=', 'users.id')->where('clients.id', '=', $client->id)
            ->get();

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Client $client
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Client $client)
    {
        $this->authorize('update', $client);

        $user = User::find($client->id);

        $user->update(
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'max:15'],
                'dateOfBirth' => ['required', 'date'],
                'address' => ['required', 'string', 'max:255'],
            ])
        );

        return view('clients.show', compact('client'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        User::find($client->id)->delete();

        return redirect('/clients');
    }
}
