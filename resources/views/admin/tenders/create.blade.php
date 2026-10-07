<x-site-layout>

    <h1>Create new tender</h1>
    <form action="#" method="POST">

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

        <button type="submit">Create tender</button>
    </form>

</x-site-layout>
