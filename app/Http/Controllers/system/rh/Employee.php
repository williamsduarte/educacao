<?php

namespace App\Http\Controllers\system\rh;

use App\Http\Requests\EmployeeFormRequest;
use App\Repositories\Contract\EmployeeRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Employee extends Controller
{
    function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->employee = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = $this->employee->all();
        return view('system.rh.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setor = $this->employee->sector();
        $link = $this->employee->link();
        $condition = $this->employee->condition();
        return view('system.rh.employee.create-edit', compact('setor', 'link', 'condition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->employee->create($data);
        if($insert)
            return redirect()->route('employee.index');
        else
            return redirect()->route('employee.create');


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
        $setor = $this->employee->sector();
        $link = $this->employee->link();
        $condition = $this->employee->condition();
        $employee = $this->employee->find($id);
        return view('system.rh.employee.create-edit', compact('setor', 'link', 'condition', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->employee->update($data, $id);
        if($update)
            return redirect()->route('employee.index');
        else
            return redirect()->route('employee.edit', $id)->with(['errors' => 'Falha ao Editar']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->employee->delete($id);
        if ($delete)
            return redirect()->route('employee.index');
        else
            return redirect()->route('employee.index', $id)->with(['errors' => 'Falha ao Excluir']);

    }

    public function autocomplete_physicalperson(Request $request)
    {
        $term = $request->term; //jquery
        $data = $this->employee->autocomplete($term);
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id, 'value'=>$value->name, 'CPF'=>$value->cpf, 'Mae'=>$value->mother, 'Sexo'=>$value->Genre->genre, 'Nascimento'=>date('d-m-Y', strtotime($value->birth)), 'Celular'=>$value->cell_phone, 'Cidade'=>$value->Address->city, 'Telefone'=>$value->phone];
        }
        return Response()->json($result);

    }
}
