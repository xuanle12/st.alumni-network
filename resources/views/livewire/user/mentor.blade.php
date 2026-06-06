<div>
<style>
.mentor-wrap        { padding: 32px 0 48px; }
.mentor-header      { margin-bottom: 28px; }
.mentor-header h1   { font-size: 24px; font-weight: 800; color: var(--blue); margin-bottom: 4px; }
.mentor-header p    { color: var(--text-muted); font-size: 14px; }

.mentor-filter      { background: #f8faf9; border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 28px; display: flex; gap: 12px; flex-wrap: wrap; align-items: center; }
.mentor-filter-main { flex: 1; min-width: 200px; }
.mentor-input       { width: 100%; padding: 9px 14px; border: 1px solid var(--border); border-radius: 8px; font-size: 14px; font-family: inherit; }
.mentor-input:focus { outline: none; border-color: var(--blue); }

.mentor-grid        { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }

.mentor-card        { background: #fff; border: 1px solid var(--border); border-radius: 12px; padding: 24px; transition: .2s; box-shadow: var(--shadow-sm); }
.mentor-card:hover  { box-shadow: var(--shadow-md); transform: translateY(-2px); }

.mentor-card-top    { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; }
.mentor-avatar      { width: 56px; height: 56px; border-radius: 50%; object-fit: cover; border: 2px solid var(--blue-pale); flex-shrink: 0; }
.mentor-avatar-placeholder { width: 56px; height: 56px; border-radius: 50%; background: var(--blue); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 20px; font-weight: 700; flex-shrink: 0; }
.mentor-name        { font-weight: 700; font-size: 15px; color: var(--text); }
.mentor-pos         { font-size: 12px; color: var(--text-muted); }
.mentor-badge       { display: inline-block; margin-top: 4px; background: var(--blue-pale); color: var(--blue); font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 20px; }

.mentor-label       { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .8px; color: var(--text-muted); margin-bottom: 4px; }
.mentor-section     { margin-bottom: 10px; }
.mentor-section-val { font-size: 13px; color: var(--text); }

.mentor-tags        { display: flex; flex-wrap: wrap; gap: 5px; }
.mentor-tag         { background: #f1f5f9; color: var(--text-muted); font-size: 11px; padding: 3px 8px; border-radius: 6px; }

.mentor-meta        { font-size: 12px; color: var(--text-muted); margin-bottom: 12px; }
.mentor-bio         { font-size: 13px; color: var(--text-muted); line-height: 1.6; margin-bottom: 14px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }

.mentor-contact     { background: #f8faf9; border: 1px solid var(--border); border-radius: 8px; padding: 10px 12px; font-size: 13px; color: var(--text); }
.mentor-contact i   { color: var(--blue); }

.mentor-empty       { text-align: center; padding: 60px 20px; color: var(--text-muted); }
.mentor-empty i     { font-size: 40px; margin-bottom: 12px; display: block; opacity: .3; }
.mentor-empty p     { font-size: 15px; }

.mentor-pagination  { margin-top: 28px; }
</style>

<div class="container mentor-wrap">

  <div class="mentor-header">
    <h1><i class="fa-solid fa-user-graduate"></i> Tìm Mentor</h1>
    <p>Kết nối với cựu sinh viên có kinh nghiệm để được hỗ trợ định hướng nghề nghiệp</p>
  </div>

  <div class="mentor-filter">
    <div class="mentor-filter-main">
      <input wire:model.live.debounce.300ms="search" type="text"
             class="mentor-input" placeholder="Tìm theo tên, kỹ năng, lĩnh vực...">
    </div>
    <div>
      <input wire:model.live.debounce.300ms="filterExpertise" type="text"
             class="mentor-input" placeholder="Lĩnh vực..." style="width:auto">
    </div>
  </div>

  @if($mentors->count())
    <div class="mentor-grid">
      @foreach($mentors as $mentor)
        @php $profile = $mentor->user->profile; @endphp
        <div class="mentor-card">

          <div class="mentor-card-top">
            @if($profile?->avatar)
              <img src="{{ asset('storage/'.$profile->avatar) }}" class="mentor-avatar">
            @else
              <div class="mentor-avatar-placeholder">
                {{ $mentor->user->initials }}
              </div>
            @endif
            <div>
              <div class="mentor-name">{{ $mentor->user->name }}</div>
              @if($profile?->position && $profile?->current_company)
                <div class="mentor-pos">{{ $profile->position }} · {{ $profile->current_company }}</div>
              @endif
              <span class="mentor-badge">🏅 Mentor</span>
            </div>
          </div>

          <div class="mentor-section">
            <div class="mentor-label">Lĩnh vực</div>
            <div class="mentor-section-val">{{ $mentor->expertise }}</div>
          </div>

          <div class="mentor-section">
            <div class="mentor-label">Kỹ năng</div>
            <div class="mentor-tags">
              @foreach(explode(',', $mentor->skills) as $skill)
                <span class="mentor-tag">{{ trim($skill) }}</span>
              @endforeach
            </div>
          </div>

          <div class="mentor-meta">
            <i class="fa-solid fa-users"></i> Tối đa {{ $mentor->max_mentee }} mentee
          </div>

          @if($mentor->bio)
            <p class="mentor-bio">{{ $mentor->bio }}</p>
          @endif

          @if($mentor->contact_info)
            <div class="mentor-contact">
              <i class="fa-solid fa-address-card"></i> {{ $mentor->contact_info }}
            </div>
          @endif

        </div>
      @endforeach
    </div>

    <div class="mentor-pagination">
      {{ $mentors->links() }}
    </div>

  @else
    <div class="mentor-empty">
      <i class="fa-solid fa-user-graduate"></i>
      <p>Chưa có mentor nào phù hợp với tìm kiếm của bạn.</p>
    </div>
  @endif

</div>
</div>