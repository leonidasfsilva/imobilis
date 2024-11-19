<div class="row section">
	<h3 align="center">Imóveis</h3>
	<div class="divider"></div>
	<br>
	@include('layouts._site._filtros')
</div>
<div class="row section">
@foreach($imoveis as $imovel)
	<div class="col s12 m3">
		<div class="card">
			<div class="card-image">
				<a href="{{ route('site.imovel',[$imovel->id,str_slug($imovel->titulo,'_')]) }}">
                    <img style="#max-height: 150px;" src="{{ isset($imovel->galeria->imagem) ? asset($imovel->galeria->imagem) : asset('img/no-image.png')}}" alt="{{ $imovel->titulo }}">
                </a>
			</div>
			<div class="card-content">
				<p><b class="deep-orange-text darken-1">{{ $imovel->status }}</b></p>
				<p><b>{{ $imovel->titulo }}</b></p>
				<p>R${{ number_format($imovel->valor,2,",",".") }}</p>
			</div>
			<div class="card-action ">
				<a href="{{ route('site.imovel',[$imovel->id,str_slug($imovel->titulo,'_')]) }}" class="teal-text text-transform-none">Ver detalhes</a>
			</div>
		</div>
	</div>
@endforeach


</div>
@if($paginacao)
	<div align="center" class="row">
		{{ $imoveis->links() }}
	</div>
@endif
