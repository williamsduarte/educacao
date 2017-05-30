<?php

namespace App\Http\Controllers\system\address;


use App\Http\Requests\AddressFormRequest;
use App\Repositories\Contract\AddressRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Address extends Controller
{
    public function __construct(AddressRepositoryInterface $repository)
    {
        $this->address = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Módulo Localização';
        $address = $this->address->all();
        return view('system.address.index', compact('address', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Módulo Localização - Novo';
        return view('system.address.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->address->create($data);
        if($insert)
            return redirect()->route('address.index');
        else
            return redirect()->route('address.create');
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
        $title = 'Módulo Localização - Editar';
        $address = $this->address->find($id);
        return view('system.address.create-edit', compact('address', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->address->update($data, $id);
        if($update)
            return redirect()->route('address.index');
        else
            return redirect()->route('address.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->address->delete($id);
        if ($delete)
            return redirect()->route('address.index');
        else
            return redirect()->route('address.index', $id)->with(['errors' => 'Falha ao Excluir']);

    }
}
