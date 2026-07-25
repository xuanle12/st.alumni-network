    <div class="cv-paper">
      <h1 class="cv-name">{{ $full_name !== '' ? $full_name : 'Họ và tên' }}</h1>
      @if($job_title !== '')<div class="cv-role">{{ $job_title }}</div>@endif

      <div class="cv-contact">
        @if($email !== '')<span><i class="fa-solid fa-envelope"></i> {{ $email }}</span>@endif
        @if($phone !== '')<span><i class="fa-solid fa-phone"></i> {{ $phone }}</span>@endif
        @if($address !== '')<span><i class="fa-solid fa-location-dot"></i> {{ $address }}</span>@endif
        @if($website !== '')<span><i class="fa-solid fa-link"></i> {{ $website }}</span>@endif
      </div>
      <div class="cv-rule"></div>

      @if(trim($summary) !== '')
        <div class="cv-sec">
          <div class="cv-sec-t">Giới thiệu</div>
          <div class="cv-summary">{{ $summary }}</div>
        </div>
      @endif

      @php $eduRows = array_filter($education, fn($r) => trim(($r['school'] ?? '').($r['major'] ?? '')) !== ''); @endphp
      @if(count($eduRows))
        <div class="cv-sec">
          <div class="cv-sec-t">Học vấn</div>
          @foreach($eduRows as $r)
            <div class="cv-e">
              <div class="cv-e-hd">
                <span class="cv-e-t">{{ $r['school'] ?? '' }}</span>
                <span class="cv-e-when">{{ trim(($r['from'] ?? '') . (($r['from'] ?? '') && ($r['to'] ?? '') ? ' – ' : '') . ($r['to'] ?? '')) }}</span>
              </div>
              @if(trim($r['major'] ?? '') !== '')<div class="cv-e-s">{{ $r['major'] }}</div>@endif
              @if(trim($r['note'] ?? '') !== '')<div class="cv-e-n">{{ $r['note'] }}</div>@endif
            </div>
          @endforeach
        </div>
      @endif

      @php $expRows = array_filter($experience, fn($r) => trim(($r['company'] ?? '').($r['role'] ?? '')) !== ''); @endphp
      @if(count($expRows))
        <div class="cv-sec">
          <div class="cv-sec-t">Kinh nghiệm làm việc</div>
          @foreach($expRows as $r)
            <div class="cv-e">
              <div class="cv-e-hd">
                <span class="cv-e-t">{{ $r['role'] ?? '' }}</span>
                <span class="cv-e-when">{{ trim(($r['from'] ?? '') . (($r['from'] ?? '') && ($r['to'] ?? '') ? ' – ' : '') . ($r['to'] ?? '')) }}</span>
              </div>
              @if(trim($r['company'] ?? '') !== '')<div class="cv-e-s">{{ $r['company'] }}</div>@endif
              @if(trim($r['note'] ?? '') !== '')<div class="cv-e-n">{{ $r['note'] }}</div>@endif
            </div>
          @endforeach
        </div>
      @endif

      @php $prjRows = array_filter($projects, fn($r) => trim($r['name'] ?? '') !== ''); @endphp
      @if(count($prjRows))
        <div class="cv-sec">
          <div class="cv-sec-t">Dự án</div>
          @foreach($prjRows as $r)
            <div class="cv-e">
              <div class="cv-e-hd">
                <span class="cv-e-t">{{ $r['name'] }}</span>
                <span class="cv-e-when">{{ $r['role'] ?? '' }}</span>
              </div>
              @if(trim($r['link'] ?? '') !== '')<div class="cv-e-s">{{ $r['link'] }}</div>@endif
              @if(trim($r['note'] ?? '') !== '')<div class="cv-e-n">{{ $r['note'] }}</div>@endif
            </div>
          @endforeach
        </div>
      @endif

      @php $skillRows = array_filter($skills, fn($r) => trim($r['name'] ?? '') !== ''); @endphp
      @if(count($skillRows))
        <div class="cv-sec">
          <div class="cv-sec-t">Kỹ năng</div>
          <div class="cv-skills">
            @foreach($skillRows as $r)<span class="cv-skill">{{ $r['name'] }}</span>@endforeach
          </div>
        </div>
      @endif

      @php $certRows = array_filter($certificates, fn($r) => trim($r['name'] ?? '') !== ''); @endphp
      @if(count($certRows))
        <div class="cv-sec">
          <div class="cv-sec-t">Chứng chỉ</div>
          @foreach($certRows as $r)
            <div class="cv-e">
              <div class="cv-e-hd">
                <span class="cv-e-t">{{ $r['name'] }}</span>
                <span class="cv-e-when">{{ $r['year'] ?? '' }}</span>
              </div>
              @if(trim($r['issuer'] ?? '') !== '')<div class="cv-e-s">{{ $r['issuer'] }}</div>@endif
            </div>
          @endforeach
        </div>
      @endif

      @if(trim($summary) === '' && !count($eduRows) && !count($expRows) && !count($skillRows))
        <div class="cv-sec"><div class="cv-blank">Chưa có nội dung.</div></div>
      @endif
    </div>
