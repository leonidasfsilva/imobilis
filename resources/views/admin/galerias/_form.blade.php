@if(isset($registro->imagem))

    <div class="input-field">
        <label>Título</label>
        <input type="text" name="titulo" class="validade" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
    </div>
    <div class="input-field">
        <label>Descrição</label>
        <input type="text" name="descricao" class="validade" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
    </div>
    <div class="input-field">
        <label>Ordem</label>
        <input type="text" name="ordem" class="validade" value="{{ isset($registro->ordem) ? $registro->ordem : '' }}">
    </div>
    <div class="row">
        <div class="file-field input-field col m6 s12">
            <div class="btn">
                <span>Imagem</span>
                <input type="file" name="imagem">
            </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path validade">
            </div>
        </div>
        <div class="col m6 s12">
            <img width="120" src="{{ asset($registro->imagem) }}">
        </div>
    </div>
@else
    <div class="row">
        <div class="file-field input-field col m12 s12">
            <div class="btn">
                <span>Selecionar Imagens</span>
                <input type="file" multiple name="imagens[]">
            </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path validade">
            </div>
        </div>
    </div>
@endif











