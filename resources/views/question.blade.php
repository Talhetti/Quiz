<x-layouts.app>
    <div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600 dark:text-blue-400">
            {{ $quiz->topic ?? 'Pergunta do Quiz' }}
        </h2>
        <form method="POST" action="#">
            @csrf
            <div class="mb-4">
                <p class="text-lg font-semibold mb-2">
                    {{ $quiz->question ?? 'Pergunta não cadastrada.' }}
                </p>
                {{-- Se quiser múltipla escolha, adicione aqui as opções --}}
                <input type="text" name="answer" class="w-full p-2 border rounded" placeholder="Digite sua resposta">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Enviar Resposta
            </button>
        </form>
    </div>
</x-layouts.app>