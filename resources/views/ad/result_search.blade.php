<x-layout>
    <x-slot name='title'>Affiliate - {{ $q }} ads</x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4 text-center">{{ __('Resultado de tu búsqueda:') }} {{ $q }}</h1>

                

            </div>
        </div>
        <div class="row">
            @forelse($ads as $ad)
                <div class="col-12 col-md-4">
                    <div class="card researchCard mb-5">

                        <img src="{{ !$ad->images()->get()->isEmpty()? $ad->images()->first()->getUrl(400, 300): 'https://picsum.photos/400/300' }}"
                            class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title"> {{ $ad->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }}</h6>
                            <p class="card-text">{{ $ad->body }}</p>
                            <div class="card-subtitle mb-2">
                                {{-- <strong><a href="{{route('category.ads',$ad->category)}}">#{{$category->name}}</a></strong> --}}
                                <strong><a
                                        href="{{ route('category.ads', $ad->Category::find($ad->category_id)) }}">#{{ $ad->Category::find($ad->category_id)->name }}</a></strong>
                                <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                            </div>
                            <div class="card-subtitle mb-2">
                                <small>{{ $ad->user->name }}</small>
                            </div>
                            <a href="{{ route('ads.show', $ad) }}" class="btn btn-dark">{{ __('Mostrar más') }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h2>{{ __('Uy.. parece que no hay nada de esta categoría') }}</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-dark">{{ __('Vende tu primer objeto') }}</a>
                    {{ __('o') }} <a href="{{ route('inicio') }}"
                        class="btn btn-dark">{{ __('Volver al inicio') }}</a>
                </div>
            @endforelse
        </div>
    </div>
    {{ $ads->links() }}
</x-layout>
