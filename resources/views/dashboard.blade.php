<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Menu do usuário')}}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Escolha um quiz!') }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
         @forelse ($courses as $course)
            <div 
                class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center
                    cursor-pointer
                    transform transition duration-500 ease-in-out 
                    hover:scale-105 hover:shadow-xl 
                    animate-pulse"
            >
                <img 
                    src="{{ $course->image_url }}" 
                    alt="{{ $course->name_course }}" 
                    class="w-20 h-20 rounded-full object-cover border-4 border-purple-500 shadow-md mb-4"
                >
                
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-2 text-center">
                    {{ $course->name_course }}
                </h2>
                
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Quizzes disponíveis: 
                    <span class="font-semibold text-purple-600 dark:text-purple-400">
                        {{ $course->quiz_count }}
                    </span>
                </p>
            </div>
        @empty
            <div class="col-span-4 text-center text-gray-500 mt-4">
                Nenhum curso cadastrado.
            </div>
        @endforelse
    </div>

</x-layouts.app>
