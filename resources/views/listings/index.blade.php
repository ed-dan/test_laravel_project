@extends('components.layout')
@section('content')
    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($listings) == 0)
            @foreach($listings as  $listing)
                <x-listing-card :listing="$listing"/>
            @endforeach
        @else
            <h1>No listings found</h1>
        @endunless

    </div>

    <div class="mt-10 px-4 py-3 text-sm font-medium text-orange-500 bg-orange-400 border border-orange-300 rounded-lg ">
        {{ $listings->links() }}
    </div>
    {{--    links() for pagination--}}
@endsection
