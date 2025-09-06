<x-layouts.app>
    <div class="max-w-md mx-auto mt-20 rounded-3xl shadow-xl text-center relative" style="background-color: #1d283a; padding: 2rem; border-radius: 0.5rem;">

        <h1 class="text-2xl font-bold text-blue-600 mb-6">🎉 Parabéns!</h1>

        <p class="text-lg mb-4 text-gray-700 dark:text-gray-300">
            Você acertou <span class="font-bold text-green-600">{{ $score }}</span> de <span class="font-bold">{{ $total }}</span> perguntas.
        </p>

        <p class="text-lg mb-6 text-gray-700 dark:text-gray-300">
            Pontuação total: <span class="font-bold text-purple-600">{{ $score * $quiz->score }}</span>
        </p>

        <div class="flex flex-col items-center gap-4 mt-6">
            <a href="{{ route('quizzes.feedback', $quiz->topic) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-full shadow-md transition transform hover:scale-105 w-full text-center">
                Ver detalhes das respostas
            </a>

            <a href="{{ route('dashboard') }}"
                style="background-color: #21588a;"
                class=" text-white font-semibold px-8 py-3 rounded-full shadow-md transition transform hover:scale-105 w-full text-center">
                Voltar ao início
            </a>
        </div>
    </div>
</x-layouts.app>
