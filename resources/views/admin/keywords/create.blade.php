<x-site-layout>

    <h1>Create new keyword</h1>
    <form action="{{ route('admin.keywords.store') }}" method="POST">

        @csrf

        <x-form-text-input name="name" label="Name" placeholder="Name" />

        <button type="submit">Create keyword</button>
    </form>

</x-site-layout>
