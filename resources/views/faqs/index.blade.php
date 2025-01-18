@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8" style="color: white;">
    <h1 class="text-2xl font-bold mb-6">Frequently Asked Questions</h1>

    @if($isAdmin)
        <form action="{{ route('faqs.store') }}" method="POST" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="question" value="Question" />
                <x-text-input id="question" name="question" type="text" class="mt-1 block w-full" placeholder="Enter question" required />
                <x-input-error :messages="$errors->get('question')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="answer" value="Answer" />
                <textarea id="answer" name="answer" rows="4" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter answer" required></textarea>
                <x-input-error :messages="$errors->get('answer')" class="mt-2" />
            </div>
            <x-primary-button>{{ __('Add FAQ') }}</x-primary-button>
        </form>
    @endif

    <ul class="space-y-4">
        @foreach($faqs as $faq)
            <li class="border-b pb-4">
                <strong class="text-lg">{{ $faq->question }}</strong>
                <p class="mt-2">{{ $faq->answer }}</p>

                @if($isAdmin)
                    <form action="{{ route('faqs.update', $faq->id) }}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="question-{{ $faq->id }}" value="Question" />
                            <x-text-input id="question-{{ $faq->id }}" name="question" type="text" class="mt-1 block w-full" value="{{ $faq->question }}" required />
                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="answer-{{ $faq->id }}" value="Answer" />
                            <textarea id="answer-{{ $faq->id }}" name="answer" rows="4" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500" required>{{ $faq->answer }}</textarea>
                            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                        </div>
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                    </form>
                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="bg-red-500">{{ __('Delete') }}</x-primary-button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
