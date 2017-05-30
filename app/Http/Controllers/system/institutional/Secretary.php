<?php

namespace App\Http\Controllers\system\institutional;

use App\Http\Requests\SecretaryFormRequest;
use App\Repositories\Contract\SecretaryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Secretary extends Controller
{
    public function __construct(SecretaryRepositoryInterface $repository)
    {
        $this->secretary = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secretary = $this->secretary->all();
        return view('system.institutional.secretary.index', compact('secretary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.institutional.secretary.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecretaryFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->secretary->create($data);
        if($insert)
            return redirect()->route('secretary.index');
        else
            return redirect()->route('secretary.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secretary = $this->secretary->find($id);
       return view('system.institutional.secretary.create-edit', compact('secretary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SecretaryFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->secretary->update($data, $id);
        if($update)
            return redirect()->route('secretary.index');
        else
            return redirect()->route('secretary.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->secretary->delete($id);
        if ($delete)
            return redirect()->route('secretary.index');
        else
            return redirect()->route('secretary.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }

    public function autocomplete_prefecture(Request $request)
    {
        $term = $request->term; //jquery
        $data = $this->secretary->autocomplete($term);
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id, 'value'=>$value->name, 'CEP'=>$value->Address->zipcode, 'Telefone'=>$value->phone, 'Cidade'=>$value->Address->city];
        }
        return Response()->json($result);

    }

}
