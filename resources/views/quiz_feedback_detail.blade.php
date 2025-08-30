<x-layouts.app>
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded shadow">
        <h2 class="text-xl font-bold mb-6 text-center text-blue-600 dark:text-blue-400">Detalhes das Respostas</h2>
        <ul class="space-y-6">
            @forelse($questionsData as $data)
                <li class="p-4 rounded-lg shadow
                    @if($data['is_correct']) bg-green-100 dark:bg-green-900
                    @else bg-red-100 dark:bg-red-900 @endif">
                    <div class="font-semibold mb-2">{{ $data['question']->question }}</div>
                    <div>
                        <span>Sua resposta: </span>
                        <span class="font-bold
                            @if($data['is_correct']) text-green-700 dark:text-green-300
                            @else text-red-700 dark:text-red-300 @endif">
                            {{ strtoupper($data['user_answer'] ?? '-') }} - 
                            {{ $data['user_answer'] ? $data['question']->{'option_' . $data['user_answer']} : 'Não respondida' }}
                        </span>
                    </div>
                    @if(!$data['is_correct'])
                        <div>
                            <span>Correta: </span>
                            <span class="font-bold text-green-700 dark:text-green-300">
                                {{ strtoupper($data['question']->correct_option) }} - 
                                {{ $data['question']->{'option_' . $data['question']->correct_option} }}
                            </span>
                        </div>
                    @endif
                </li>
            @empty
                <li class="text-center text-gray-500">Nenhuma resposta encontrada.</li>
            @endforelse
        </ul>
        <div class="flex justify-center mt-8">
        <a href="{{ route('courses.quizzes', $quiz->course_id) }}"
            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200 text-center">
            Voltar para os tópicos
        </a>
    </div>
</x-layouts.app>