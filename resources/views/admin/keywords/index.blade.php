<x-site-layout>

    <h1>Keywords management</h1>

    <div>
        <a href="{{ route('admin.keywords.create') }}">Create Keyword</a>
    </div>

    @foreach($keywords as $keyword)
        <div>
            {{ $keyword->name }}
            <a href="{{ route('admin.keywords.edit', $keyword->id) }}">edit</a>
        </div>
    @endforeach

</x-site-layout>
