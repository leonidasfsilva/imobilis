<div class="input-field">
    <label>Título *</label>
    <input type="text" name="titulo" class="validade" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
</div>
<div class="input-field">
    <label>Descrição</label>
    <input type="text" name="descricao" class="validade"
           value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
</div>

<div class="row">
    <div class="file-field input-field col m12 s12">
        <label>Imagem *</label>
        <div class="btn">
            <span>selecionar imagem</span>
            <input type="file" name="imagem">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validade" readonly>
        </div>
    </div>
    <div class="col m12 s12">
        @if(isset($registro->galeria->imagem))
            <img width="120" src="{{ asset($registro->galeria->imagem)}}">
        @else
            <img width="120" src="{{ asset('img/no-image.png') }}">
        @endif
    </div>
</div>

<div class="input-field">
    <label>Status *</label>
    <select name="status">
        <option value=""><< Selecione >></option>
        <option value="aluga" {{(isset($registro->status) && $registro->status == 'aluga'  ? 'selected' : '')}}>Aluga
        </option>
        <option value="vende" {{(isset($registro->status) && $registro->status == 'vende'  ? 'selected' : '')}}>Vende
        </option>
    </select>
</div>

<div class="input-field">
    <label>Tipo de Imóvel *</label>
    <select name="tipo_id">
        <option value=""><< Selecione >></option>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{(isset($registro->tipo_id) && $registro->tipo_id == $tipo->id  ? 'selected' : '')}}>
                {{ $tipo->titulo }}
            </option>
        @endforeach
    </select>
</div>

<div class="input-field">
    <label>Endereço</label>
    <input type="text" name="endereco" class="validate"
           value="{{(isset($registro->endereco) ? $registro->endereco : '')}}">
</div>

<div class="input-field">
    <label>CEP </label>
    <small>(Exemplo: 96848-146)</small>
    <input type="text" name="cep" class="validate" value="{{(isset($registro->cep) ? $registro->cep : '')}}">
</div>

<div class="input-field">
    <label>Cidade *</label>
    <select name="cidade_id">
        <option value=""><< Selecione >></option>
        @foreach($cidades as $cidade)
            <option
                value="{{ $cidade->id }}" {{(isset($registro->cidade_id) && $registro->cidade_id == $cidade->id  ? 'selected' : '')}}>
                {{ $cidade->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="input-field">
    <label>Valor *</label>
    <small>(Exemplo: 175900.99 é igual a R$ 175.900,99)</small>
    <input type="text" name="valor" class="validate" value="{{(isset($registro->valor) ? $registro->valor : '')}}">
</div>

<div class="input-field">
    <label>Dormitórios </label>
    <small>(Exemplo: 3)</small>
    <input type="text" name="dormitorios" class="validate"
           value="{{(isset($registro->dormitorios) ? $registro->dormitorios : '')}}">
</div>

<div class="input-field">
    <label>Detalhes </label>
    <small>(Exemplo: Sacada: 1 - Banheiro: 2 - Sala de Jantar - Churrasqueira)</small>
    <input type="text" name="detalhes" class="validate"
           value="{{(isset($registro->detalhes) ? $registro->detalhes : '')}}">
</div>

<div class="input-field">
    <label>Mapa </label>
    <small>(Cole o iframe do Google Maps)</small>
    <textarea name="mapa" class="materialize-textarea">{{(isset($registro->mapa) ? $registro->mapa : '')}}</textarea>
</div>

<div class="input-field">
    <label>Publicar? *</label>
    <select name="publicar">
        <option value="nao" {{(isset($registro->publicar) && $registro->publicar == 'nao'  ? 'selected' : '')}}>Não
        </option>
        <option value="sim" {{(isset($registro->publicar) && $registro->publicar == 'sim'  ? 'selected' : '')}}>Sim
        </option>
    </select>
</div>




