<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();

        if (isset($pets)) {
            return view('pet.index', compact('pets'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->name = $request->input('name');
        if (!$request->file('photo')) {
            $pet->photo_path = '';
        } else {
            $pet->photo_path = $request->file('photo')->store('photos');
        }
        $pet->specie = $request->input('specie');
        $pet->breed = $request->input('breed');
        $pet->color = $request->input('color');
        $pet->gender = $request->input('gender');
        $pet->heigth = $request->input('heigth');
        $pet->weight = $request->input('weight');
        $pet->birth_date = date('Y-m-d', strtotime($request->input('birth_date')));
        $pet->father = $request->input('father');
        $pet->mother = $request->input('mother');
        $pet->observations = $request->input('observations');
        $pet->save();

        return redirect()->route('pet.index');
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
        $pet = Pet::find($id);

        if (isset($pet)) {
            // se client encontrato, retorna para a view de edição com os dados do cliente
            return view('pet.edit', compact('pet'));
        }

        return redirect()->route('pet.index')->with('error', 'Pet not found.');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // encontra o cliente pelo ID ou falha
        $pet = Pet::find($id);

        if (isset($pet)) {
            // atualiza os dados do cliente se encontrado
            $pet->name = $request->input('name');
            $no_photo = $request->input('no_photo');
            if (isset($no_photo)) {
                $pet->photo_path = '';
            } else {
                if ($request->file('photo')) {
                    $pet->photo_path = $request->file('photo')->store('photos');
                }
            }
            $pet->specie = $request->input('specie');
            $pet->breed = $request->input('breed');
            $pet->color = $request->input('color');
            $pet->gender = $request->input('gender');
            $pet->heigth = $request->input('heigth');
            $pet->weight = $request->input('weight');
            $pet->birth_date = date('Y-m-d', strtotime($request->input('birth_date')));
            $pet->father = $request->input('father');
            $pet->mother = $request->input('mother');
            $pet->observations = $request->input('observations');
            $pet->save();

            // redireciona para a lista de clientes com uma mensagem de sucesso
            return redirect()->route('pet.index')->with('success', 'Pet updated successfully.');
        }

        return redirect()->route('pet.index')->with('error', 'Pet not found.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Pet::find($id);

        // set client encontrato, deleta o client e manda pra index com msg de sucesso
        if (isset($client)) {
            $client->delete();
            return redirect()->route('pet.index')->with('success', 'Client deleted successfully.');
        }

        // se não encontrou, manda pra index com msg de erro
        return redirect()->route('pet.index')->with('error', 'Client not found.');

    }
}
