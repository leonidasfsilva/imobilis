<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Galeria;
use App\Models\Imovel;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function index($id)
    {
        $imovel = Imovel::find($id);

        $registros = $imovel->galeria()->orderBy('ordem')->get();
        return view('admin.galerias.index', compact('registros', 'imovel'));
    }

    public function adicionar($id)
    {

        $imovel = Imovel::find($id);

        return view('admin.galerias.adicionar', compact('imovel'));
    }

    public function salvar(Request $request, $idImovel)
    {
        $imovel     = Imovel::find($idImovel);
        $dadosForm  = $request->all();
        $ordemAtual = 0;

        if ($imovel->galeria()->count()) {
            $galeria    = $imovel->galeria()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        }

        $registro = new Galeria();

        if ($request->hasFile('imagens')) {
            $arquivos = $request->file('imagens');
            foreach ($arquivos as $imagem) {

                $rand        = rand(11111, 99999);
                $diretorio   = "img/imoveis/" . str_slug($imovel->titulo, '_') . "/";
                $ext         = $imagem->guessClientExtension();
                $nomeArquivo = "_img_" . $rand . "." . $ext;
                $imagem->move($diretorio, $nomeArquivo);
                $registro->imovel_id = $imovel->id;
                $registro->ordem     = $ordemAtual + 1;
                $ordemAtual++;
                $registro->imagem = $diretorio . $nomeArquivo;
                $registro->save();
            }
        } else {
            $imagem      = $request->file('imagem');
            $rand        = rand(11111, 99999);
            $diretorio   = "img/imoveis/" . str_slug($imovel->titulo, '_') . "/";
            $ext         = $imagem->guessClientExtension();
            $nomeArquivo = "_img_" . $rand . "." . $ext;
            $imagem->move($diretorio, $nomeArquivo);
            $registro->imovel_id = $imovel->id;
            $registro->ordem     = $ordemAtual;
            $registro->imagem = $diretorio . $nomeArquivo;
            $registro->save();
        }

        if ($dadosForm['_action'] == 'galeria') {
            \Session::flash('mensagem', ['msg' => 'Registro criado com sucesso!', 'class' => 'green white-text']);
            return redirect()->route('admin.galerias', $imovel->id);
        }
        return true;
    }

    public
    function editar($id)
    {
        $registro = Galeria::find(9);
        $imovel   = Imovel::find($id);

        $imovelObj = $registro->imovel;

        return view('admin.galerias.editar', compact('registro', 'imovel'));

    }

    public
    function atualizar(Request $request, $idImovel)
    {
        $dadosForm = $request->all();

        if ($dadosForm['_action'] == 'galeria') {
            if (!$dadosForm['idGaleria']) return false;

            $galeria            = Galeria::find($dadosForm['idGaleria']);
            $galeria->titulo    = $dadosForm['titulo'];
            $galeria->descricao = $dadosForm['descricao'];
            $galeria->ordem     = $dadosForm['ordem'];
            $imovel             = $galeria->imovel;
        } else {
            $galeria = Galeria::where('imovel_id', '=', $idImovel)->first();
            $imovel  = $galeria->imovel;
        }

        try {
            if ($galeria->imagem) {
                unlink(public_path($galeria->imagem));
            }
        } catch (\Exception $e) {

        }

        $file = $request->file('imagem');
        if ($file) {
            $rand        = rand(11111, 99999);
            $diretorio   = "img/imoveis/" . str_slug($imovel->titulo, '_') . "/";
            $ext         = $file->guessClientExtension();
            $nomeArquivo = "_img_" . $rand . "." . $ext;
            $file->move($diretorio, $nomeArquivo);
            $galeria->imagem = $diretorio . $nomeArquivo;
        }

        $galeria->update();

        if ($dadosForm['_action'] == 'galeria') {
            \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso!', 'class' => 'green white-text']);
            return redirect()->route('admin.galerias', $imovel->id);
        }
        return true;
    }

    public
    function deletar($id)
    {

        $galeria = Galeria::find($id);
        $imovel  = $galeria->imovel;

        if ($galeria->imagem) {
            unlink(public_path($galeria->imagem));
        }

        $galeria->delete();

        \Session::flash('mensagem', ['msg' => 'Registro deletado com sucesso!', 'class' => 'green white-text']);

        return redirect()->route('admin.galerias', $imovel->id);

    }
}
