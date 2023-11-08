<?php

namespace App\Http\Controllers\Backend;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->messageUtil = $messageUtil;

      //  $this->middleware('permission:sysuser-list|sysuser-create|sysuser-edit|sysuser-delete', ['only' => ['index','store']]);
         $this->middleware('permission:client-create', ['only' => ['create','store']]);
         $this->middleware('permission:client-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:sysuser-reset', ['only' => ['resetpasswordsu']]);
         //$this->middleware('permission:sysuser-activate', ['only' => ['destroy']]);
         $this->middleware('permission:client-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $clients = Client::all();
        return view('backend.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('backend.clients.create');
    }

    public function store(Request $request)
    {
        $clients = new Client;
        $clients->name = $request->name;
        $clients->email = $request->email;
        $clients->address = $request->address;

        $clients->save();
        $notification = array(
            'message' => 'Client Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('client.index')->with($notification);
    }

    public function edit($id)
    {
        $edit = Client::findorFail($id);
        return view('backend.clients.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $clients = Client::findorFail($id);
        $clients->name = $request->name;
        $clients->email = $request->email;
        $clients->address = $request->address;

        $clients->save();
        $notification = array(
            'message' => 'Client Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('client.index')->with($notification);
    }

    public function delete($id){
        $clients = Client::find($id);
        $clients->delete();

        $notification = array(
            'message' => 'Client Deleted successfully',
            'alert-type' => 'danger'
        );

        return redirect()->route('client.index')->with($notification);
    }
}
