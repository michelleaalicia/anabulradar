@extends('layouts.app')

@section('title', 'Create Pet Report')

@section('content')

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">

        <h1 class="text-3xl font-bold mb-8">
            Create Pet Report
        </h1>

        <form action="{{ route('pet-reports.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="grid gap-4">

                <input type="text" name="pet_name" placeholder="Pet Name" class="rounded-lg">

                <select name="species" class="rounded-lg">
                    <option value="Cat">Cat</option>
                    <option value="Dog">Dog</option>
                </select>

                <input type="text" name="breed" placeholder="Breed" class="rounded-lg">

                <input type="text" name="gender" placeholder="Gender" class="rounded-lg">

                <input type="number" name="age" placeholder="Age" class="rounded-lg">

                <input type="text" name="color" placeholder="Color" class="rounded-lg">

                <textarea name="special_mark" placeholder="Special Mark" class="rounded-lg"></textarea>

                <input type="file" name="photo">

                <input type="text" name="lost_location" placeholder="Lost Location" class="rounded-lg">

                <input type="date" name="lost_date" class="rounded-lg">

                <textarea name="description" placeholder="Description" class="rounded-lg"></textarea>

                <input type="text" name="contact_number" placeholder="Contact Number" class="rounded-lg">

                <button class="bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl">
                    Submit
                </button>

            </div>

        </form>

    </div>

@endsection