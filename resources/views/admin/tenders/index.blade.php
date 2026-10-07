<x-site-layout>

    <h1>Tenders management</h1>

    <div>
        <a href="{{ route('admin.tenders.create') }}">Create Tender</a>
    </div>

    @foreach($tenders as $tender)
        <div>
            {{ $tender->title }}
            <a href="{{ route('admin.tenders.edit', $tender->id) }}">edit</a>
            <form action="{{ route('admin.tenders.destroy', $tender->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete this tender?')">delete</button>
            </form>
        </div>
    @endforeach

</x-site-layout>
