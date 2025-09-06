<x-layouts.app>
    <div class="min-h-screen flex flex-col justify-between max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded shadow">
        <h2 style="padding: 1.5rem;" class="text-xl font-bold mb-6 text-center text-blue-600 dark:text-blue-400">Detalhes das Respostas</h2>
        <ul class="space-y-6">
            @forelse($questionsData as $data)
                <li style="padding: 1rem; margin: 1rem;" class="p-4 rounded-lg shadow
                    @if($data['is_correct']) bg-green-100 dark:bg-green-900 @endif">
                    <div class="font-semibold">{{ $data['question']->question }}</div>
                    <div>
                        <span>Sua resposta: </span>
                        <span class="font-bold
                            @if($data['is_correct']) text-green-700 dark:text-green-300 @endif">
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
        <div class="flex justify-center mb-2" style="padding: 1.5rem;">
        <a href="{{ route('courses.quizzes', $quiz->course_id) }}"
            class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200 text-center">
            Voltar para os tópicos
        </a>
    </div>
</x-layouts.app>
