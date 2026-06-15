@extends('layouts.app')

@section('title', $petReport->pet_name)

@section('content')
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow p-8">

        <img src="{{ asset('storage/' . $petReport->photo) }}" alt="{{ $petReport->pet_name }}"
            class="w-full h-96 object-cover rounded-xl">

        <h1 class="text-4xl font-bold mt-6">
            {{ $petReport->pet_name }}
        </h1>

        <div class="grid md:grid-cols-2 gap-4 mt-6">
            <p><strong>Species:</strong> {{ $petReport->species }}</p>
            <p><strong>Breed:</strong> {{ $petReport->breed }}</p>
            <p><strong>Gender:</strong> {{ $petReport->gender }}</p>
            <p><strong>Age:</strong> {{ $petReport->age }}</p>
            <p><strong>Color:</strong> {{ $petReport->color }}</p>
            <p><strong>Status:</strong> {{ $petReport->status }}</p>
            <p><strong>Lost Location:</strong> {{ $petReport->lost_location }}</p>
            <p><strong>Lost Date:</strong> {{ $petReport->lost_date }}</p>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">
                Description
            </h2>

            <p class="text-gray-700">
                {{ $petReport->description }}
            </p>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">
                Contact
            </h2>

            <p class="text-gray-700">
                {{ $petReport->contact_number }}
            </p>
        </div>

        <hr class="my-8">

        <h2 class="text-2xl font-bold mb-4">
            Comments
        </h2>

        @forelse($petReport->comments as $comment)

            <div class="bg-gray-100 rounded-xl p-4 mb-3">

                <p class="font-semibold">
                    {{ $comment->user->name }}
                </p>

                <p class="mt-2">
                    {{ $comment->comment }}
                </p>

            </div>

        @empty

            <p class="text-gray-500">
                No comments yet.
            </p>

        @endforelse

        <hr class="my-8">

        <form action="{{ route('comments.store') }}" method="POST">

            @csrf

            <input type="hidden" name="pet_report_id" value="{{ $petReport->id }}">

            <textarea name="comment" rows="4"
                class="w-full rounded-lg border-gray-300 {{ $petReport->status == 'found' ? 'bg-gray-100 cursor-not-allowed' : '' }}"
                placeholder="Write your comment..." {{ $petReport->status == 'found' ? 'disabled' : '' }}></textarea>

            <button type="submit"
                class="mt-4 px-6 py-3 rounded-xl text-white {{ $petReport->status == 'found' ? 'bg-gray-400 cursor-not-allowed' : 'bg-orange-500 hover:bg-orange-600' }}"
                {{ $petReport->status == 'found' ? 'disabled' : '' }}>

                Add Comment

            </button>

        </form>

        @if ($petReport->user_id === auth()->id())

            <div class="mt-8 flex justify-center gap-4">

                @if ($petReport->status === 'active')

                    <button type="button" onclick="openFoundModal()"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition">

                        Mark as Found

                    </button>

                @else

                    <span class="bg-green-100 text-green-700 px-6 py-2 rounded-lg font-semibold">
                        ✅ Found
                    </span>

                @endif

                @if ($petReport->status == 'active')

                    <a href="{{ route('pet-reports.edit', $petReport) }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">

                        Edit

                    </a>

                @else

                    <button disabled class="bg-gray-300 text-gray-500 px-6 py-2 rounded-lg cursor-not-allowed">

                        Edit

                    </button>

                @endif

                @if ($petReport->status == 'active')

                    <form action="{{ route('pet-reports.destroy', $petReport) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg transition">

                            Delete

                        </button>

                    </form>

                @else

                    <button disabled class="bg-gray-300 text-gray-500 px-6 py-2 rounded-lg cursor-not-allowed">

                        Delete

                    </button>

                @endif

            </div>

        @endif

        <div id="foundModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">

            <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md mx-4">

                <h2 class="text-2xl font-bold text-gray-800 mb-3">
                    Mark as Found
                </h2>

                <p class="text-gray-600 mb-8">
                    Are you sure you want to mark this pet as found?
                    This action will update the report status.
                </p>

                <div class="flex justify-end gap-3">

                    <button onclick="closeFoundModal()"
                        class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition">

                        Cancel

                    </button>

                    <form action="{{ route('pet-reports.markAsFound', $petReport) }}" method="POST">

                        @csrf
                        @method('PATCH')

                        <button type="submit"
                            class="px-5 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white transition">

                            Yes, Mark as Found

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <script>

            function openFoundModal() {

                const modal = document.getElementById('foundModal');

                modal.classList.remove('hidden');
                modal.classList.add('flex');

            }

            function closeFoundModal() {

                const modal = document.getElementById('foundModal');

                modal.classList.remove('flex');
                modal.classList.add('hidden');

            }

        </script>
    </div>
@endsection