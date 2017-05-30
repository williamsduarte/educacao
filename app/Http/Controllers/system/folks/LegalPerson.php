<?php

namespace App\Http\Controllers\system\folks;



use App\Http\Requests\LegalPersonFormRequest;
use App\Repositories\Contract\LegalPersonRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegalPerson extends Controller
{
    public function __construct(LegalPersonRepositoryInterface $legalperson)
    {
        $this->legalperson = $legalperson;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pessoal - Pessoa Jurídica';
        $legalperson = $this->legalperson->all();
        return view('system.folk.legalperson.index', compact('title', 'legalperson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Pessoal - Pessoa Jurídica - Novo';
        return view('system.folk.legalperson.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LegalPersonFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->legalperson->create($data);
        if($insert)
            return redirect()->route('legalperson.index');
        else
            return redirect()->route('legalperson.create');

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
        $legalperson = $this->legalperson->find($id);
        $title = 'Pessoal - Pessoa Jurídica - Editar';
        return view('system.folk.legalperson.create-edit', compact('title', 'legalperson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LegalPersonFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->legalperson->update($data, $id);
        if($update)
            return redirect()->route('legalperson.index');
        else
            return redirect()->route('legalperson.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->legalperson->delete($id);
        if ($delete)
            return redirect()->route('legalperson.index');
        else
            return redirect()->route('legalperson.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }

    public function autocomplete_address(Request $request)
    {
        $term = $request->term; //jquery
        $data = $this->legalperson->autocomplete($term);
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id, 'city'=>$value->city, 'value'=>$value->zipcode];
        }
        return Response()->json($result);

    }
}
