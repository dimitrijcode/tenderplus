<x-site-layout>

    <h1>Create new tender</h1>
    <form action="{{ route('admin.tenders.store') }}" method="POST">

        @csrf

        <x-form-text-input name="title" label="Title" placeholder="Title" />

        <x-form-textarea name="description" label="Description" placeholder="Tender description" />

        <div>
            <label for="organization_name">Organization</label><br>
            <input type="text" name="organization_name" placeholder="Organization">
            @error('organization_name') <div style="color: red;">{{ $message }} </div> @enderror
        </div>

        <div>
            <label for="location">Location</label><br>
            <input type="text" name="location" placeholder="Location">
        </div>

        <x-form-number-input name="budget" label="Budget (€)" placeholder="Budget" step="0.01" />

        <div>
            <label for="deadline">Deadline</label><br>
            <input type="datetime-local" name="deadline">
        </div>

        <div>
            <label for="source_url">Source URL</label><br>
            <input type="url" name="source_url" placeholder="https://">
        </div>

        <div>
            <label for="is_public">Public</label>
            <input type="checkbox" name="is_public" value="1" checked>
        </div>

        <div>
            <label for="status">Status</label><br>
            <select name="status">
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>
        </div>

        <button type="submit">Create tender</button>
    </form>

</x-site-layout>
