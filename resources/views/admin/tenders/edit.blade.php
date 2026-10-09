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

        <x-form-text-input name="location" label="Location" placeholder="Location" value="{{ $tender->location }}" />

        <x-form-number-input name="budget" label="Budget (€)" placeholder="Budget" step="0.01" value="{{ $tender->budget }}" />

        <div>
            <label for="deadline">Deadline</label><br>
            <input type="datetime-local" name="deadline" value="{{ $tender->deadline }}">
        </div>

        <div>
            <label for="source_url">Source URL</label><br>
            <input type="url" name="source_url" placeholder="https://" value="{{ $tender->source_url }}">
        </div>

        <div>
            <label for="is_public">Public</label>
            <input type="checkbox" name="is_public" value="1" @checked($tender->is_public)>
        </div>

        <div>
            <label for="status">Status</label><br>
            <select name="status">
                <option value="open" @selected($tender->status === 'open')>Open</option>
                <option value="closed" @selected($tender->status === 'closed')>Closed</option>
            </select>
        </div>

        <button type="submit">Save changes</button>
    </form>

</x-site-layout>
