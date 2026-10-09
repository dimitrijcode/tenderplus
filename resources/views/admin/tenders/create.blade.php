<x-site-layout>

    <h1>Create new tender</h1>
    <form action="{{ route('admin.tenders.store') }}" method="POST">

        @csrf

        <div>
            <label for="title">Title</label><br>
            <input type="text" name="title" placeholder="Title">
            @error('title') <div style="color: red;">{{ $message }} </div> @enderror
        </div>

        <div>
            <label for="description">Description</label><br>
            <textarea name="description" placeholder="Tender description"></textarea>
            @error('description') <div style="color: red;">{{ $message }} </div> @enderror
        </div>

        <div>
            <label for="organization_name">Organization</label><br>
            <input type="text" name="organization_name" placeholder="Organization">
            @error('organization_name') <div style="color: red;">{{ $message }} </div> @enderror
        </div>

        <button type="submit">Create tender</button>
    </form>

</x-site-layout>
