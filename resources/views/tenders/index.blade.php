<x-site-layout>

    <h1>Tenders overview</h1>
    <p>This is the full content of our tender platform</p>
    <ul>
        @foreach($tenders as $tender)
            <li>
                <a href="{{ route('tenders.show', $tender) }}">
                    <b>{{ $tender->title }}</b>
                </a>
                by {{ $tender->organization_name }} ({{ $tender->location }})
            </li>
        @endforeach
    </ul>


</x-site-layout>
