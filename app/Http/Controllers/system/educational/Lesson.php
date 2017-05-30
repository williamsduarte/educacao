<?php

namespace App\Http\Controllers\system\educational;

use App\Http\Requests\LessonFormRequest;
use App\Repositories\Contract\LessonRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Lesson extends Controller
{
    function __construct(LessonRepositoryInterface $repository)
    {
        $this->lesson = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesson = $this->lesson->all();
        return view('system.educational.lesson.index', compact('lesson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.educational.lesson.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->lesson->create($data);
        if($insert)
            return redirect()->route('lesson.index');
        else
            return redirect()->route('lesson.create');

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
        $lesson = $this->lesson->find($id);
        return view('system.educational.lesson.create-edit', compact('lesson'));
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
        $data = $request->all();
        $update = $this->lesson->update($data, $id);
        if($update)
            return redirect()->route('lesson.index');
        else
            return redirect()->route('lesson.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->lesson->delete($id);
        if ($delete)
            return redirect()->route('lesson.index');
        else
            return redirect()->route('lesson.index', $id)->with(['errors' => 'Falha ao Excluir']);

    }

    public function autocomplete_school(Request $request)
    {
        $term = $request->term; //jquery
        $data = $this->lesson->autocomplete($term);
        $result=array();
        foreach ($data as $key => $value) {
            $result[]=['id'=>$value->id, 'value'=>$value->LegalPerson->company_name];
        }
        return Response()->json($result);
    }

}
