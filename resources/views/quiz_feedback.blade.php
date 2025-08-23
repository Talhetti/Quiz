<x-layouts.app>
    <div class="max-w-md mx-auto mt-20 p-10 rounded-3xl shadow-xl text-center relative bg-[#364153]">
        
        <h1 class="text-5xl font-extrabold text-blue-600 mb-6">🎉 Parabéns!</h1>

        <p class="text-lg mb-4 text-gray-700 dark:text-gray-300">
            Você acertou <span class="font-bold text-green-600">{{ $score }}</span> de <span class="font-bold">{{ $total }}</span> perguntas.
        </p>

        <p class="text-lg mb-6 text-gray-700 dark:text-gray-300">
            Pontuação total: <span class="font-bold text-purple-600">{{ $score * $quiz->score }}</span>
        </p>

        <a href="{{ route('dashboard') }}" 
           class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-8 py-3 rounded-full shadow-md transition transform hover:scale-105 inline-block">
           Voltar ao início
        </a>
    </div>
</x-layouts.app>
