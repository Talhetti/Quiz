<x-layouts.app>
    <div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600 dark:text-blue-400">
            {{ $quiz->topic ?? 'Pergunta do Quiz' }}
        </h2>
        <form method="POST" action="{{ route('quizzes.answer', $quiz->id) }}">
            @csrf
            <div class="mb-4 ml-4">
                <p class="text-lg font-semibold mb-4">
                    {{ $quiz->question ?? 'Pergunta não cadastrada.' }}
                </p>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="answer" value="a" required>
                        <span>{{ $quiz->option_a ?? 'Alternativa A não cadastrada' }}</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="answer" value="b">
                        <span>{{ $quiz->option_b ?? 'Alternativa B não cadastrada' }}</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="answer" value="c">
                        <span>{{ $quiz->option_c ?? 'Alternativa C não cadastrada' }}</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="answer" value="d">
                        <span>{{ $quiz->option_d ?? 'Alternativa D não cadastrada' }}</span>
                    </label>
                </div>
            </div>
            <button type="submit"
                class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-lg shadow-md font-bold text-lg transition duration-200 hover:from-pink-500 hover:to-purple-500 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-400 mt-4">
                Enviar Resposta
            </button>
        </form>
    </div>
</x-layouts.app>