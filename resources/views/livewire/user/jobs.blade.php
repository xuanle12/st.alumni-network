<div>
    @push('styles')
<style>
    .jl-wrap { display: flex; gap: 24px; align-items: flex-start; }
 
    /* ── SIDEBAR ── */
    .jl-sidebar { width: 240px; flex-shrink: 0; position: sticky; top: 80px; display: flex; flex-direction: column; gap: 14px; }
 
    .jl-filter-box { background: #fff; border: 1px solid #e9ecef; border-radius: 12px; overflow: hidden; }
    .jl-filter-header { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; border-bottom: 1px solid #e9ecef; }
    .jl-filter-header span { font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.6px; }
    .jl-filter-header button { font-size: 12px; color: #15803d; background: none; border: none; cursor: pointer; padding: 0; }
    .jl-filter-header button:hover { text-decoration: underline; }
 
    .jl-acc-group { border-bottom: 1px solid #e9ecef; }
    .jl-acc-group:last-child { border-bottom: none; }
    .jl-acc-head { width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 10px 18px; background: none; border: none; cursor: pointer; text-align: left; font-size: 13px; font-weight: 500; color: #374151; }
    .jl-acc-head:hover { background: #f9fafb; }
    .jl-acc-arrow { width: 14px; height: 14px; transition: transform 0.2s; color: #9ca3af; flex-shrink: 0; }
    .jl-acc-arrow.open { transform: rotate(180deg); }
    .jl-acc-body { padding: 6px 18px 14px; display: flex; flex-direction: column; gap: 8px; }
 
    .jl-check-row { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #374151; cursor: pointer; }
    .jl-check-row:hover { color: #111827; }
    .jl-check-row input[type=checkbox] { accent-color: #15803d; width: 14px; height: 14px; flex-shrink: 0; cursor: pointer; }
    .jl-check-row .jl-check-label { flex: 1; line-height: 1.4; }
    .jl-check-row .jl-check-count { font-size: 11px; color: #9ca3af; }
 
    .jl-emp-box { background: #fff; border: 1px solid #e9ecef; border-radius: 12px; padding: 18px; }
    .jl-emp-box .jl-emp-title { font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.6px; margin-bottom: 8px; }
    .jl-emp-box p { font-size: 13px; color: #6b7280; line-height: 1.6; margin-bottom: 12px; }
    .jl-emp-btn { display: block; width: 100%; padding: 8px; text-align: center; font-size: 13px; font-weight: 500; color: #fff; background: #15803d; border-radius: 8px; text-decoration: none; transition: background 0.2s; }
    .jl-emp-btn:hover { background: #166534; }
 
    /* ── MAIN ── */
    .jl-main { flex: 1; min-width: 0; }
 
    .jl-searchbar { background: #fff; border: 1px solid #e9ecef; border-radius: 12px; padding: 12px 16px; display: flex; gap: 10px; margin-bottom: 14px; }
    .jl-searchbar input { flex: 1; border: 1px solid #d1d5db; border-radius: 8px; padding: 8px 12px; font-size: 13px; outline: none; font-family: inherit; transition: border-color 0.2s; }
    .jl-searchbar input:focus { border-color: #15803d; }
    .jl-searchbar select { border: 1px solid #d1d5db; border-radius: 8px; padding: 8px 10px; font-size: 13px; background: #fff; outline: none; font-family: inherit; color: #374151; }
 
    .jl-meta { display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; padding: 0 2px; }
    .jl-meta p { font-size: 13px; color: #6b7280; }
    .jl-meta strong { color: #111827; }
    .jl-meta select { border: 1px solid #d1d5db; border-radius: 8px; padding: 5px 10px; font-size: 12px; background: #fff; outline: none; font-family: inherit; color: #374151; }
 
    .jl-list { display: flex; flex-direction: column; gap: 10px; }
 
    .jl-card { background: #fff; border: 1px solid #e9ecef; border-radius: 12px; padding: 18px 20px; display: grid; grid-template-columns: 1fr 130px; gap: 16px; align-items: start; transition: border-color 0.2s; }
    .jl-card:hover { border-color: #15803d; }
    .jl-card.featured { border-color: #f59e0b; }
 
    .jl-badge-featured { display: inline-block; font-size: 11px; font-weight: 500; color: #92600e; background: #fffbeb; border: 1px solid #fde68a; padding: 2px 8px; border-radius: 6px; margin-bottom: 8px; }
    .jl-title { font-size: 15px; font-weight: 600; color: #111827; margin-bottom: 3px; }
    .jl-company { font-size: 13px; font-weight: 500; color: #15803d; margin-bottom: 10px; }
 
    .jl-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 8px; }
    .jl-tag { font-size: 11px; color: #6b7280; background: #f9fafb; border: 1px solid #e9ecef; padding: 3px 9px; border-radius: 6px; }
 
    .jl-desc { font-size: 13px; color: #6b7280; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
 
    .jl-skills { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px; }
    .jl-skill { font-size: 11px; color: #15803d; background: #f0fdf4; border: 1px solid #bbf7d0; padding: 2px 8px; border-radius: 6px; }
 
    .jl-right { text-align: right; }
    .jl-salary { font-size: 14px; font-weight: 600; color: #15803d; margin-bottom: 10px; }
    .jl-btn-apply { display: block; width: 100%; padding: 8px; text-align: center; font-size: 12px; font-weight: 500; color: #fff; background: #15803d; border: none; border-radius: 8px; cursor: pointer; text-decoration: none; margin-bottom: 6px; transition: background 0.2s; font-family: inherit; }
    .jl-btn-apply:hover { background: #166534; }
    .jl-btn-save { display: block; width: 100%; padding: 7px; text-align: center; font-size: 12px; color: #6b7280; background: none; border: 1px solid #d1d5db; border-radius: 8px; cursor: pointer; transition: all 0.2s; font-family: inherit; }
    .jl-btn-save:hover { border-color: #15803d; color: #15803d; }
    .jl-deadline { font-size: 11px; color: #9ca3af; margin-top: 6px; }
 
    .jl-empty { background: #fff; border: 1px solid #e9ecef; border-radius: 12px; padding: 48px 20px; text-align: center; }
    .jl-empty p { font-size: 13px; color: #9ca3af; }
    .jl-empty button { margin-top: 10px; font-size: 13px; color: #15803d; background: none; border: none; cursor: pointer; font-family: inherit; }
    .jl-empty button:hover { text-decoration: underline; }
 
    .jl-pagination { margin-top: 20px; display: flex; justify-content: center; }
</style>
@endpush

<div class="flex gap-6 items-start">

    {{-- ───── SIDEBAR ───── --}}
    <aside class="w-64 flex-shrink-0 sticky top-20 space-y-4">

        <div class="bg-white border border-gray-100 rounded-xl overflow-hidden">
            <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Bộ lọc</p>
                <button wire:click="resetFilters" class="text-xs text-green-700 hover:underline">Đặt lại</button>
            </div>

        
            <div x-data="{ open: true }" class="border-b border-gray-100">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition text-left">
                    <span class="text-sm font-medium text-gray-700">Loại công việc</span>
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform duration-200"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-5 pb-4 space-y-2">
                    @foreach($jobTypes as $val => $label)
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer hover:text-gray-900">
                            <input type="checkbox" wire:model.live="types" value="{{ $val }}"
                                   class="accent-green-700 w-4 h-4 flex-shrink-0">
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            
            <div x-data="{ open: true }" class="border-b border-gray-100">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition text-left">
                    <span class="text-sm font-medium text-gray-700">Khoa / Ngành</span>
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform duration-200"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-5 pb-4 space-y-2">
                    @foreach($departments as $dept)
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer hover:text-gray-900">
                            <input type="checkbox" wire:model.live="fields" value="{{ $dept->slug }}"
                                   class="accent-green-700 w-4 h-4 flex-shrink-0">
                            <span class="flex-1 leading-snug">{{ $dept->name }}</span>
                            <span class="text-xs text-gray-400">{{ $dept->jobs_count }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div x-data="{ open: false }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition text-left">
                    <span class="text-sm font-medium text-gray-700">Địa điểm</span>
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform duration-200"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-5 pb-4 space-y-2">
                    @foreach($locationOptions as $loc)
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer hover:text-gray-900">
                            <input type="checkbox" wire:model.live="locations" value="{{ $loc->location_key }}"
                                   class="accent-green-700 w-4 h-4 flex-shrink-0">
                            <span>{{ $loc->location }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        
        <div class="bg-white border border-gray-100 rounded-xl p-5">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Doanh nghiệp</p>
            <p class="text-sm text-gray-500 leading-relaxed mb-3">
                Đăng tin miễn phí, tiếp cận trực tiếp sinh viên & cựu sinh viên VNUA.
            </p>
            <a href="#"
               class="block w-full py-2 text-center text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 transition">
                Đăng tin tuyển dụng
            </a>
        </div>

    </aside>

    
    <div class="flex-1 min-w-0">

        {{-- Tìm kiếm --}}
        <div class="bg-white border border-gray-100 rounded-xl p-4 flex gap-3 mb-4">
            <input type="text"
                   wire:model.live.debounce.300ms="search"
                   placeholder="Tìm vị trí, kỹ năng, công ty..."
                   class="flex-1 border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:border-green-600 transition">
            <select wire:model.live="field"
                    class="border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white outline-none text-gray-700">
                <option value="">Tất cả lĩnh vực</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->slug }}">{{ $dept->name }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="flex items-center justify-between mb-3 px-1">
            <p class="text-sm text-gray-500">
                Tìm thấy <span class="font-semibold text-gray-800">{{ $jobs->total() }} tin</span> phù hợp
            </p>
            <p class="text-sm text-gray-500">
                Tìm thấy <span class="font-semibold text-gray-800"> tin</span> phù hợp
            </p>
            <select wire:model.live="sort"
                    class="border border-gray-200 rounded-lg px-3 py-1.5 text-sm bg-white outline-none text-gray-700">
                <option value="latest">Mới nhất</option>
                <option value="salary">Lương cao nhất</option>
            </select>
        </div>

        
        <div class="space-y-3">
            @forelse($jobs as $job)
                <div class="bg-white border rounded-xl p-5 hover:border-green-600 transition
                            {{ $job->is_featured ? 'border-amber-300' : 'border-gray-100' }}">
                    <div class="flex gap-4 items-start">
                        <div class="flex-1 min-w-0">
                            @if($job->is_featured)
                                <span class="inline-block text-xs font-medium text-amber-700 bg-amber-50 border border-amber-200 px-2 py-0.5 rounded-md mb-2">
                                    Nổi bật
                                </span>
                            @endif
                            <h3 class="text-base font-semibold text-gray-900 mb-1">{{ $job->title }}</h3>
                            <p class="text-sm font-medium text-green-700 mb-3">{{ $job->company }}</p>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="text-xs text-gray-500 bg-gray-50 border border-gray-100 px-2.5 py-1 rounded-md">{{ $job->location }}</span>
                                <span class="text-xs text-gray-500 bg-gray-50 border border-gray-100 px-2.5 py-1 rounded-md">{{ $job->type_label }}</span>
                                @if($job->experience)
                                    <span class="text-xs text-gray-500 bg-gray-50 border border-gray-100 px-2.5 py-1 rounded-md">{{ $job->experience }}</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-500 leading-relaxed line-clamp-2">{{ $job->description }}</p>
                            @if(!empty($job->skills))
                                <div class="flex flex-wrap gap-1.5 mt-3">
                                    @foreach($job->skills as $skill)
                                        <span class="text-xs text-green-700 bg-green-50 border border-green-100 px-2 py-0.5 rounded-md">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="flex-shrink-0 text-right w-36">
                            <p class="text-sm font-semibold text-green-700 mb-3">{{ $job->salary_label }}</p>
                            <a href="#"
                               class="block w-full py-2 text-center text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 transition mb-2">
                                Ứng tuyển
                            </a>
                            <button class="block w-full py-2 text-xs text-gray-500 border border-gray-200 rounded-lg hover:border-green-600 hover:text-green-700 transition">
                                Lưu tin
                            </button>
                            <p class="text-xs text-gray-400 mt-2">Hạn: {{ $job->deadline }}</p>
?                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white border border-gray-100 rounded-xl p-12 text-center">
                    <p class="text-gray-400 text-sm">Không tìm thấy tin tuyển dụng phù hợp.</p>
                    <button wire:click="resetFilters" class="mt-3 text-green-700 text-sm hover:underline">Xóa bộ lọc</button>
                </div>
            @endforelse
        </div>

        @if($jobs->hasPages())
            <div class="mt-6">{{ $jobs->links() }}</div>
        @endif

    </div>

</div>
