
    <div>
    @if($jobs->isEmpty())
        <p class="text-gray-500">Chưa có gợi ý việc làm.</p>
    @else
        <div class="space-y-3">
            @foreach($jobs as $job)
            <div class="border rounded p-3 hover:shadow transition">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="font-semibold">{{ $job->title }}</h4>
                        <p class="text-sm text-gray-500">{{ $job->company }}</p>
                        <p class="text-xs text-gray-400">📍 {{ $job->location }}</p>
                    </div>
                    <div class="text-right">
                        {{-- Hiển thị % phù hợp --}}
                        <span class="text-green-600 font-bold text-sm">
                            {{ round($job->match_score) }}%
                        </span>
                        <p class="text-xs text-gray-400">phù hợp</p>
                    </div>
                </div>

                <div class="mt-2 flex flex-wrap gap-1">
                    @foreach($job->skills as $skill)
                        <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded">
                            {{ $skill->name }}
                        </span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
