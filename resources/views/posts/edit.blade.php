<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if (session('error'))
                        <div class="mb-4 text-red-500">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Edit Post Form -->
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Edit Post</h3>
                    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $post->title) }}" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="content" value="Content" />
                            <textarea id="content" name="content" rows="4" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('content', $post->content) }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="cover" value="Cover Image" />
                            <x-text-input id="cover" name="cover" type="file" class="mt-1 block w-full" />
                            @if ($post->cover)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $post->cover) }}" alt="Cover Image" class="h-20 w-20 rounded">
                                </div>
                            @endif
                            <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Post') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>