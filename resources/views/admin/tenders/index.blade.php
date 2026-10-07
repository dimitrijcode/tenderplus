<x-site-layout>

    <h1>Tenders management</h1>
    @foreach($tenders as $tender)
        <div>
            {{ $tender->title }} <a href="">edit</a> <a href="">delete</a>
        </div>
    @endforeach

</x-site-layout>
