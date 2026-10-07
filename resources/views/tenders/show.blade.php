<x-site-layout>

    <h1>{{ $tender->title }}</h1>
    <p><i>{{ $tender->organization_name }} ({{ $tender->location }}) · entered by {{ $tender->user?->name ?? '—' }}</i></p>
    <p>{{ $tender->description }}</p>
    <p>Budget: €{{ number_format($tender->budget, 2) }}</p>
    <p>Deadline: {{ $tender->deadline }}</p>
    <p><a href="{{ $tender->source_url }}">Original tender and application instructions</a></p>

</x-site-layout>
