<x-layouts.app>
    <div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded shadow text-center">
        <h2 class="text-2xl font-bold mb-6 text-blue-600 dark:text-blue-400">
            Resultado do Quiz
        </h2>
        <p class="text-lg mb-4">
            Você acertou <span class="font-bold">{{ $correct }}</span> de <span class="font-bold">{{ $total }}</span> perguntas!
        </p>
        <a href="{{ route('courses.quizzes', request()->route('course')) }}" class="text-blue-500 hover:underline">Voltar para o módulo</a>
    </div>
</x-layouts.app>