@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-4xl pt-10">{{ $post->title }}</h2>
    <div class="mt-8">
        {{ $post->content }}
        @if ($post->photo)
            <div class="mt-10 mb-10">
                <img src="{{ Storage::url($post->photo) }}" alt="cover image">
            </div>
        @else
            <div class="h-20"></div>
        @endif
    </div>

    <hr>

    <livewire:comments-section :post="$post" />
</div>
@endsection
