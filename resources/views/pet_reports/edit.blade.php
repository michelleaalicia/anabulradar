@extends('layouts.app')

@section('title', 'Edit Pet Report')

@section('content')

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">

        <h1 class="text-3xl font-bold mb-8">
            Edit Pet Report
        </h1>

        <form action="{{ route('pet-reports.update', $petReport) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="space-y-4">

                <div>
                    <label class="block mb-1 font-medium">Pet Name</label>
                    <input type="text" name="pet_name" value="{{ old('pet_name', $petReport->pet_name) }}"
                        class="w-full rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Species</label>

                    <select name="species" class="w-full rounded-lg border-gray-300">

                        <option value="Cat" {{ $petReport->species == 'Cat' ? 'selected' : '' }}>
                            Cat
                        </option>

                        <option value="Dog" {{ $petReport->species == 'Dog' ? 'selected' : '' }}>
                            Dog
                        </option>

                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Breed</label>

                    <input type="text" name="breed" value="{{ old('breed', $petReport->breed) }}"
                        class="w-full rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Gender</label>

                    <input type="text" name="gender" value="{{ old('gender', $petReport->gender) }}"
                        class="w-full rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Age</label>

                    <input type="number" name="age" value="{{ old('age', $petReport->age) }}"
                        class="w-full rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Color</label>

                    <input type="text" name="color" value="{{ old('color', $petReport->color) }}"
                        class="w-full rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Special Mark</label>

                    <textarea name="special_mark"
                        class="w-full rounded-lg border-gray-300">{{ old('special_mark', $petReport->special_mark) }}</textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Current Photo</label>

                    <img src="{{ asset('storage/' . $petReport->photo) }}" class="w-64 rounded-lg mb-3">

                    <input type="file" name="photo">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Lost Location</label>

                    <input type="text" name="lost_location" value="{{ old('lost_location', $petReport->lost_location) }}"
                        class="w-full rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Lost Date</label>

                    <input type="date" name="lost_date" value="{{ old('lost_date', $petReport->lost_date) }}"
                        class="w-full rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Description</label>

                    <textarea name="description"
                        class="w-full rounded-lg border-gray-300">{{ old('description', $petReport->description) }}</textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Contact Number</label>

                    <input type="text" name="contact_number" value="{{ old('contact_number', $petReport->contact_number) }}"
                        class="w-full rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Status</label>

                    <select name="status" class="w-full rounded-lg border-gray-300">

                        <option value="active" {{ $petReport->status == 'active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="found" {{ $petReport->status == 'found' ? 'selected' : '' }}>
                            Found
                        </option>

                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-amber-700 hover:bg-amber-800 text-white py-3 rounded-xl font-semibold">

                    Update Report

                </button>

            </div>

        </form>

    </div>

@endsection