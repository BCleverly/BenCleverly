@extends('layouts.app', [
    'pageTitle' => $post->title
])

@section('stylesheets')
@endsection

@section('javascript')
@endsection

@section('content')

    @if($post->getFirstMedia('hero'))
        {{ $post->getFirstMedia('hero')('post-hero') }}
    @endif
    <div class="container mx-auto">
        <h1 class="text-5xl font-bold px-5 mb-5 mt-5 tracking-wide">
            {{ $post->title }}
        </h1>

        <div class="content-body-container">
            {!! $post->body !!}
        </div>

        <div class="flex mx-5 border-t border-gray-100 pt-5">
            <p class="text-lg">
                Posted by {{ $post->user->name }} on {{ $post->created_at }} @if((string)$post->created_at !== (string)$post->updated_at) (Last updated: {{ $post->updated_at }}) @endif
            </p>
        </div>

        @if(auth()->check())
            <div class="flex mx-5 pt-5">
                <div class="text-lg">
                    <a href="{{ route('post.edit', $post->slug) }}" class="text-orange-500 hover:text-green-500">Edit</a>
                    <a href="#" class="text-red-500 hover:text-red-600" onclick="document.getElementById('{{$post->slug}}').submit()">Delete</a>
                    <form action="{{ route('post.destroy', $post->slug) }}" id="{{$post->slug}}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
