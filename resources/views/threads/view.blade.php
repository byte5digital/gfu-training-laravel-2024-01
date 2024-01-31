<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $thread->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <article class="p-6 mb-12 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        @foreach ($thread->getContentAsParagraphs() as $paragraph)
                            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $paragraph }}</p>
                        @endforeach
                    </article>

                    <h2 class="mb-2 text-3xl mb-8 font-bold tracking-tight text-gray-900 dark:text-white">Posts</h2>
                    @if(0 === $thread->posts->count())
                        Keine Posts zu diesem Thread vorhanden.
                    @else

                        <div class="grid gap-8">

                            @foreach ($thread->posts as $post)

                                <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-between items-center mb-5 text-gray-500">
                                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->user->name }} sagt:</h2>

                                    @foreach ($post->getContentAsParagraphs() as $paragraph)
                                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $paragraph }}</p>
                                    @endforeach

                                </article>

                          @endforeach
                        </div>
                    @endif

                    <h2 class="mb-2 pt-12 text-3xl mb-8 font-bold tracking-tight text-gray-900 dark:text-white">create new Post</h2>
                    @auth
                        @include('post.form')
                    @else
                        <x-alert>Please login to create a Post</x-alert>
                    @endguest


                </div>
            </div>
        </div>
    </div>

</x-app-layout>>
