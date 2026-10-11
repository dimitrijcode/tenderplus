<x-site-layout>

    <h1 class="text-2xl font-bold">Tenders overview</h1>
    <p>This is the full content of our tender platform</p>

    <form method="GET" action="{{ route('tenders.index') }}" class="mt-4">
        <input type="search" name="q" placeholder="Search by title" value="{{ request('q') }}">
        <select name="keyword">
            <option value="">All keywords</option>
            @foreach ($keyword_options as $id => $name)
                <option value="{{ $id }}" @selected(request('keyword') == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <input type="text" name="location" placeholder="Location" value="{{ request('location') }}">
        <select name="sort">
            <option value="">Default order</option>
            <option value="budget_asc" @selected(request('sort') === 'budget_asc')>Budget: low to high</option>
            <option value="budget_desc" @selected(request('sort') === 'budget_desc')>Budget: high to low</option>
            <option value="deadline_asc" @selected(request('sort') === 'deadline_asc')>Deadline: soonest first</option>
            <option value="deadline_desc" @selected(request('sort') === 'deadline_desc')>Deadline: latest first</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <ul class="grid grid-cols-3 mt-8 gap-8">
        @foreach($tenders as $tender)
            <li class="p-1 border-t border-black hover:bg-gray-200">
                @foreach($tender->keywords as $keyword)
                    <span class="bg-black text-green-200 text-xs rounded-full px-2">{{ $keyword->name }}</span>
                @endforeach

                <a class="block text-xl font-semibold" href="{{ route('tenders.show', $tender) }}">
                    {{ $tender->title }}
                </a>
                <span class="italic text-sm">by {{ $tender->organization_name }} ({{ $tender->location }}) · entered by {{ $tender->user?->name ?? '—' }}</span>
                <a class="block mt-4 text-gray-700" href="{{ route('tenders.show', $tender) }}">
                    {{ Str::limit($tender->description, 100) }}
                </a>
            </li>
        @endforeach
    </ul>


</x-site-layout>
