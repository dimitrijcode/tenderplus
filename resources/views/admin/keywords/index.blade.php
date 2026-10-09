<x-site-layout>

    <h1>Keywords management</h1>

    <div>
        <a href="{{ route('admin.keywords.create') }}">Create Keyword</a>
    </div>

    @foreach($keywords as $keyword)
        <div>
            {{ $keyword->name }}
        </div>
    @endforeach

</x-site-layout>
