<x-site-layout>

    <h1>Keywords management</h1>

    <div>
        <a href="{{ route('admin.keywords.create') }}">Create Keyword</a>
    </div>

    @foreach($keywords as $keyword)
        <div>
            {{ $keyword->name }}
            <a href="{{ route('admin.keywords.edit', $keyword->id) }}">edit</a>
            <form action="{{ route('admin.keywords.destroy', $keyword->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete this keyword?')">delete</button>
            </form>
        </div>
    @endforeach

</x-site-layout>
