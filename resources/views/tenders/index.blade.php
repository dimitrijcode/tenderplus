<x-site-layout>

    <h1 class="text-2xl font-bold">Tenders overview</h1>
    <p>This is the full content of our tender platform</p>
    <ul class="grid grid-cols-3 mt-8 gap-8">
        @foreach($tenders as $tender)
            <li class="p-1 border-t border-black hover:bg-gray-200">
                @foreach($tender->keywords as $keyword)
                    <span class="bg-black text-green-200 text-xs rounded-full px-2">{{ $keyword->name }}</span>
                @endforeach

                <a class="block text-xl font-semibold" href="{{ route('tenders.show', $tender) }}">
                    {{ $tender->title }}
                </a>
                <span class="italic text-sm">by {{ $tender->organization_name }} ({{ $tender->location }}) · entered by {{ $tender->user?->name ?? '—' }}</span>
                <a class="block mt-4 text-gray-700" href="{{ route('tenders.show', $tender) }}">
                    {{ Str::limit($tender->description, 100) }}
                </a>
            </li>
        @endforeach
    </ul>


</x-site-layout>
