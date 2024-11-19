<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Galeria;
use App\Models\Imovel;
use App\Models\Tipo;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index()
    {
        $registros = Imovel::all();
        foreach ($registros as $registro) {
            $registro->galeria = Galeria::select('imagem')->where('imovel_id', $registro->id)->first();
        }

        return view('admin.imoveis.index', compact('registros'));
    }

    public function adicionar()
    {

        $tipos   = Tipo::all();
        $cidades = Cidade::all();

        return view('admin.imoveis.adicionar', compact('tipos', 'cidades'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro                = new Imovel();
        $registro->titulo        = $dados['titulo'];
        $registro->descricao     = $dados['descricao'];
        $registro->status        = $dados['status'];
        $registro->status        = $dados['status'];
        $registro->endereco      = $dados['endereco'];
        $registro->cep           = $dados['cep'];
        $registro->valor         = $dados['valor'];
        $registro->dormitorios   = $dados['dormitorios'];
        $registro->detalhes      = $dados['detalhes'];
        $registro->visualizacoes = 0;
        $registro->publicar      = $dados['publicar'];
        if (isset($dados['mapa']) && trim($dados['mapa']) != "") {
            $registro->mapa = trim($dados['mapa']);
        } else {
            $registro->mapa = null;
        }

        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id   = $dados['tipo_id'];

        $registro->save();

        $file = $request->file('imagem');
        if ($file) {
            app(GaleriaController::class)->salvar($request, $registro->id);
        }

        \Session::flash('mensagem', ['msg' => 'Registro criado com sucesso!', 'class' => 'green white-text']);

        return redirect()->route('admin.imoveis');

    }

    public function editar($id)
    {
        $registro          = Imovel::find($id);
        $registro->galeria = Galeria::select('imagem')->where('imovel_id', $registro->id)->first();


        $tipos   = Tipo::all();
        $cidades = Cidade::all();

        return view('admin.imoveis.editar', compact('registro', 'tipos', 'cidades'));

    }

    public function atualizar(Request $request, $id)
    {
        $registro = Imovel::find($id);
        $dados    = $request->all();

        $registro->titulo      = $dados['titulo'];
        $registro->descricao   = $dados['descricao'];
        $registro->status      = $dados['status'];
        $registro->status      = $dados['status'];
        $registro->endereco    = $dados['endereco'];
        $registro->cep         = $dados['cep'];
        $registro->valor       = $dados['valor'];
        $registro->dormitorios = $dados['dormitorios'];
        $registro->detalhes    = $dados['detalhes'];
        $registro->publicar    = $dados['publicar'];

        $registro->mapa = null;

        if (isset($dados['mapa']) && trim($dados['mapa']) != "") {
            $registro->mapa = trim($dados['mapa']);
        }

        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id   = $dados['tipo_id'];

        $file = $request->file('imagem');
        if ($file) {
            app(GaleriaController::class)->atualizar($request, $registro->id);
        }
        $registro->update();

        \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso!', 'class' => 'green white-text']);

        return redirect()->route('admin.imoveis');
    }

    public function deletar($id)
    {

        Imovel::find($id)->delete();

        \Session::flash('mensagem', ['msg' => 'Registro deletado com sucesso!', 'class' => 'green white-text']);
        return redirect()->route('admin.imoveis');

    }
}
