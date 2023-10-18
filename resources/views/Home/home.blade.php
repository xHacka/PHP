@extends("Home.home-template")

@push("styles")
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
@endpush
{{--
    Is This A Good Solution? No!
    Did I Want To Spend Time Working On Frontend? No!
--}}
@php($tw_input = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500")
@php($tw_label = "block mb-1 text-sm font-medium text-gray-900 dark:text-white")
@php($tw_btn = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800")

@section("title", "Quiz 2")

@section("whoami")
<div class="flex flex-col justify-center items-center mt-3">
    <div class="relative flex flex-col items-center rounded-[10px] border-[1px] border-gray-200 w-[300px] mx-auto p-4 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
        <div class="relative flex h-16 w-full justify-center rounded-xl bg-cover bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
            <div class="absolute -bottom-12 flex h-[87px] w-[87px] items-center justify-center rounded-full border-[4px] border-white bg-pink-400 dark:!border-navy-700">
                <img class="h-full w-full rounded-full" src='https://avatars.githubusercontent.com/u/31889992?v=4' alt="" />
            </div>
        </div>
        <div class="mt-12 flex flex-col items-center">
            <h4 class="text-xl font-bold text-navy-700 dark:text-white">
                Giorgi Gelashvili
            </h4>
            <p class="text-base font-normal text-gray-600">Software Developer</p>
        </div>
        <div class="mt-1 mb-1 flex">
            <p class="text-4xl font-bold text-navy-700 dark:text-white">Quiz 2</p>
        </div>
    </div>
</div>
@endsection

@section("actions")
<div class="flex justify-center gap-20 mt-8">
    <div class="">
        <form action="/api/posts" method="POST" data-form="add">
            @csrf
            <div class="mb-6">
                <label for="title" class="{{ $tw_label }}">Title: </label>
                <input type="text" name="title" class="{{ $tw_input }}" placeholder="Title..." required>
            </div>
            <div class="mb-6">
                <label for="content" class="{{ $tw_label }}">Content: </label>
                <input type="text" name="content" class="{{ $tw_input }}" placeholder="Content..." required>
            </div>
            <button type="submit" class="{{ $tw_btn }}">Add</button>
        </form>
    </div>
    <div class="">
        <form action="/api/posts" method="POST" data-form="update">
            @csrf
            @method("PUT")
            <div class="mb-6">
                <label for="post_id" class="{{ $tw_label }}">ID: </label>
                <input type="number" name="post_id" class="{{ $tw_input }}" placeholder="ID..." required>
            </div>
            <div class="mb-6">
                <label for="title" class="{{ $tw_label }}">Title: </label>
                <input type="text" name="title" class="{{ $tw_input }}" placeholder="Title..." required>
            </div>
            <div class="mb-6">
                <label for="content" class="{{ $tw_label }}">Content: </label>
                <input type="text" name="content" class="{{ $tw_input }}" placeholder="Content..." required>
            </div>
            <button type="submit" class="{{ $tw_btn }}">Update</button>
        </form>
    </div>
    <div class="">
        <form action="/api/posts" method="POST" data-form="delete">
            @csrf
            @method("DELETE")
            <div class="mb-6">
                <label for="post_id" class="{{ $tw_label }}">ID: </label>
                <input type="number" name="post_id" class="{{ $tw_input }}" placeholder="ID..." required>
            </div>
            <button type="submit" class="{{ $tw_btn }}">Delete</button>
            <button type="reset" class="{{ $tw_btn }}" onclick="deleteAllHandler()">Delete All</button>
        </form>
    </div>
</div>
@endsection

@section("content")
<div class="posts grid lg:grid-cols-3 md:grid-cols-2 grikd-cols-1 gap-6 mt-16 px-[20rem]">
    @foreach ($posts as $id => $post)
    <div class="bg-[#AAA] flex flex-col p-7 rounded-xl bg-amber-100 dark:bg-neutral-700/70">
        <p>({{ $id }}) {{ $post['title'] }}</p>
        <p>{{ $post['content'] }}</p>
    </div>
    @endforeach
</div>
@endsection

@push("scripts")
<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endpush