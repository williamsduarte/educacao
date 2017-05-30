<?php

namespace App\Http\Controllers\system\institutional;

use App\Http\Requests\PrefectureFormRequest;
use App\Repositories\Contract\PrefectureRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Prefecture extends Controller
{
    public function __construct(PrefectureRepositoryInterface $repository)
    {
        $this->prefecture = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Institucional - Prefeituras';
        $prefecture = $this->prefecture->all();
        return view('system.institutional.prefecture.index', compact('title', 'prefecture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Institucional - Prefeituras - Novo';
        return view('system.institutional.prefecture.create-edit', compact('title', 'prefecture'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrefectureFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->prefecture->create($data);
        if($insert)
            return redirect()->route('prefecture.index');
        else
            return redirect()->route('prefecture.create');
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
        $prefecture = $this->prefecture->find($id);
        $title = 'Institucional - Prefeituras - Editar';
        return view('system.institutional.prefecture.create-edit', compact('title', 'prefecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrefectureFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->prefecture->update($data, $id);
        if($update)
            return redirect()->route('prefecture.index');
        else
            return redirect()->route('prefecture.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->prefecture->delete($id);
        if ($delete)
            return redirect()->route('prefecture.index');
        else
            return redirect()->route('prefecture.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }
}
