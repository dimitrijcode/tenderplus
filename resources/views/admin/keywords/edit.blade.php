<x-site-layout>

    <h1>Edit {{ $keyword->name }}</h1>
    <form action="{{ route('admin.keywords.update', $keyword->id) }}" method="POST">
        @method('PUT')
        @csrf

        <x-form-text-input name="name" label="Name" placeholder="Name" value="{{ $keyword->name }}" />

        <button type="submit">Save changes</button>
    </form>

</x-site-layout>
