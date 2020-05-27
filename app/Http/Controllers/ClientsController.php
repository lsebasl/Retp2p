<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {

        return response()->view('clients.index', ['clients' => Client::all()]);
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
     * @param \Illuminate\Http\Request $request
     * @param Client $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Client $client)
    {

        $request->validate([
            'name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'id_type' => 'required|in:Foreign ID,Card ID,Passport,NIT',
            'identification' => 'required|min:3|max:20',
            'phone' => 'required|min:6|max:20',
            'email' => 'required|max:150|email|unique:clients,email',
            'address' => 'required|max:40',
       ]);

        $createClient = new Client([

            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'id_type' => $request->get('id_type'),
            'identification' => $request->get('identification'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
        ]);



        $createClient->save();
        return redirect()->route('clients.index')->with('success','Client Has Been Created!');


       // Client::create($data);
       // return redirect()->route('clients.index')->withSuccess(__('Client created successfully'));
    }


    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */

        public function show(Client $client)
    {
        return response()->view('clients.show', ['client'=> $client]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
       public function edit(Client $client)
       {
           return response()->view('clients.edit', ['client' => $client]);
       }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return back();

    }
}
