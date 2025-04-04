<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" id="profileeditor" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-md bg-green-500 text-white p-2 rounded-md"
            >{{ __('Saved Successfully.') }}</p>
        @endif
        <div class=" mb-8 relative flex gap-2">
            <!-- Avatar Upload -->
            <div x-data="{ avatarPreview: '{{ isset($user->avatar) ? Storage::url("avatars/$user->avatar") : Storage::url("profile/avatar.png") }}'}" class="relative z-10 p-3">
                <label class="block hidden text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Avatar</label>
                <div class="flex items-center space-x-4">
                    <!-- Clickable Image for Upload -->
                    <div class="h-40 w-32 border-gray-900 rounded-lg overflow-hidden border dark:border-gray-700 cursor-pointer" @click="$refs.avatarInput.click()">
                        <img :src="avatarPreview || ''" class="object-cover w-full h-full" alt="Avatar">
                    </div>
                    <!-- Hidden File Input -->
                    <input type="file" @change="let file = $event.target.files[0]; avatarPreview = URL.createObjectURL(file)" class="hidden" name="avatar" x-ref="avatarInput">
                </div>
            </div>
        
            <!-- Cover Photo Upload -->
            <div x-data="{ coverPreview: `{{ isset($user->cover) ? Storage::url("covers/$user->cover") : Storage::url('profile/placeholder.jpg') }}` }" class="absolute w-full z-0">
                <label class="block text-sm font-medium hidden text-gray-700 dark:text-gray-200 mb-2">Cover Photo</label>
                <div class="w-full h-48 border-gray-900 overflow-hidden border dark:border-gray-700">
                    <img :src="coverPreview || ''" class="object-cover w-full h-full" alt="cover">
                </div>
                <input type="file" @change="let file = $event.target.files[0]; coverPreview = URL.createObjectURL(file)" class="hidden" name="cover" id="coverInput">
                <label for="coverInput" class="absolute bg-gray-400 opacity-75 top-0 right-0 inline-block p-2 m-1 dark:text-white text-sm rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>                                  
                </label>
            </div>
        </div>

        <div class="md:flex gap-2 mb-6">
            <div class="w-full ">
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-b-2 bg-gray-100 border-t-0 border-l-0 border-r-0 border-gray-800 shadow-none" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="w-full ">
                <x-input-label for="profile_name" :value="__('Profile Name')" />
                <x-text-input id="profile_name" name="profile_name" type="text" class="mt-1 block w-full border-b-2 bg-gray-100 border-t-0 border-l-0 border-r-0 border-gray-800 shadow-none" :value="old('profile_name', $user->profile_name)" required autofocus autocomplete="profile_name" />
                <x-input-error class="mt-2" :messages="$errors->get('profile_name')" />
            </div>
            <div class="w-full ">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-b-2 bg-gray-100 border-t-0 border-l-0 border-r-0 border-gray-800 shadow-none" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
    
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}
    
                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
    
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <!-- Text Fields -->
        <div>
            <x-input-label for="job_title" :value="__('Profile Title')" />
            <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full border-b-2 bg-gray-100 border-t-0 border-l-0 border-r-0 border-gray-800 shadow-none" :value="old('job_title', $user->job_title)" required autofocus autocomplete="job_title" />
            <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
        </div>
        
        <!-- SUMMARY -->
        <div class="mt-4">
            <x-input-label for="summarydata" :value="__('Summary')" />
            <div class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded rounded-t-none h-28 shadow-sm block w-full border-b-2 bg-gray-100 border-t-0 border-l-0 border-r-0 border-gray-800 shadow-none" id="summaryeditor">{!! $user->summary ?? old('summary') !!}</div>
            <x-text-input id="summarydata" name="summary" type="hidden" class="mt-1 block w-full border-b-2 bg-gray-100 border-t-0 border-l-0 border-r-0 border-gray-800 shadow-none" :value="old('summary', $user->summary)" required autofocus autocomplete="summary" />
            <x-input-error class="mt-2" :messages="$errors->get('summary')" />
        </div>

        <!-- About Myself-->
        <div class="mt-4">
            <x-input-label for="myselfdata" class="font-bold text-xl " :value="__('About MySelf')" />
            <div class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded rounded-t-none h-48 shadow-sm block w-full border-b-2 bg-gray-100 border-t-0 border-l-0 border-r-0 border-gray-800 shadow-none" id="myselfeditor">{!! $user->about_myself ?? old('about_myself') !!}</div>
            <x-text-input id="myselfdata" name="about_myself" type="hidden" class="mt-1 block w-full border-b-2 bg-gray-100 border-t-0 border-l-0 border-r-0 border-gray-800 shadow-none" :value="old('about_myself',$user->about_myself)" required autofocus autocomplete="about_myself" />
            <x-input-error class="mt-2" :messages="$errors->get('about_myself')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
