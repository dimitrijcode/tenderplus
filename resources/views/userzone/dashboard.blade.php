<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">Recommended for you</h3>

                    @forelse ($recommended as $tender)
                        <div class="mt-2">
                            <a class="underline" href="{{ route('tenders.show', $tender) }}">{{ $tender->title }}</a>
                            <span class="text-sm text-gray-600">by {{ $tender->organization_name }}</span>
                        </div>
                    @empty
                        <p class="mt-2 text-sm text-gray-600">
                            No matches yet. <a class="underline" href="{{ route('profile.edit') }}">Pick some keywords in your profile</a>.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
