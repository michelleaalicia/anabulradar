@extends('layouts.app')

@section('title', 'Pet Reports')

@section('content')

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold">
                Pet Reports
            </h1>

            <a href="{{ route('pet-reports.create') }}" class="bg-amber-700 text-white px-5 py-3 rounded-xl">

                + Create Report

            </a>

        </div>

        <div class="grid md:grid-cols-3 gap-6">

            @forelse($reports as $report)

                <div class="bg-white rounded-2xl shadow overflow-hidden">

                    <img src="{{ asset('storage/' . $report->photo) }}" alt="{{ $report->pet_name }}"
                        class="w-full h-56 object-cover">

                    <div class="p-6">

                        <h2 class="text-2xl font-bold">
                            {{ $report->pet_name }}
                        </h2>

                        <p class="text-gray-500 mt-2">
                            {{ $report->species }}
                        </p>

                        <p class="text-gray-500">
                            {{ $report->breed }}
                        </p>

                        <p class="text-gray-500">
                            {{ $report->lost_location }}
                        </p>

                        <a href="{{ route('pet-reports.show', $report) }}"
                            class="inline-block mt-4 text-amber-700 font-semibold">

                            View Details →

                        </a>

                    </div>

                </div>

            @empty

                <p>No reports found.</p>

            @endforelse

        </div>

    </div>

@endsection