<x-site-layout>

    <h1 class="text-2xl font-bold">{{ $keyword->name }}</h1>
    <p class="mt-1 mb-6"><i>{{ $keyword->tenders_count }} {{ Str::plural('tender', $keyword->tenders_count) }}</i></p>

    <ul class="grid grid-cols-3 gap-8">
        @forelse($tenders as $tender)
            <li class="p-1 border-t border-black hover:bg-gray-200">
                <a class="block text-xl font-semibold" href="{{ route('tenders.show', $tender) }}">
                    {{ $tender->title }}
                </a>
                <span class="italic text-sm">by {{ $tender->organization_name }} ({{ $tender->location }}) · entered by {{ $tender->user?->name ?? '—' }}</span>
                <a class="block mt-4 text-gray-700" href="{{ route('tenders.show', $tender) }}">
                    {{ Str::limit($tender->description, 100) }}
                </a>
            </li>
        @empty
            <li>No tenders for this keyword yet.</li>
        @endforelse
    </ul>

</x-site-layout>
