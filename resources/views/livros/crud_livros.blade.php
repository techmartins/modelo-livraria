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
                        <input type="hidden" value="{{Request::url()}}" id="url_cadastro">
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
            </div>
        </div>

        {{-- MODAL DE EDITAR PROFISSIONAL --}}

        ​<div class="modal fade" id="modal-editar-livro" role="dialog">
            <div class="modal-dialog" style="max-width: 65%;">
            
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row layout-top-spacing">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Editar Livro</h4>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="widget-content widget-content-area" style="height: auto;">
                                        
                                        <form action="" method="PUT">
                                            @csrf
                                            <input type="hidden" value="{{Request::url()}}" id="url_editar">
                                            <input type="hidden" id="id_edit">
                                            <div class="form-row mb-1">
                                                <div class="form-group col-md-12 col-sm-12 col-xl-12">
                                                <label for="titulo_edit">Título</label>
                                                <input name="titulo_edit" type="text" class="form-control" id="titulo_edit" placeholder="Título do Livro">
                                                </div>
                                                <div class="form-group col-md-12 col-sm-12 col-xl-12">
                                                <label for="descricao_edit">Descrição</label>
                                                <textarea name="descricao_edit" cols="10" rows="5" class="form-control" id="descricao_edit"></textarea>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12 col-xl-4">
                                                <label for="autor_edit">Autor</label>
                                                <input name="autor_edit" type="text" class="form-control" id="autor_edit">
                                                </div>
                                                <div class="form-group col-md-2 col-sm-12 col-xl-2">
                                                <label for="numero_paginas_edit">Nº de Páginas</label>
                                                <input name="numero_paginas_edit" type="number" class="form-control" id="numero_paginas_edit">
                                                </div>
                                                <div class="form-group col-md-6"></div>
                                                <button type="button" class="btn btn-primary mt-3" id="editar-dados">Editar Livro</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- LOADING --}}
          ​<div class="modal fade" id="modal-loading" role="dialog">
            <div class="modal-dialog" style="max-width: 20%;">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="max-width: 20%;">
                      <div class="widget-content widget-content-area br-6">
                        <div class="col-md-12">
                          <div class="loader dual-loader mx-auto"></div>
                          <h2 style="text-align: center">Processando...</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        {{-- MODAL DE CADASTRO DE LIVROS --}}

        <div class="modal fade" id="modal-add-livro" role="dialog">
            <div class="modal-dialog" style="max-width: 30%;">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-content">
                <div class="modal-body">
                    <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                        <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area" style="height: auto;">
                            <h3>Você tem certeza de que deseja excluir este livro?</h3>
                            <input type="hidden" id="id_deletar_livro">
                            <button type="button" class="btn btn-danger" id="deletar">Excluir</button>
                            <a data-dismiss="modal" style="text-decoration: none; cursor: pointer;">Fechar</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- TABELA DE LIVROS -->
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <table id="default-ordering" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Título</th>
                            <th style="text-align: center">Descrição</th>
                            <th style="text-align: center">Autor</th>
                            <th style="text-align: center">Nº de Páginas</th>
                            <th style="text-align: center">Criado em</th>
                            <th style="text-align: center" class="text-center dt-no-sorting">Ação</th>
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
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm">Visualizar</button>
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Deletar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Título</th>
                            <th style="text-align: center">Descrição</th>
                            <th style="text-align: center">Autor</th>
                            <th style="text-align: center">Nº de Páginas</th>
                            <th style="text-align: center">Criado em</th>
                            <th class="invisible"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection