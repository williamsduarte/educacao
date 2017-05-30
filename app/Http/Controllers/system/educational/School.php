<?php

namespace App\Http\Controllers\system\educational;

use App\Http\Requests\SchoolFormRequest;
use App\Repositories\Contract\SchoolRespositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class School extends Controller
{
    function __construct(SchoolRespositoryInterface $respository)
    {
        $this->school = $respository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = $this->school->all();
        return view('system.educational.school.index', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localization = $this->school->Localization();
        $network = $this->school->Network();
        return view('system.educational.school.create-edit', compact('localization', 'network'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->school->create($data);
        if($insert)
            return redirect()->route('school.index');
        else
            return redirect()->route('school.create');
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
        $school = $this->school->find($id);
        $localization = $this->school->Localization();
        $network = $this->school->Network();
        return view('system.educational.school.create-edit', compact('localization', 'network', 'school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->school->update($data, $id);
        if($update)
            return redirect()->route('school.index');
        else
            return redirect()->route('school.edit', $id)->with(['errors' => 'Falha ao Editar']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->school->delete($id);
        if ($delete)
            return redirect()->route('school.index');
        else
            return redirect()->route('school.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }

    public function autocomplete_legalperson(Request $request)
    {
        $term = $request->term; //jquery
        $data = $this->school->autocomplete($term);
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id, 'value'=>$value->company_name, 'CNPJ'=>$value->cnpj, 'Telefone'=>$value->phone, 'Email'=>$value->email, 'Site'=>$value->site, 'Inscricao'=>$value->state_registration];
        }
        return Response()->json($result);

    }

}
