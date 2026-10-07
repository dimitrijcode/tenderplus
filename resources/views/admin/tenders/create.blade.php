<x-site-layout>

    <h1>Create new tender</h1>
    <form action="{{ route('admin.tenders.store') }}" method="POST">

        @csrf

        <div>
            <label for="title">Title</label><br>
            <input type="text" name="title" placeholder="Title">
        </div>

        <div>
            <label for="description">Description</label><br>
            <textarea name="description" placeholder="Tender description"></textarea>
        </div>

        <div>
            <label for="organization_name">Organization</label><br>
            <input type="text" name="organization_name" placeholder="Organization">
        </div>

        <div>
            <label for="location">Location</label><br>
            <input type="text" name="location" placeholder="Location">
        </div>

        <div>
            <label for="budget">Budget (€)</label><br>
            <input type="number" step="0.01" name="budget" placeholder="Budget">
        </div>

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
