<x-site-layout>

    <h1>Admin dashboard</h1>

    <ul>
        @foreach ($counts as $label => $count)
            <li>{{ $label }}: {{ $count }}</li>
        @endforeach
    </ul>

</x-site-layout>
