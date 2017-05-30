<?php

namespace App\Http\Controllers\system\rh;

use App\Http\Requests\UserFormRequest;
use App\Repositories\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User extends Controller
{
    function __construct(UserRepositoryInterface $repository)
    {
        $this->user = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->all();
        return view('system.rh.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.rh.user.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->user->criptografia($data);
        if($insert)
            return redirect()->route('user.index');
        else
            return redirect()->route('user.create');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->user->delete($id);
        if ($delete)
            return redirect()->route('user.index');
        else
            return redirect()->route('user.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }

    public function autocomplete_employee(Request $request)
    {
        $term = $request->term; //jquery
        $data = $this->user->autocomplete($term);
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id, 'value'=>$value->PhysicalPerson->name, 'CPF'=>$value->PhysicalPerson->cpf, 'Celular'=>$value->PhysicalPerson->cell_phone, 'Telefone'=>$value->PhysicalPerson->phone, 'Cidade'=>$value->PhysicalPerson->Address->city, 'Local'=>$value->Sector->Secretary->name, 'Setor'=>$value->Sector->sector, 'Vinculo'=>$value->Link->description, 'Status'=>$value->Condition->description];
        }
        return Response()->json($result);
    }
}
