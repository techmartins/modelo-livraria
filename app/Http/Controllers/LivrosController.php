<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livros;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livros::where('deleted_at', '=', null)->get();
        $page_name = 'livros';
        $category_name = 'livros';
        $has_scrollspy = 0;
        $scrollspy_offset = '';
        return view('livros.crud_livros',compact('livros', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo',
            'descricao',
            'autor',
            'numero_paginas',
            'data_cadastro'
        ]);

        return Livros::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Livros::find($id);
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
        $livros = Livros::find($id);
        $livros->update($request->all());
        return $livros;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Livros::destroy($id);
    }
}
