<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all the clients
        $clients = Client::all();
        return view('clients.index')->withClients($clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show the create client page
        return  view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a new user
          $client = new Client;
        // $client = $request->all();
        // $client->save();

        $client->create($request->all());
        
        return redirect()->route('clients.index')->with('status','Client saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show details of a specific client
        $client = Client::find($id);
        return view('clients.show')->withClient($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //show the edit page 
        $client = Client::find($id);
        return view('clients.edit')->withClient($client);
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
        //update the new client details
        $client = Client::find($id);
        // $client = $request->all();
        // $client->save();

        $client->update($request->all());

        return redirect()->route('clients.index')->with('status','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete specific client
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('clients.index')->withStatus('Client deleted successfully');
    }

    public function restore($id){
        //restore the deleted clients
        $client = Client::withTrashed()->find($id)->restore();
         return redirect ('index');
    }
}
