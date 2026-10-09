<x-site-layout>

    @foreach($tender->keywords as $keyword)
        <span class="bg-black text-green-200 text-xs rounded-full px-2">{{ $keyword->name }}</span>
    @endforeach
    <h1 class="text-2xl font-bold">{{ $tender->title }}</h1>
    <p class="mt-1 mb-6"><i>{{ $tender->organization_name }} ({{ $tender->location }}) · entered by {{ $tender->user?->name ?? '—' }}</i></p>

    <div>
        <p>{{ $tender->description }}</p>
    </div>

    <div class="py-1 border-t border-black mt-6 mb-8">
        <p>Budget: €{{ number_format($tender->budget, 2) }}</p>
        <p>Deadline: {{ $tender->deadline }}</p>
        <p><a href="{{ $tender->source_url }}">Original tender and application instructions</a></p>
    </div>

</x-site-layout>
