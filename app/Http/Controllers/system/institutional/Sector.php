<?php

namespace App\Http\Controllers\system\institutional;


use App\Http\Requests\SectorFormRequest;
use App\Repositories\Contract\SectorRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Sector extends Controller
{
    public function __construct(SectorRepositoryInterface $repository)
    {
        $this->sector = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sector = $this->sector->all();
        return view('system.institutional.sector.index', compact('sector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.institutional.sector.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->sector->create($data);
        if($insert)
            return redirect()->route('sector.index');
        else
            return redirect()->route('sector.create');

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
        $sector = $this->sector->find($id);
        return view('system.institutional.sector.create-edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectorFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->sector->update($data, $id);
        if($update)
            return redirect()->route('sector.index');
        else
            return redirect()->route('sector.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->sector->delete($id);
        if ($delete)
            return redirect()->route('sector.index');
        else
            return redirect()->route('sector.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }

    public function autocomplete_secretary(Request $request)
    {
        $term = $request->term; //jquery
        $data = $this->sector->autocomplete($term);
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id, 'value'=>$value->name, 'Prefeitura'=>$value->Prefecture->name, 'Cidade'=>$value->Prefecture->Address->city, 'Gestor'=>$value->manager, 'Telefone'=>$value->phone];
        }
        return Response()->json($result);

    }
}
