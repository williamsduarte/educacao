<?php

namespace App\Http\Controllers\system\educational;

use App\Http\Requests\CourseFormRequest;
use App\Repositories\Contract\CourseRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Course extends Controller
{
    function __construct(CourseRepositoryInterface $repository)
    {
        $this->course = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = $this->course->all();
        return view('system.educational.course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regime = $this->course->Regime();
        $type = $this->course->Type();
        $level = $this->course->Level();
        return view('system.educational.course.create-edit', compact('regime', 'type', 'level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseFormRequest $request)
    {
        $data = $request->except('_token');
        $insert = $this->course->create($data);
        if($insert)
            return redirect()->route('course.index');
        else
            return redirect()->route('course.create');
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
        $regime = $this->course->Regime();
        $type = $this->course->Type();
        $level = $this->course->Level();
        $course = $this->course->find($id);
        return view('system.educational.course.create-edit', compact('regime', 'type', 'level', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseFormRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->course->update($data, $id);
        if($update)
            return redirect()->route('course.index');
        else
            return redirect()->route('course.edit', $id)->with(['errors' => 'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->course->delete($id);
        if ($delete)
            return redirect()->route('course.index');
        else
            return redirect()->route('course.index', $id)->with(['errors' => 'Falha ao Excluir']);
    }
}
