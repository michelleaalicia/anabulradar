@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="max-w-7xl mx-auto p-8">

        <h1 class="text-3xl font-bold mb-8">
            Dashboard
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-gray-500">Total Reports</p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $totalReports }}
                </h2>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-gray-500">Active Reports</p>

                <h2 class="text-4xl font-bold mt-2 text-orange-600">
                    {{ $activeReports }}
                </h2>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <p class="text-gray-500">Found Reports</p>

                <h2 class="text-4xl font-bold mt-2 text-green-600">
                    {{ $foundReports }}
                </h2>
            </div>

        </div>

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-2xl font-semibold mb-4">
                Recent Reports
            </h2>

            @forelse ($recentReports as $report)

                <div class="border-b py-3">

                    <div class="font-semibold">
                        {{ $report->pet_name }}
                    </div>

                    <div class="text-sm text-gray-500">
                        {{ $report->lost_location }}
                    </div>

                </div>

            @empty

                <p class="text-gray-500">
                    No reports yet.
                </p>

            @endforelse

        </div>

    </div>

@endsection