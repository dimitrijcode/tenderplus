<x-site-layout>

    <h1>{{ $tender->title }}</h1>

    <p><a href="{{ route('admin.tenders.index') }}">Back to tenders management</a></p>

    <ul>
        <li>Organization: {{ $tender->organization_name }}</li>
        <li>Location: {{ $tender->location }}</li>
        <li>Budget: {{ $tender->budget }}</li>
        <li>Deadline: {{ $tender->deadline }}</li>
        <li>Source: {{ $tender->source_url }}</li>
        <li>Public: {{ $tender->is_public ? 'yes' : 'no' }}</li>
        <li>Status: {{ $tender->status }}</li>
        <li>Owner: {{ $tender->user?->name ?? '—' }}</li>
        <li>Keywords: {{ $tender->keywords->pluck('name')->join(', ') }}</li>
    </ul>

    <p>{{ $tender->description }}</p>

    <a href="{{ route('admin.tenders.edit', $tender->id) }}">edit</a>

</x-site-layout>
