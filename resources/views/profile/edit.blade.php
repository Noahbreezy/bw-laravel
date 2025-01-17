<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Update Profile Information') }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Update your profile information, username, profile picture, and personal bio.') }}
                    </p>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" value="{{ __('Name') }}" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" 
                                value="{{ old('name', $user->name) }}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" value="{{ __('Email') }}" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" 
                                value="{{ old('email', $user->email) }}" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Username -->
                        <div>
                            <x-input-label for="username" value="{{ __('Username') }}" />
                            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" 
                                value="{{ old('username', $user->username) }}" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <x-input-label for="phone_number" value="{{ __('Phone Number') }}" />
                            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" 
                                value="{{ old('phone_number', $user->phone_number) }}" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>

                        <!-- Address -->
                        <div>
                            <x-input-label for="address" value="{{ __('Address') }}" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" 
                                value="{{ old('address', $user->address) }}" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Birthday -->
                        <div>
                            <x-input-label for="birthday" value="{{ __('Birthday') }}" />
                            <x-text-input id="birthday" name="birthday" type="text" class="mt-1 block w-full" 
                                value="{{ old('birthday', $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') : '') }}" />
                            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                        </div>

                        <!-- Profile Picture -->
                        <div>
                            <x-input-label for="profile_picture" value="{{ __('Profile Picture') }}" />
                            <x-text-input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full" />
                            @if ($user->profile_picture)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="h-20 w-20 rounded-full">
                                </div>
                            @endif
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>

                        <!-- Bio -->
                        <div>
                            <x-input-label for="bio" value="{{ __('Bio') }}" />
                            <textarea id="bio" name="bio" rows="4" 
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">{{ old('bio', $user->bio) }}</textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            @if (session('success'))
                                <p class="text-sm text-green-600 dark:text-green-400">{{ session('success') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
