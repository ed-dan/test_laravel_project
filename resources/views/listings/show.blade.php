@extends('components.layout')

@section('content')
    @include('partials._search')
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-2 right-2">
            <button class="border-2 border-white h-10 w-20 text-white rounded-lg bg-orange-500 hover:bg-white hover:border-orange-500 hover:text-orange-500">
                <a href="listings/{{$listing->id}}/edit">
                    <i class="fa-solid fa-pencil" > Edit</i>
                </a>
            </button>
        </div>
    </div>
    <div style="text-align:right" class="bg-black text-white">

    </div>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6"
                 src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                 alt=""/>

            <h3 class="text-2xl mb-2">
                {{$listing->title}}
            </h3>
            Company Name:
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv="$listing->tags"/>

            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">Job Description</h3>
                <div class="text-lg space-y-6">
                    {{$listing->description}}

                    <a href="mailto:{{$listing->email}}"
                       class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                            class="fa-solid fa-envelope"></i>
                        Contact Employer</a>

                    <a href="{{$listing->website}}" target="_blank"
                       class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                            class="fa-solid fa-globe"></i>
                        Visit Website</a>
                </div>
            </div>
        </div>
    </div>
@endsection
