@extends('layouts.app')

@section('title', $evenement->naam)

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <div class="rounded-lg shadow-lg overflow-hidden border border-gray-200 bg-white">
        <div class="bg-yellow-400 px-8 py-8">
            <h1 class="text-3xl font-extrabold text-black mb-2">{{ $evenement->naam }}</h1>
            @if($evenement->evenementType)
                <span class="inline-block px-4 py-1 text-base font-semibold rounded-full bg-white text-yellow-700 uppercase">{{ $evenement->evenementType->naam }}</span>
            @endif
        </div>
        <div class="px-8 py-8">
            <dl class="grid grid-cols-1 gap-y-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500 uppercase">Datum</dt>
                    <dd class="text-lg font-bold text-gray-900">{{ $evenement->datum->format('d M Y') }}</dd>
                </div>
                @if($evenement->tijd)
                <div>
                    <dt class="text-sm font-medium text-gray-500 uppercase">Tijd</dt>
                    <dd class="text-lg font-bold text-gray-900">{{ $evenement->tijd->format('H:i') }}</dd>
                </div>
                @endif
                <div>
                    <dt class="text-sm font-medium text-gray-500 uppercase">Locatie</dt>
                    <dd class="text-lg font-bold text-gray-900">{{ $evenement->locatie }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 uppercase">Prijs</dt>
                    <dd class="text-lg font-bold text-gray-900">
                        @if($evenement->prijs > 0)
                            €{{ number_format($evenement->prijs, 2) }}
                        @else
                            Gratis
                        @endif
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 uppercase">Capaciteit</dt>
                    <dd class="text-lg font-bold text-gray-900">{{ $evenement->capaciteit }}</dd>
                </div>
            </dl>
            @if($evenement->beschrijving)
                <div class="mt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Beschrijving</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $evenement->beschrijving }}</p>
                </div>
            @endif
            <div class="mt-8 flex justify-end">
                <a href="{{ route('evenementen.index') }}" class="px-6 py-3 bg-yellow-400 text-black font-bold rounded hover:bg-yellow-500 border-2 border-yellow-400 hover:border-yellow-500 transition">Terug naar overzicht</a>
            </div>
        </div>
    </div>
</div>
@endsection 