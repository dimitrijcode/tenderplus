<x-site-layout>

    <h1>Tenders management</h1>

    <div>
        <a href="{{ route('admin.tenders.create') }}">Create Tender</a>
    </div>

    @foreach($tenders as $tender)
        <div>
            {{ $tender->title }} <a href="">edit</a> <a href="">delete</a>
        </div>
    @endforeach

</x-site-layout>
