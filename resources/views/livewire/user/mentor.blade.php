<div>
<style>

.mentor-wrap {
  padding: 10px 0px 10px;
  max-width: 1200px;
  margin: 0 auto;
  box-sizing: border-box;
}

/* --- Header --- */
.mentor-header {
  margin-bottom: 32px;
}

.mentor-header h1 {
  font-size: clamp(20px, 3vw, 26px);
  font-weight: 800;
  color: var(--green);
  margin: 0 0 6px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.mentor-header p {
  color: var(--text-muted);
  font-size: 14px;
  margin: 0;
  line-height: 1.5;
}

/* --- Grid --- */
.mentor-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(min(100%, 300px), 1fr));
  gap: 20px;
  margin-top: 24px;
}

/* --- Card --- */
.mentor-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 22px 20px 20px;
  display: flex;
  flex-direction: column;
  gap: 0;
  transition: box-shadow 0.2s ease, transform 0.2s ease;
  box-shadow: var(--shadow-sm, 0 1px 4px rgba(0,0,0,.06));
}

.mentor-card:hover {
  box-shadow: var(--shadow-md, 0 4px 16px rgba(0,0,0,.1));
  transform: translateY(-2px);
}

/* --- Card top row --- */
.mentor-card-top {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  margin-bottom: 18px;
}

/* Avatar */
.mentor-avatar,
.mentor-avatar-placeholder {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  flex-shrink: 0;
}

.mentor-avatar {
  object-fit: cover;
  border: 2px solid var(--blue-pale, #dbeafe);
}

.mentor-avatar-placeholder {
  background: var(--green);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 18px;
  font-weight: 700;
}

/* Name block */
.mentor-name {
  font-weight: 700;
  font-size: 15px;
  color: var(--text);
  line-height: 1.3;
  margin-bottom: 2px;
}

.mentor-pos {
  font-size: 12px;
  color: var(--text-muted);
  line-height: 1.4;
  margin-bottom: 4px;
}

.mentor-badge {
  display: inline-block;
  background: var(--blue-pale, #dbeafe);
  color: var(--green);
  font-size: 11px;
  font-weight: 600;
  padding: 2px 9px;
  border-radius: 20px;
  white-space: nowrap;
}

/* --- Sections --- */
.mentor-section {
  margin-bottom: 12px;
}

.mentor-label {
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  color: var(--text-muted);
  margin-bottom: 5px;
}

.mentor-section-val {
  font-size: 13px;
  color: var(--text);
  line-height: 1.4;
}

/* --- Skill tags --- */
.mentor-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 5px;
}

.mentor-tag {
  background: #f1f5f9;
  color: var(--text-muted);
  font-size: 11px;
  padding: 3px 9px;
  border-radius: 6px;
  line-height: 1.5;
}

/* --- Meta --- */
.mentor-meta {
  font-size: 12px;
  color: var(--text-muted);
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  gap: 5px;
}

/* --- Bio --- */
.mentor-bio {
  font-size: 13px;
  color: var(--text-muted);
  line-height: 1.65;
  margin-bottom: 14px;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  flex: 1;        /* push contact to bottom */
}

/* --- Contact block --- */
.mentor-contact {
  margin-top: auto;
  background: #f8faf9;
  border: 1px solid var(--border);
  border-radius: 8px;
  padding: 9px 12px;
  font-size: 13px;
  color: var(--text);
  display: flex;
  align-items: center;
  gap: 8px;
  word-break: break-all;
}

.mentor-contact i {
  color: var(--green);
  flex-shrink: 0;
}

/* --- Empty state --- */
.mentor-empty {
  text-align: center;
  padding: 72px 24px;
  color: var(--text-muted);
}

.mentor-empty i {
  font-size: 44px;
  margin-bottom: 14px;
  display: block;
  opacity: 0.25;
}

.mentor-empty p {
  font-size: 15px;
  margin: 0;
}

/* --- Pagination --- */
.pgn-row {
  margin-top: 32px;
  display: flex;
  justify-content: center;
}



@media (max-width: 900px) {
  .mentor-grid {
    grid-template-columns: repeat(auto-fill, minmax(min(100%, 280px), 1fr));
    gap: 16px;
  }
}

@media (max-width: 540px) {
  .mentor-wrap {
    padding: 24px 16px 40px;
  }

  .mentor-header {
    margin-bottom: 20px;
  }

  .mentor-grid {
    grid-template-columns: 1fr;
    gap: 14px;
    margin-top: 16px;
  }

  .mentor-card {
    padding: 18px 16px 16px;
    border-radius: 12px;
  }

  .mentor-card-top {
    gap: 12px;
    margin-bottom: 14px;
  }

  .mentor-avatar,
  .mentor-avatar-placeholder {
    width: 46px;
    height: 46px;
    font-size: 16px;
  }

  .mentor-name {
    font-size: 14px;
  }
  .mentor-bio {
    -webkit-line-clamp: 2;
  }
}
@media (max-width: 360px) {
  .mentor-card-top {
    flex-direction: row;  
    gap: 10px;
  }

  .mentor-header h1 {
    font-size: 18px;
  }
}
</style>

<div class="container mentor-wrap">

  <div class="mentor-header">
    <h1><i class="fa-solid fa-user-graduate"></i> Tìm Mentor</h1>
    <p>Kết nối với cựu sinh viên có kinh nghiệm để được hỗ trợ định hướng nghề nghiệp</p>
  </div>

  <x-toolbar>
    <x-slot:search>
      <x-toolbar.search placeholder="Tìm theo tên, kỹ năng, lĩnh vực..." />
    </x-slot:search>
    <x-toolbar.input model="filterExpertise" placeholder="Lĩnh vực..." />
  </x-toolbar>

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

    <div class="pgn-row">
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