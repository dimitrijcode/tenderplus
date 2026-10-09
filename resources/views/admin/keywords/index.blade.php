<x-site-layout>

    <h1>Keywords management</h1>

    @foreach($keywords as $keyword)
        <div>
            {{ $keyword->name }}
        </div>
    @endforeach

</x-site-layout>
