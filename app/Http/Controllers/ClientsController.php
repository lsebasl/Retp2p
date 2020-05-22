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
        return response()->view('clients.index',['clients'=> Client::all()]);
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
        dd($request);
        $data = $request->validate([
            'name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            'id_type' => 'required|in:Foreign ID, Card ID,Passport,NIT',
            'identification' => 'required|alpha_num|max:20|min:3',
            'phone' => 'required|numeric|max:20|min:6',
            'email' => 'required|max:150|email|unique:clients,email,'.$client->id,
            'address' => 'required|max:40',

        ]);
        Client::create($data);
        return redirect()->route('clients.index')->withSuccess(__('Client created successfully'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
