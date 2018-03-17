@if($codeSchool)
    <div class="training-container">
        <div class="main-title">Training</div>
        <div>
            From time to time I like to improve my knowledge by doing some training/courses.
        </div>
        <div class="code-school-container">
            <h3>
                <a href="https://www.codeschool.com" target="_blank">
                    Code School
                </a>
            </h3>
            <div>
                Code School teaches web technologies in the comfort of your browser with video lessons, coding
                challenges, and screencasts.
                <br>
                Total Score: {{ $codeSchool->user->total_score }} points
            </div>
            <h4>Courses</h4>
            <div class="badges-container">
                @if($codeSchool->courses)
                    @foreach($codeSchool->courses->completed + $codeSchool->courses->in_progress as $course)
                        @include('code_school._badge', ['url' =>$course->url, 'badgeImage' => $course->badge])
                    @endforeach
                @endif
            </div>
            <h4>Badges</h4>
            <div class="badges-container">
                @if($codeSchool->badges)
                    @foreach($codeSchool->badges as $badge)
                        @include('code_school._badge', ['url' => $badge->course_url, 'badgeImage' => $badge->badge])
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif