<?php

namespace App\Http\Controllers\system\educational;

use App\Repositories\Contract\SerieRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Serie extends Controller
{
    function __construct(SerieRepositoryInterface $repository)
    {
        $this->serie = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serie = $this->serie->all();
        return view('system.educational.serie.index', compact('serie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discipline = $this->serie->Discipline();
        $discipline0 = $this->serie->Discipline();
        $discipline1 = $this->serie->Discipline();
        $discipline2 = $this->serie->Discipline();
        $discipline3 = $this->serie->Discipline();
        $discipline4 = $this->serie->Discipline();
        $discipline5 = $this->serie->Discipline();
        $discipline6 = $this->serie->Discipline();
        return view('system.educational.serie.create-edit', compact('discipline', 'discipline0', 'discipline1',
                                                                                   'discipline2', 'discipline3', 'discipline4', 'discipline5',
                                                                                    'discipline6'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
