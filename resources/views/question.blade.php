<x-layouts.app>
    <div class="max-w-xl mx-auto mt-16 p-10 bg-white dark:bg-gray-900 rounded-3xl shadow-2xl text-center relative">
        <!-- Título do quiz -->
        <h2  style="background-color: #1E2939;" class="text-3xl font-extrabold mb-8 p-3 text-blue-600 dark:text-blue-400">{{ $quiz->topic }}</h2>

        <form style="background-color: #1E2939;" class="p-4" method="POST" action="{{ route('quizzes.answer', $quiz->topic) }}">
            @csrf
            <!-- Pergunta -->
            <p class="text-lg mb-6 text-gray-700 dark:text-gray-300">{{ $question->question }}</p>

            <!-- Opções estilizadas -->
            <div class="space-y-4 mb-6 text-left">
                <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-blue-50 dark:hover:bg-gray-800 transition">
                    <input type="radio" name="answer" value="a" required class="form-radio text-blue-600">
                    <span class="ml-3">{{ $question->option_a }}</span>
                </label>
                <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-blue-50 dark:hover:bg-gray-800 transition">
                    <input type="radio" name="answer" value="b" class="form-radio text-blue-600">
                    <span class="ml-3">{{ $question->option_b }}</span>
                </label>
                <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-blue-50 dark:hover:bg-gray-800 transition">
                    <input type="radio" name="answer" value="c" class="form-radio text-blue-600">
                    <span class="ml-3">{{ $question->option_c }}</span>
                </label>
                <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-blue-50 dark:hover:bg-gray-800 transition">
                    <input type="radio" name="answer" value="d" class="form-radio text-blue-600">
                    <span class="ml-3">{{ $question->option_d }}</span>
                </label>
            </div>

            <button type="submit"
                class="px-4 py-2 rounded-lg font-semibold border text-white cursor-pointer botao-enviar"
                style="background-color: #273750;">
                Enviar
            </button>
        </form>

        <!-- Indicador de progresso -->
        <div class="mt-6 text-gray-500 dark:text-gray-400">
            Pergunta {{ $current + 1 }} de {{ $quiz->questions()->count() }}
        </div>
    </div>
</x-layouts.app>
