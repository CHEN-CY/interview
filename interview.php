<?php

$batch_mail_data = [
    'title' => '猜你喜歡',
    'from' => 'recommend@buy123.com.tw',
    'name' => '生活市集',
    'to' => [
        'aaa@gmail.com',
        'bbb@gmail.com',
        'ccc@gmail.com',
        'ddd@gmail.com',
        'eee@gmail.com',
        'fff@gmail.com',
        'ggg@gmail.com',
        'hhh@gmail.com',
        'iii@gmail.com',
        'jjj@gmail.com',
        'kkk@gmail.com',
        'lll@gmail.com',
        'mmm@gmail.com',
    ],
    'sub' => [
        '%name%' => [
            'aaa',
            'bbb',
            'ccc',
            'ddd',
            'eee',
            'fff',
            'ggg',
            'hhh',
            'iii',
            'jjj',
            'kkk',
            'lll',
            'mmm',
        ],
        '%email%' => [
            'aaa@gmail.com',
            'bbb@gmail.com',
            'ccc@gmail.com',
            'ddd@gmail.com',
            'eee@gmail.com',
            'fff@gmail.com',
            'ggg@gmail.com',
            'hhh@gmail.com',
            'iii@gmail.com',
            'jjj@gmail.com',
            'kkk@gmail.com',
            'lll@gmail.com',
            'mmm@gmail.com',
        ]
    ]
]

public function send_batch_email($batch_mail_data)
{
    $template = [
        'to' => [],
        'from' => [
            'email' => '',
            'name' => ''
        ],
        'substitutions' => []
    ];
    // 標題
    $data['subject'] = $batch_mail_data['title'];
    // 寄件人
    $data['from'] = [
        'email' => $batch_mail_data['from'],
        'name' => $batch_mail_data['from_name']
    ];

    foreach ($batch_mail_data['to'] as $key => $value) {
        $userMail = $template;
        // 收件人
        $userMail['to'][] = [
            'email' => $value,
            // 'name' => ''
        ];
        // 寄信人
        $userMail['from'] = [
            'email' => $batch_mail_data['from'],
            'name' => $batch_mail_data['from_name']
        ];
        // 取代文字
        $userMail['substitutions'] = [
            '%name%' => isset($batch_mail_data['sub']['%name%'][$key]) ? $batch_mail_data['sub']['%name%'][$key] : '',
            '%email%' => isset($batch_mail_data['sub']['%email%'][$key]) ? $batch_mail_data['sub']['%email%'][$key] : '',
        ];
        $data['personalizations'][] = $userMail;
    }
}