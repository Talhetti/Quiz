<x-layouts.app>
    <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600 dark:text-blue-400">Histórico do Usuário</h2>
        
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Linguagem</th>
                    <th class="py-2 px-4 border-b">Tema</th>
                    <th class="py-2 px-4 border-b">Pontuação</th>
                    <th class="py-2 px-4 border-b">Completo em</th>
                </tr>
            </thead>
            <tbody>
                @forelse($histories as $history)
                    <tr>
                        <td class="py-2 px-4 border">{{ $history->language }}</td>
                        <td class="py-2 px-4 border">{{ $history->theme }}</td>
                        <td class="py-2 px-4 border">{{ $history->score_obtained }}</td>
                        <td class="py-2 px-4 border">{{ $history->completed_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-2 px-4 border text-center">Não há histórico!</td>
                    </tr> 
                @endforelse        
            </tbody>
        </table>
    </div>
</x-layouts.app>