<x-site-layout>

    <h1>Edit {{ $tender->title }}</h1>
    <form action="{{ route('admin.tenders.update', $tender->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div>
            <label for="title">Title</label><br>
            <input type="text" name="title" placeholder="Title" value="{{ $tender->title }}">
        </div>

        <div>
            <label for="description">Description</label><br>
            <textarea name="description" placeholder="Tender description">{{ $tender->description }}</textarea>
        </div>

        <div>
            <label for="organization_name">Organization</label><br>
            <input type="text" name="organization_name" placeholder="Organization" value="{{ $tender->organization_name }}">
        </div>

        <button type="submit">Save changes</button>
    </form>

</x-site-layout>
