@extends('layouts.app')

@section('content')
<div class="bg-white px-6 py-6 lg:px-8">
    <div class="mx-auto max-w-3xl text-base/7 text-gray-700">
        <h1 class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl pb-12">{{ $post->title }}</h1>
        <img class="aspect-video rounded-xl bg-gray-50 object-cover" src="{{ $post->image }}" alt="">
        <div class="mt-16 max-w-2xl">
            <p class="mt-6">{{ $post->body }}</p>
        </div>
        <div class="font-bold mt-12">
            <a href="{{ route('author', $post->author) }}">
                {{ $post->author->name }}
            </a>
        </div>
    </div>
</div>
@endsection
