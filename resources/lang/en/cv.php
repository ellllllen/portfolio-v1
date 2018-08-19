<?php

return [
    'title' => 'Curriculum Vitae',
    'content' => [
        'personal-statement' => [
            'title' => 'Personal Statement',
            'content' => [
                'In 2010 I finished my degree in Computing gaining a 2:1 with Honours. Since I graduated I have been working for a Telecommunications company as part of the Development team. I was first brought on-board as a Developer to utilise my skills in languages such as PHP, MySQL, HTML, CSS and JavaScript. However, I was keen to expand my abilities to other areas which included learning new skills in the DevOps role. I feel I am a big part of making the team successful, this includes implementing the Laravel framework, which has vastly improved productivity. I recently got promoted to Software Team Lead, where I manage, mentor and train a small team of Software Developers to ensure software is produced at a high quality using best practices'
            ],
        ],
        'specialist-skills' => [
            'title' => 'Specialist Skills',
            'content' => [
                date_diff_in_years("2008", "10") . ': PHP 5/PHP 7, MySQL, HTML, CSS/SaSS',
                date_diff_in_years("2010", "06") . ': Linux/LAMP Stack, JavaScript/JQuery/VueJS',
                date_diff_in_years("2015", "01") . ': Laravel, Git',
                date_diff_in_years("2017", "01") . ': PHPUnit',
            ]
        ],
        'employment' => [
            'title' => 'Employment History',
            'content' => [
                [
                    'name' => 'Current Employer',
                    'location' => 'Cirencester, Gloucestershire',
                    'roles' => [
                        ['title' => 'Developer', 'date' => 'June 2010 to March 2018'],
                        ['title' => 'Business Continuity Manager', 'date' => 'June 2017 to present'],
                        ['title' => 'Software Team Lead', 'date' => 'March 2018 to present'],
                    ],
                    'content' => [
                        'During my time at the company I have gained a lot of experience creating high quality public and internal web portals as well as developing backend micro services and RESTful APIs. I have developed various systems while working at the company, including developing new products to sell to our customers and automating in house procedures. Within the first year of working at the company I had established the company’s Intranet, which improved the day to day working for all members of staff. More recently I have developed a public web portal for our customers where they configure and monitor the different products and services they have with the company. Although the company was fully established when I joined, my team was treated as a start up, therefore, I have been able to influence high level decisions such as programming techniques and tools and vastly expanding the company data centre infrastructure, showing I am motivated and proactive.',
                        'Since learning the Laravel framework three years ago, I feel my skills in Object Orientated coding and automated testing have greatly improved, as well as my knowledge of design principles such as SOLID and DRY. Over this time I have also built several PHP packages, which provide reusable code and a foundation for programming in both our internal and external web platforms. I have also enhanced my skills by using VueJS, a JavaScript framework and the CSS extension language, SaSS, which I compile using NodeJS.',
                        'In recent months I have been learning Android, I can now add and enhance features on an existing Android application. This shows I have the ability to adapt to new challenges and that I have a strong programming foundation.',
                        'Additionally, I have established my skills in DevOps and networking, which involves deploying and maintaining Linux servers. I have experience using the Linux command line as well as installing and configuring the operation system and the services. With my expanded role I became instrumental in ensuring connectivity, security and performance of these servers and the underlying data centres.',
                        'After being promoted to Software Team Lead, I have implemented several improvements within the team, including adopting the Kanban methodology, implementing an improved software life cycle and assuring design principles are utilised. I am instrumental in designing the software architecture behind all software projects and draw on my knowledge in DevOps to plan and integrate solutions in to the wider system architecture. I additionally ensure software is prioritised and achieved at a high standard within tight deadlines. Another big part of the role is to mentor other team members and pass on my experience of delivering high quality solutions, while encouraging them to keep abreast of the latest best practices and technologies. My role has given me increased responsibility and management skills.',
                        'Last year I earned the role of Business Continuity Manager, which involves identifying risks, developing new policies and procedures and then implementing them across the entire company. This shows I have excellent organisational and communication skills. I gained the ISO 22301:2012 in Business Continuity accreditation for the company in May 2018.',
                    ]
                ],
                [
                    'name' => 'Axiell',
                    'location' => 'Ferndown, Dorset',
                    'roles' => [
                        ['title' => 'Web Developer', 'date' => 'June 2008 to June 2009'],
                    ],
                    'content' => [
                        'The job at Axiell was part of my University placement year. They initially contracted me for 40 weeks which was then extended to 52 weeks after the company acknowledged the high quality work I was producing. My core duty was to create well designed maintainable interface using HTML and CSS. The project also required frequent validation, accessibility and usability testing, which I volunteered to take on and ultimately became my responsibility. Working for the company involved managing a large workload, good communication skills and team work in addition to excellent technical skills in HTML and CSS.',
                    ]
                ],
                [
                    'name' => 'Pall',
                    'location' => 'Ilfracombe, Devon',
                    'roles' => [
                        ['title' => 'Line Worker', 'date' => 'Mar. 2006 to Sept. 2006'],
                    ],
                    'content' => [
                        'This job involved working to daily targets and working within regulations as well as correctly filling in paperwork and forms correctly and efficiently. The skills I obtained from this job were communication, team work and time management.'
                    ]
                ],
                [
                    'name' => 'Combe Martin Wildlife Park',
                    'location' => 'Combe Martin, Devon',
                    'roles' => [
                        ['title' => 'Shop Assistant', 'date' => 'Apr. 2003 to Nov. 2005'],
                    ],
                    'content' => [
                        'While still in full time education I worked as a shop assistant. The skills I gained working within this role was time management, communication, money handling, customer service and team work.']
                ]
            ]
        ],
        'education' => [
            'title' => 'Education',
            'content' => [
                [
                    'name' => 'Bournemouth University',
                    'location' => 'Bournemouth, Dorset',
                    'qualifications' => [
                        [
                            'name' => '2:1 BSc (Hons) Computing',
                            'content' => [
                                'Final Year Modules:',
                                'Web Systems',
                                'Software Systems Modelling',
                                'Digital Media and Games',
                                'Final year dissertation and project',
                            ]
                        ]
                    ],
                ],
                [
                    'name' => 'Ilfracombe College',
                    'location' => 'Ilfracombe, Devon',
                    'qualifications' => [
                        [
                            'name' => 'A Levels',
                            'content' => [
                                'A-Level Information Technology (A)',
                                'A-Level Maths (D)',
                                'AS-Level Media Studies (C)',
                                'AS-Level Geography (D)',
                            ]
                        ],
                        [
                            'name' => 'GCSEs',
                            'content' => [
                                '10 GCSEs A - C including Maths, Science and English',
                            ]
                        ]
                    ],
                ]
            ]
        ],
        'references' => [
            'title' => 'References',
            'content' => [
                'References are available upon request.'
            ],
        ]
    ]
];