<x-guest-layout>
    <section class="max-w-7xl py-8 mx-auto px-4 sm:px-6 lg:px-8 sm:grid md:grid-flow-col md:grid-cols-3 gap-4 overflow-hidden transition duration-150 ease-in-out">
        <div class="flex justify-center md:justify-between items-center sm:px-0 px-4 mb-6">
            <div class="p-4 bg-yellow-400 flex justify-center rounded-xl overflow-hidden">
                <img class="aspect-2/3 w-80 object-cover transition-transform duration-300 hover:scale-110" src="{{ isset($basicinfo->avatar) ? Storage::url("avatars/$basicinfo->avatar") : Storage::url("profile/avatar.png") }}"/>
            </div>
        </div>
        <div class="dark:text-white md:col-span-2 sm:px-6 lg:px-8 py-8 dark:text-white transition-transform duration-300 animate-slideIn">
            <h1 class="font-bold text-4xl md:text-5xl mb-4 font-bungeeShade">
                {{-- FullStack Web --}}
                {{ $basicinfo->title ?? 'Full Stack' }}
                {{-- Developer --}}
                <p>---- {{ $basicinfo->job_title ?? 'Developer' }}</p>
            </h1> 
            <p class="mb-4 text-justify">{!! $basicinfo->short_describtion ??   "I'm a passionate Full-Stack Developer with expertise in Laravel, Next.js, PostgreSQL, and MongoDB. With hands-on experience in building web applications, eCommerce platforms, and ERP systems, I specialize in creating efficient and scalable solutions. I have a strong background in Laravel Eloquent, JavaScript, and database management, and I’m always eager to learn and implement new technologies. Currently, I’m exploring AI integrations in Laravel and enhancing my skills in PostgreSQL and Next.js." !!}</p>
            <div class="flex relative gap-5 mb-4">
                <a href="{{ route('register') }}" class="align-center hidden flex gap-4 my-3 rounded-full border border-blue-600 dark:border-gray-500 text-white bg-blue-500 hover:bg-blue-600 dark:bg-gray-800 dark:hover:bg-gray-700 p-3 px-4">About Me 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>                      
                </a>
                <div class="flex items-center gap-3">
                    <div class="rounded-full border-2 border-gray-800 px-1 py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                        </svg>                              
                    </div>
                    <span class="w-20">Scroll down</span>
                </div>
            </div>
            <div class="flex gap-2">
                <strong class="md:text-6xl text-5xl font-bungeeShade">{{ $basicinfo->fullname[0] ?? "F"}}.</strong>
                <strong class="md:text-xl">
                    <p class="md:text-3xl font-kalam">{{ $basicinfo->fullname ?? "Your Name"}}</p>
                    <a class="font-bungeeShade" href="mailto:faizdev007@gmail.com">{{ $basicinfo->email ?? "example@email.com"}}</a>
                </strong>
            </div>
        </div>
    </section>

    {{-- infinite scroll  --}}
    <section class="py-8 transition duration-150 ease-in-out">
        <div class="relative h-40 overflow-hidden py-10">
            <div class="bg-gray-800 snap-x dark:bg-gray-600 rotate-2 absolute h-20 w-[110%] -left-2"></div>
            <div class="bg-red-600 dark:bg-red-600 -rotate-2 absolute h-20 w-[110%] -left-2">
                <div class="flex whitespace-nowrap animate-scroll h-full font-kalam">
                    @if (isset($basicinfo) && isset($basicinfo->skills))
                        @foreach ($basicinfo->skills as $skill)
                            <div class="flex items-center gap-10 text-4xl text-white font-bold">
                                <span>{{ $skill->name }}</span>
                                <span>⚡</span>
                            </div>
                        @endforeach
                        @foreach ($basicinfo->skills as $skill)
                            <div class="flex items-center gap-10 text-4xl text-white font-bold">
                                <span>{{ $skill->name }}</span>
                                <span>⚡</span>
                            </div>
                        @endforeach
                    @else 
                        <div class="flex items-center gap-10 text-4xl text-white font-bold">
                            <span>HTML</span>
                            <span>⚡</span>
                            <span>CSS</span>
                            <span>⚡</span>
                            <span>PHP</span>
                            <span>⚡</span>
                            <span>JavaScript</span>
                            <span>⚡</span>
                            <span>Tailwind CSS</span>
                            <span>⚡</span>
                            <span>Ajax</span>
                        </div>
                        <div class="flex items-center text-4xl text-white font-bold">
                            <span class="mx-10">⚡</span>
                        </div>
                        <!-- Duplicate for smooth infinite scrolling -->
                        <div class="flex items-center gap-10 text-4xl text-white font-bold">
                            <span>HTML</span>
                            <span>⚡</span>
                            <span>CSS</span>
                            <span>⚡</span>
                            <span>PHP</span>
                            <span>⚡</span>
                            <span>JavaScript</span>
                            <span>⚡</span>
                            <span>Tailwind CSS</span>
                            <span>⚡</span>
                            <span>Ajax</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- about me --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 dark:text-white">
        <h2 class="text-5xl font-bold mb-8 font-bungeeShade text-center md:text-left">About Me</h2>
        <div class="md:pl-12 text-justify">
            {!! $basicinfo->bio ?? "
            Hi, I'm Faiz Alam, a Full-Stack Developer with a passion for building efficient and scalable web applications. I specialize in Laravel, Next.js, PostgreSQL, and MongoDB, and I have hands-on experience in creating eCommerce platforms, ERP systems, and web applications. I have a strong background in Laravel Eloquent, JavaScript, and database management, and I’m always eager to learn and implement new technologies. Currently, I’m exploring AI integrations in Laravel and enhancing my skills in PostgreSQL and Next.js.
            My goal is to create innovative and user-friendly solutions that help businesses grow and succeed. I believe in continuous learning and improvement, and I’m always looking for new challenges and opportunities to expand my knowledge and skills. If you’re looking for
                a dedicated and experienced Full-Stack Developer to help you bring your ideas to life, I’d love to hear from you!"!!}
        </div>
    </section>

    {{-- my projects --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 dark:text-white">
        <div lable="My Projects" class="flex justify-between items-center">
            <h2 class="items-center justify-center md:text-5xl text-4xl font-bold mb-4 font-bungeeShade text-center md:text-left"><p>Take a Look At </p> <p> My Projects</p></h2>
            <x-themes.dev.o1.actionbutton href="{{ Route('projects') }}" class="md:flex hidden">Browse All
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>                  
            </x-themes.dev.o1.actionbutton>
        </div>
        <div class="grid grid-flow-column md:grid-cols-2 gap-4 py-8">
            @if (isset($basicinfo->user->projects))    
                @foreach ($basicinfo->user->projects as $project)
                    <div class="sm:grid flex sm:grid-cols-2 sm:grid-flow-col flex-col-reverse gap-4 w-full rounded-xl dark:bg-gray-800 dark:border-gray-500 border border-gray-300 p-4 shadow drop-shadow bg-blue2">
                        <div class="flex flex-col justify-between gap-2 {{ isset($project) ?? 'animate-pulse'}}">
                            <div class="">
                                <div class="font-bold text-lg {{ isset($project) ?? 'h-6 bg-gray-400 w-3/4'}} rounded" title="{{ $project->title ?? 'Project Title' }}">{{ $project->title ?? 'Project Title' }}</div>
                                <div class="text-sm {{ isset($project) ?? 'h-4 bg-gray-400 w-5/6'}} rounded line-clamp-3" title="{{ $project->short_description ?? 'Short Description' }}">{{ $project->short_description ?? 'Short Description' }}</div>
                            </div>
                            <div class="h-10 {{ isset($project) ?? 'bg-gray-400'}} rounded">
                                <a href="{{ $project->url ?? '#' }}" target="_blank" class="justify-center gap-4 rounded-full border border-gray-600 dark:border-gray-500 text-white bg-gray-700 hover:bg-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 p-3 px-4 h-10 items-center transition duration-150 ease-in-out flex w-fit hover:px-8 transition-all my-0">Case Study
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>                                          
                                </a>
                            </div>
                        </div>
                        <div class="rounded-xl overflow-hidden border border-dark border border-gray-900 {{ isset($project->thumbnail) ?? 'animate-pulse' }}">
                            <img src="{{ Storage::url('projects/'.$project->thumbnail) ?? Storage::url('profile/profile1.jpeg') }}" alt="Project Thumbnail" class="w-full aspect-[2/1] h-full fill-current {{ isset($project) ?? 'bg-gray-400'}}">
                        </div>
                    </div>
                @endforeach
            @else
            <div class="sm:grid flex sm:grid-cols-2 sm:grid-flow-col flex-col-reverse gap-4 w-full rounded-xl dark:bg-gray-800 dark:border-gray-500 border border-gray-300 p-4 shadow drop-shadow bg-blue2">
                <div class="flex flex-col justify-between gap-2">
                    <div class="">
                        <h3 class="text-2xl font-kalam">Title</h3>
                        <p>project info</p>
                    </div>
                    <x-themes.dev.o1.actionbutton class="flex w-fit hover:px-8 transition-all my-0" href="#">Case Study
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </x-themes.dev.o1.actionbutton>
                </div>
                <div class="rounded-xl overflow-hidden border border-dark border border-gray-900">
                    <img class="object-cover aspect-[2/1]" src="{{ Storage::url('profile/profile1.jpeg') }}" alt="project image">
                </div>
            </div>
            @endif
        </div>
        <x-themes.dev.o1.actionbutton class="md:hidden flex">
            Browse All
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>              
        </x-themes.dev.o1.actionbutton>
    </section>

    <section class="my-8 bg-gradient-to-b from-blue-400 via-blue-500 to-blue-500 dark:from-gray-700 dark:via-gray-700 dark:to-gray-500">
        <div class="max-w-7xl mx-auto flex md:flex-row flex-col text-center gap-8 justify-between px-4 sm:px-6 lg:px-8 py-8 dark:text-white">
            <p class="text-white text-2xl"><strong class="text-5xl font-caveat">50 </strong>Complete Projects</p>
            <p class="text-white text-2xl"><strong class="text-5xl font-caveat">100 </strong>Client Satisfaction</p>
            <p class="text-white text-2xl"><strong class="text-5xl font-caveat">5 </strong>On-Going Projects</p>
        </div>
    </section>

    {{-- blog area --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 dark:text-white">
        <div lable="My Projects" class="flex justify-between items-center">
            <h2 class="items-center justify-center md:text-5xl text-4xl font-bold mb-4 font-bungeeShade text-center md:text-left"><p>Latest News From</p> <p> The IT Industry</p></h2>
            <x-themes.dev.o1.actionbutton href="{{ route('posts') }}" class="md:flex hidden">Browse More
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>                  
            </x-themes.dev.o1.actionbutton>
        </div>
        <div lable="blogArea" class="grid md:grid-cols-3 gap-4 py-6">
            <div class="flex flex-col gap-4 w-full rounded-xl dark:bg-gray-800 p-4">
                <div class="rounded-xl overflow-hidden border border-dark border border-gray-900">
                    <img class="object-cover aspect-[2/1]" src="{{ Storage::url('profile/profile1.jpeg') }}" alt="project image">
                </div>
                <div class="flex flex-col justify-center gap-2">
                    <span>{{ date('d-m-Y') }}</span>
                    <h3 class="text-2xl font-kalam">Title</h3>
                    <a href="" class="flex w-fit gap-2" href="#">Read More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>                          
                    </a>
                </div>
            </div>
            <div class="flex flex-col gap-4 w-full rounded-xl dark:bg-gray-800 p-4">
                <div class="rounded-xl overflow-hidden border border-dark border border-gray-900">
                    <img class="object-cover aspect-[2/1]" src="{{ Storage::url('profile/profile1.jpeg') }}" alt="project image">
                </div>
                <div class="flex flex-col justify-center gap-2">
                    <span>{{ date('d-m-Y') }}</span>
                    <h3 class="text-2xl font-kalam">Title</h3>
                    <a href="" class="flex w-fit gap-2" href="#">Read More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>                          
                    </a>
                </div>
            </div>
            <div class="flex flex-col gap-4 w-full rounded-xl dark:bg-gray-800 p-4">
                <div class="rounded-xl overflow-hidden border border-dark border border-gray-900">
                    <img class="object-cover aspect-[2/1]" src="{{ Storage::url('profile/profile1.jpeg') }}" alt="project image">
                </div>
                <div class="flex flex-col justify-center gap-2">
                    <span>{{ date('d-m-Y') }}</span>
                    <h3 class="text-2xl font-kalam">Title</h3>
                    <a href="" class="flex w-fit gap-2" href="#">Read More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>                          
                    </a>
                </div>
            </div>
            <x-themes.dev.o1.actionbutton class="md:hidden flex">
                Browse More
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>              
            </x-themes.dev.o1.actionbutton>
        </div>
    </section>

    {{-- infinite scroll  --}}
    <section class="py-8">
        <div class="relative h-40 overflow-hidden py-10">
            <div class="bg-gray-800 snap-x dark:bg-gray-600 rotate-2 absolute h-20 w-[110%] -left-2"></div>
            <div class="bg-red-600 dark:bg-red-600 -rotate-2 absolute h-20 w-[110%] -left-2">
                <div class="flex whitespace-nowrap animate-scroll h-full font-kalam">
                    @if (isset($basicinfo) && isset($basicinfo->skills))
                        @foreach ($basicinfo->skills as $skill)
                            <div class="flex items-center gap-10 text-4xl text-white font-bold">
                                <span>{{ $skill->name }}</span>
                                <span>⚡</span>
                            </div>
                        @endforeach
                        @foreach ($basicinfo->skills as $skill)
                            <div class="flex items-center gap-10 text-4xl text-white font-bold">
                                <span>{{ $skill->name }}</span>
                                <span>⚡</span>
                            </div>
                        @endforeach
                    @else 
                        <div class="flex items-center gap-10 text-4xl text-white font-bold">
                            <span>HTML</span>
                            <span>⚡</span>
                            <span>CSS</span>
                            <span>⚡</span>
                            <span>PHP</span>
                            <span>⚡</span>
                            <span>JavaScript</span>
                            <span>⚡</span>
                            <span>Tailwind CSS</span>
                            <span>⚡</span>
                            <span>Ajax</span>
                        </div>
                        <div class="flex items-center text-4xl text-white font-bold">
                            <span class="mx-10">⚡</span>
                        </div>
                        <!-- Duplicate for smooth infinite scrolling -->
                        <div class="flex items-center gap-10 text-4xl text-white font-bold">
                            <span>HTML</span>
                            <span>⚡</span>
                            <span>CSS</span>
                            <span>⚡</span>
                            <span>PHP</span>
                            <span>⚡</span>
                            <span>JavaScript</span>
                            <span>⚡</span>
                            <span>Tailwind CSS</span>
                            <span>⚡</span>
                            <span>Ajax</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 dark:text-white">
        <div lable="My Projects" class="flex justify-center items-center">
            <h2 class="font-bold mb-4 md:text-5xl text-4xl text-center w-full font-bungeeShade"><p>Intrested In working</p> <p> Together?</p></h2>
        </div>
        <div class="text-center pt-8">
            <p class="text-lg font-bold">Drop me and email:</p>
            <a class="sm:text-2xl font-bungeeShade" href="mailto:{{ $basicinfo->email ?? "example@email.com"}}">{{ $basicinfo->email ?? "example@email.com"}}</a>
        </div>
    </section>
</x-guest-layout>