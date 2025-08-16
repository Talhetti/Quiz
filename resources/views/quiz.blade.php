<!-- filepath: c:\Users\Samsung-Win11\Desktop\Quiz\resources\views\quiz.blade.php -->
<x-layouts.app>
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded shadow p-3">
        <h2 class="text-xl mb-6 text-center text-blue-500 dark:text-blue-400">
            Módulos de {{ $course->name_course }}
        </h2>
        <ul class="space-y-4">
            <p class="ml-2 mb-2 text-blue-500 dark:text-blue-400">Escolha um tópico:</p>
            @forelse ($quizzes as $quiz)
            <a href="{{ route('quizzes.question', $quiz->id ) }}" class="text-blue-500 dark:text-blue-400 hover:underline">        
                <li class="bg-gray-100 dark:bg-gray-700 mb-2 rounded p-4 flex justify-between items-center hover:scale-105 hover:shadow-lg hover:bg-gray-200 dark:hover:bg-gray-600">
                        <span class="font-semibold">{{ $quiz->topic }}</span>
                </li>
            </a>
            @empty
                <li class="text-center text-gray-500">Nenhum módulo disponível para esta linguagem.</li>
            @endforelse
        </ul>
    </div>
</x-layouts.app>