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
                    <form action="{{ route('livros.store') }}" method="POST">
        
                        <div class="form-row mb-1">
                            <div class="form-group col-md-12 col-sm-12 col-xl-12">
                            <label for="titulo">Título</label>
                            <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Título do Livro">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xl-12">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" cols="10" rows="5" class="form-control" id="descricao"></textarea>
                            </div>
                            <div class="form-group col-md-4 col-sm-12 col-xl-4">
                            <label for="autor">Autor</label>
                            <input name="autor" type="text" class="form-control" id="autor">
                            </div>
                            <div class="form-group col-md-2 col-sm-12 col-xl-2">
                            <label for="numero_paginas">Nº de Páginas</label>
                            <input name="numero_paginas" type="number" class="form-control" id="numero_paginas">
                            </div>
                            <div class="form-group col-md-6"></div>
                            <button type="button" class="btn btn-primary mt-3" id="enviar-dados">Inserir Livro</button>
                        </div>
                        </form>
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