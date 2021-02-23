@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-4xl pt-10">{{ $post->title }}</h2>
    <div class="mt-8">
        {{ $post->content }}
        <div class="h-20"></div>
    </div>

    <hr>

    <livewire:comments-section :post="$post" />
</div>
@endsection
