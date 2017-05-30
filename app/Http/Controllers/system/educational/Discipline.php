<?php

namespace App\Http\Controllers\system\educational;

use App\Http\Requests\DisciplineFormRequest;
use App\Repositories\Contract\DisciplineRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Discipline extends Controller
{
    function __construct(DisciplineRepositoryInterface $repository)
    {
        $this->discipline = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discipline = $this->discipline->all();
        return view('system.educational.discipline.index', compact('discipline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $knowleadge = $this->discipline->Knowleadge();
        return view('system.educational.discipline.create-edit', compact('knowleadge'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplineFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->discipline->create($data);
        if($insert)
            return redirect()->route('discipline.index');
        else
            return redirect()->route('discipline.create');

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
        $knowleadge = $this->discipline->Knowleadge();
        $discipline = $this->discipline->find($id);
        return view('system.educational.discipline.create-edit', compact('knowleadge', 'discipline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplineFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->discipline->update($data, $id);
        if($update)
            return redirect()->route('discipline.index');
        else
            return redirect()->route('discipline.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->discipline->delete($id);
        if ($delete)
            return redirect()->route('discipline.index');
        else
            return redirect()->route('discipline.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }
}
