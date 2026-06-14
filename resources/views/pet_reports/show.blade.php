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

            <textarea name="comment" rows="4" class="w-full rounded-lg border-gray-300"
                placeholder="Write your comment..."></textarea>

            <button type="submit" class="mt-4 bg-amber-700 text-white px-6 py-3 rounded-xl">

                Add Comment

            </button>

        </form>

        <div class="mt-8 flex gap-4">

            <a href="{{ route('pet-reports.edit', $petReport) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                Edit
            </a>

            <form action="{{ route('pet-reports.destroy', $petReport) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Delete this report?')"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg transition">
                    Delete
                </button>

            </form>

        </div>

    </div>
@endsection