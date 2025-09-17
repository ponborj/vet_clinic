<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        //  usar paginação acho melhor, se bem que ta com datatables
        // $clients = Client::paginate(10);

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // retorna a view para criar um novo cliente com formulário
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // valida os dados do formulário
        // $request->validate([
        // 'name' => 'required|string|max:255',
        // 'email' => 'required|email|unique:clients,email',
        // 'cell_phone' => 'nullable|string|max:20',
        // 'address' => 'nullable|string|max:255',
        // 'state' => 'nullable|string|max:100'
        // ]);

        // cria um novo cliente
        $client = new Client();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->cell_phone = $request->input('cell_phone');
        $client->address = $request->input('address');
        $client->state = $request->input('state');
        $client->save();

        // redireciona para a lista de clientes com uma mensagem de sucesso
        return redirect()->route('client.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // encontra o cliente pelo ID ou falha
        $client = Client::find($id);

        if (isset($client)) {
            // se client encontrato, retorna para a view de edição com os dados do cliente
            return view('client.edit', compact('client'));
        }

        return redirect()->route('client.index')->with('error', 'Client not found.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // encontra o cliente pelo ID ou falha
        $client = Client::find($id);

        if (isset($client)) {
            // atualiza os dados do cliente se encontrado
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->cell_phone = $request->input(key: 'cell_phone');
            $client->address = $request->input('address');
            $client->state = $request->input('state');
            $client->save();

            // redireciona para a lista de clientes com uma mensagem de sucesso
            return redirect()->route('client.index')->with('success', 'Client updated successfully.');
        }

        return redirect()->route('client.index')->with('error', 'Client not found.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);

        // set client encontrato, deleta o client e manda pra index com msg de sucesso
        if (isset($client)) {
            $client->delete();
            return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
        }

        // se não encontrou, manda pra index com msg de erro
        return redirect()->route('client.index')->with('error', 'Client not found.');
    }
}
