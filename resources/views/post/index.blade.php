<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All posts') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="post-list">
                        <a type="button" class="button" href="{{ route('posts.create')}}">Create</a>
                        
                        <!-- <a href="{{ route('posts.create')}}"> Createe</a> -->
                        <ul>
                            @foreach($posts as $post)
                            <li>
                                <h2>
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                    @if ($post->isPrivate)
                                        <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                            private
                                        </span>
                                    @endif
                                    <a type="button" class="button" href="{{ route('posts.edit', $post->id)}}">Edit</a>
                                    <form action="{{route ('posts.destroy', $post->id)}}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        
                                        <button>Delete</button>
                                    </form>
                                </h2>

                                <h3>by {{ $post->user->name }}</h3>
                                <p>{{ $post->content }}</p>
                                @if ($post->image_path)
                                    <img src="{{ Storage::url($post->image_path) }}" alt="Post Image">
                                @endif                            
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>