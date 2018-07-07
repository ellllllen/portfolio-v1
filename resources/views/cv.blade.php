@extends('layouts.app', ['mainTitle' => trans('cv.title')])

@section('content')
    <div class="cv-section">
        <div class="cv-title">Personal Statement</div>
        In 2010 I finished my degree in Computing gaining a 2:1 with Honours. Since I graduated I have been working for
        a Telecommunications company as part of the Development team. I was first brought on-board as a Developer to
        utilise my skills in languages such as PHP, MySQL, HTML, CSS and JavaScript. However, I was keen to expand my
        abilities to other areas which included learning new skills in the DevOps role. I feel I am a big part of making
        the team successful, this includes implementing the Laravel framework, which has vastly improved productivity. I
        recently got promoted to Software Team Lead, where I manage, mentor and train a small team of Software
        Developers to ensure software is produced at a high quality using best practices.
    </div>
    <div class="cv-section">
        <div class="cv-title">Specialist Skills</div>
        <ul>
            <li>
                {{ date_diff_in_years("2008", "10") }}: PHP 5/PHP 7, MySQL, HTML, CSS/SaSS
            </li>
            <li>
                {{ date_diff_in_years("2010", "06") }}: Linux/LAMP Stack, JavaScript/JQuery/VueJS
            </li>
            <li>
                {{ date_diff_in_years("2015", "01") }}: Laravel, Git
            </li>
            <li>
                {{ date_diff_in_years("2017", "01") }}: PHPUnit
            </li>
        </ul>
    </div>
    <div class="cv-section">
        <div class="cv-title">Employment History</div>
        <div class="cv-employ">
            <div class="cv-employ-title">Current Employer - Cirencester, Gloucestershire</div>
            <div class="cv-employ-subtitle">Developer (June 2010 to March 2018), Business Continuity Manager (June 2017
                to present), Software Team Lead (March 2018 to present)
            </div>
            During my time with this company I have gained a lot of experience creating high quality public and internal web
            portals as well as developing backend micro services and RESTful APIs. I have developed various systems,
            including developing new products to sell to our customers and automating in
            house procedures. Within the first year of working at the company I had established the company’s
            Intranet, which improved the day to day working for all members of staff. More recently I have developed a
            public web portal for our customers where they configure and monitor the different products and
            services they have with the company.
            <br>
            Although the company was fully established when I joined, my team was treated as a start up. Therefore, I
            have been able to influence high level decisions such as programming techniques and tools and vastly
            expanding the company data centre infrastructure, showing I am motivated and proactive. My role also
            involves managing projects and mentoring other members of the team, which has given me increased
            responsibility and management skills.
            <br>
            Since learning and implementing the Laravel framework three years ago, I feel my skills in Object Orientated
            coding and test driven development (TDD) have greatly improved. I have also enhanced my skills in VueJS and
            SaSS. Additionally, I have established my skills in DevOps and networking, which
            involved deploying and maintaining Linux CentOS servers. With my expanded role I became
            instrumental in ensuring connectivity, security and performance of these servers and the underlying data
            centres.
            <br>
            In recent months I have been training in Android programming. I now add and enhance features on an existing
            Android application. This shows I have the ability to adapt to new challenges and that I have a strong
            programming foundation.
            <br>
            Last year I earned the role of Business Continuity Manager, it involves identifying risks, developing new
            policies and procedures and then implementing them across the entire company. I gained the ISO 22301:2012
            in Business Continuity accreditation for the company in May 2018. This shows an ability to multi-task as
            well as being organised and detail oriented.
            <br>
            After being promoted to Software Team Lead I have implemented several improvements within the team,
            including adopting the Kanban methodology, assuring SOLID principles are executed and prioritising projects
            and tasks. A big part of the role is to mentor other team members and pass on my experience of delivering
            high quality solutions. I additionally ensure software is achieved at a high standard within tight
            deadlines, while encouraging team members to keep abreast of the latest best practices and technologies.
            My role has given me increased responsibility and management skills.
        </div>
        <div class="cv-employ">
            <div class="cv-employ-title">Axiell - Ferndown, Dorset</div>
            <div class="cv-employ-subtitle">Web Developer (June 2008 to June 2009)</div>
            The job at Axiell was part of my University placement year. They initially contracted me for 40 weeks which
            was then extended to 52 weeks after the company acknowledged the high quality work I was producing. My core
            duty was to create well designed maintainable interface using HTML and CSS. The project also required
            frequent validation, accessibility and usability testing, which I volunteered to take on and ultimately
            became my responsibility. Working for the company involved managing a large workload, good communication
            skills and team work in addition to excellent technical skills in HTML and CSS.
        </div>
        <div class="cv-employ">
            <div class="cv-employ-title">Pall - Ilfracombe, Devon</div>
            <div class="cv-employ-subtitle">Line Worker (Mar. 2006 to Sept. 2006)</div>
            This job involved working to daily targets and working within regulations as well as correctly filling in
            paperwork and forms correctly and efficiently. The skills I obtained from this job were communication, team
            work and time management.
        </div>
        <div class="cv-employ">
            <div class="cv-employ-title">Combe Martin Wildlife Park - Combe Martin, Devon</div>
            <div class="cv-employ-subtitle">Shop Assistant (Apr. 2003 to Nov. 2005)</div>
            While still in full time education I worked as a shop assistant. The skills I gained working within this
            role was time management, communication, money handling, customer service and team work.
        </div>
    </div>
    <div class="cv-section">
        <div class="cv-title">Education</div>
        <div class="cv-employ">
            <div class="cv-employ-title">Bournemouth University - Bournemouth, Dorset</div>
            <div class="cv-employ-subtitle">2:1 BSc (Hons) Computing</div>
            <u>Final Year Modules:</u><br>
            Web Systems<br>
            Software Systems Modelling<br>
            Digital Media and Games<br>
            Final year dissertation and project
        </div>
        <div class="cv-employ">
            <div class="cv-employ-title">Ilfracombe College - Ilfracombe, Devon</div>
            <div class="cv-employ-subtitle">A Levels</div>
            A-Level Information Technology (A)<br>
            A-Level Maths (D)<br>
            AS-Level Media Studies (C)<br>
            AS-Level Geography (D)<br>
            <br>

            <div class="cv-employ-subtitle">GCSE’s</div>
            10 GCSE’s A - C including Maths, Science and English
        </div>
    </div>
    <div class="cv-section">
        <div class="cv-title">References</div>
        References are available upon request.
    </div>
@endsection