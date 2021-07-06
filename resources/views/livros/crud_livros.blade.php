@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow" style="height: 600px; border: none;">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Lista de Livros</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: auto;">
                    
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">ID</th>
                                            <th style="text-align: center">Título</th>
                                            <th style="text-align: center">Descrição</th>
                                            <th style="text-align: center">Autor</th>
                                            <th style="text-align: center">Nº de Páginas</th>
                                            <th style="text-align: center">Data de Cadastro</th>
                                            <th style="text-align: center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($livros as $lv)
                                        <tr>
                                            <td style="text-align: center">{{ $lv->id }}</td>
                                            <td style="text-align: center">{{ $lv->titulo }}</td>
                                            <td style="text-align: center">{{ $lv->descricao }}</td>
                                            <td style="text-align: center">{{ $lv->autor }}</td>
                                            <td style="text-align: center">{{ $lv->numero_paginas }}</td>
                                            <td style="text-align: center">{{ $lv->created_at }}</td>
                                            <td style="text-align: center">
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection