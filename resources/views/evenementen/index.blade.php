@extends('layouts.app')

@section('title', 'Evenementen Overzicht')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Evenementen Overzicht</h1>
    @if($evenementen->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <h3 class="text-xl font-bold mb-2">Geen Evenementen</h3>
            <p class="text-gray-500">Er zijn momenteel geen evenementen beschikbaar. Kom later terug voor nieuwe events!</p>
        </div>
    @else
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full border border-gray-300 bg-white">
                <thead>
                    <tr class="bg-yellow-400">
                        <th class="px-6 py-5 text-left text-base font-extrabold text-black uppercase border-b-4 border-gray-300">Type</th>
                        <th class="px-6 py-5 text-left text-base font-extrabold text-black uppercase border-b-4 border-gray-300">Evenement</th>
                        <th class="px-6 py-5 text-left text-base font-extrabold text-black uppercase border-b-4 border-gray-300">Datum & Tijd</th>
                        <th class="px-6 py-5 text-left text-base font-extrabold text-black uppercase border-b-4 border-gray-300">Locatie</th>
                        <th class="px-6 py-5 text-left text-base font-extrabold text-black uppercase border-b-4 border-gray-300">Prijs</th>
                        <th class="px-6 py-5 text-left text-base font-extrabold text-black uppercase border-b-4 border-gray-300">Capaciteit</th>
                        <th class="px-6 py-5 text-center text-base font-extrabold text-black uppercase border-b-4 border-gray-300">Actie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evenementen as $i => $evenement)
                        <tr class="@if($i % 2 === 0) bg-white @else bg-gray-50 @endif border-b-2 border-gray-300">
                            <td class="px-6 py-6 align-middle">
                                @if($evenement->evenementType)
                                    <span class="inline-block px-3 py-1 text-base font-semibold rounded-full
                                        @if($evenement->evenementType->naam == 'Workshop') bg-blue-100 text-blue-800
                                        @elseif($evenement->evenementType->naam == 'Concert') bg-purple-100 text-purple-800
                                        @elseif($evenement->evenementType->naam == 'Conferentie') bg-green-100 text-green-800
                                        @else bg-gray-200 text-gray-800
                                        @endif">
                                        {{ $evenement->evenementType->naam }}
                                    </span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-6 align-middle">
                                <div class="font-bold text-lg text-gray-900">{{ $evenement->naam }}</div>
                                @if($evenement->beschrijving)
                                    <div class="text-gray-500 text-sm">{{ Str::limit($evenement->beschrijving, 60) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-6 align-middle">
                                <div class="text-gray-900 text-lg">{{ $evenement->datum->format('d M Y') }}</div>
                                @if($evenement->tijd)
                                    <div class="text-gray-500 text-sm">{{ $evenement->tijd->format('H:i') }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-6 align-middle text-lg">{{ $evenement->locatie }}</td>
                            <td class="px-6 py-6 align-middle">
                                @if($evenement->prijs > 0)
                                    <span class="text-green-700 font-semibold text-lg">€{{ number_format($evenement->prijs, 2) }}</span>
                                @else
                                    <span class="inline-block px-2 py-1 bg-green-100 text-green-800 text-base rounded">Gratis</span>
                                @endif
                            </td>
                            <td class="px-6 py-6 align-middle text-lg">{{ $evenement->capaciteit }}</td>
                            <td class="px-6 py-6 align-middle text-center">
                                <a href="{{ route('evenementen.show', $evenement) }}"
                                   class="inline-flex items-center px-5 py-3 bg-yellow-400 text-black text-base font-bold rounded hover:bg-yellow-500 transition border-2 border-yellow-400 hover:border-yellow-500">
                                    Details
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection 