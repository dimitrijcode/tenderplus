<x-site-layout>

    <h1>Edit {{ $tender->title }}</h1>
    <form action="{{ route('admin.tenders.update', $tender->id) }}" method="POST">
        @method('PUT')
        @csrf

        <x-form-text-input name="title" label="Title" placeholder="Title" value="{{ $tender->title }}" />

        <x-form-textarea name="description" label="Description" placeholder="Tender description" value="{{ $tender->description }}" />

        <div>
            <label for="organization_name">Organization</label><br>
            <input type="text" name="organization_name" placeholder="Organization" value="{{ $tender->organization_name }}">
            @error('organization_name') <div style="color: red;">{{ $message }} </div> @enderror
        </div>

        <button type="submit">Save changes</button>
    </form>

</x-site-layout>
