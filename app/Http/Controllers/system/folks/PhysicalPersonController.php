<?php

namespace App\Http\Controllers\system\folks;

use App\Http\Requests\PhysicalPersonFormRequest;
use App\Repositories\Contract\PhysicalPersonRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhysicalPersonController extends Controller
{
    public function __construct(PhysicalPersonRepositoryInterface $physical)
    {
        $this->physicalperson = $physical;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pessoal - Pessoas Físicas';
        $physicalperson = $this->physicalperson->all();
        return view('system.folk.physicalperson.index', compact('title', 'physicalperson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Pessoal - Pessoas Físicas - Novo';
        $genre = $this->physicalperson->genre();
        $civil = $this->physicalperson->civil();
        return view('system.folk.physicalperson.create-edit', compact('title', 'genre', 'civil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhysicalPersonFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->physicalperson->create($data);
        if($insert)
            return redirect()->route('physicalperson.index');
        else
            return redirect()->route('physicalperson.create');

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
        $genre = $this->physicalperson->genre();
        $civil = $this->physicalperson->civil();
        $title = 'Pessoal - Pessoa Física - Editar';
        $physicalperson = $this->physicalperson->find($id);
        return view('system.folk.physicalperson.create-edit', compact('physicalperson', 'genre', 'civil', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhysicalPersonFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->physicalperson->update($data, $id);
        if($update)
            return redirect()->route('physicalperson.index');
        else
            return redirect()->route('physicalperson.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->physicalperson->delete($id);
        if ($delete)
            return redirect()->route('physicalperson.index');
        else
            return redirect()->route('physicalperson.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }

    public function autocomplete_address(Request $request)
    {
        $term = $request->term; //jquery
        $data = $this->physicalperson->autocomplete($term);
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id, 'city'=>$value->city, 'value'=>$value->zipcode];
        }
        return Response()->json($result);

    }

}
