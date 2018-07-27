<?php

return [
    'alipay' => [
        'app_id'         => '2016091800540236',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2y+QhT/ac/uKsiqIA0iI8tee8gd5EmCWyhEAoztZhiq9kqOfCjmDOJMFssnyMnnCjukOH1Zs5v0F6bU/3JuvHl0eb+9sNgpymDN0a0VzYKNvDayc+UB3F6meNQTi2G3bIK72fbs0fTXxOUWaoDtd14Sq7XEpw1U895dDxLi1/ZBpi4OGUgTH1hUaS3xJhgKAGjVY5y5fvTNOYZWWQmEKMIrbC+egkgKvjlzcVHOw4/3JfTuJ0BUcc1VfP8R6zhGFErdkBnUPDE5ynzHJ3OqmcFr2AugqGfVOlsAiI6nWwXtaQQvW6DZSbOLdSPWAlgEoAf6YSdTHH3SlFiN+Dv6S7QIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEA2y+QhT/ac/uKsiqIA0iI8tee8gd5EmCWyhEAoztZhiq9kqOfCjmDOJMFssnyMnnCjukOH1Zs5v0F6bU/3JuvHl0eb+9sNgpymDN0a0VzYKNvDayc+UB3F6meNQTi2G3bIK72fbs0fTXxOUWaoDtd14Sq7XEpw1U895dDxLi1/ZBpi4OGUgTH1hUaS3xJhgKAGjVY5y5fvTNOYZWWQmEKMIrbC+egkgKvjlzcVHOw4/3JfTuJ0BUcc1VfP8R6zhGFErdkBnUPDE5ynzHJ3OqmcFr2AugqGfVOlsAiI6nWwXtaQQvW6DZSbOLdSPWAlgEoAf6YSdTHH3SlFiN+Dv6S7QIDAQABAoIBAQCpzFU3BNpk008E6vHnKT/+cI+Pi759QBpQe4905LtbtqyZduvz7c37+9mEQfHArJbOQzlPiZJf90+nV2QbsPeenCDCMkYwLzPLOMFNgMX67WFQxJHufcREroADLr/VTnVdAm2txWLKRQmUhplc2+C83ufTfcEOs2/BlotHUJibzt8N+2EG+cS59dRWKBfwRgonmvFhUDrIBAMvGWhRlb9KYyRBjAOxHZacrV3AEB08Q01ZON5tNnO/mtx14ycU93JYEmSqFyhZx51u1JeiV3UvLndcI3aIzk+HNHmj6OzsX1WNtiAr68mO23KqstB3RwJ4sPiowqbqfoax4W7kaVkBAoGBAO7P/wfyR+1pDWwGNcgKI8oHRSwLZStBMoeDGXgbHDtzOavTLEQWTi5Wm5G56976EKkTmFeA/TsKntX4CPu+mL0bj+i3UXOW5BOaFrzu0SPS5qEvcX8Gq9NCCs64riGP471bzwRV0AHxffm3Rx18ZyuH77RXdmFQq2xXyzAbe6sNAoGBAOr19MgZ9SrsXdzxUXJ8b1BCu+55K3CHBYff3QtzjJDb8THw5bDJG9gQ28WMjciX9xoypQDiKf9zeGdzzfJJnhPqbHJ7ivu2XHK7uB4HbUlCmmiPCOSY2sUxkr29KRrZ2qVukpVY8oZH1ggTLm/L0iYwSAYDoyBjlqk8e9GjUQ9hAoGAQUFsusslhGYUWNRJlePPa8EY0bQ7bNpf6E+Wgg9GY6hUtfL6QZCmxFq+H8/h+Af0zX6hPiftClkYlfc03TVznxkM9dZB14f/wqt0UyQe2d8jTiAcr00vXobJVTt5uYoL/Q49Pz4DnMRUXAwMzq3Tsz1t7qWHn4ffj7ddukOIQ3ECgYEA6CSQb+/tojYc2wH2dcXp+QOmSIyhVbGhzkhpTjohBLK6EJyxY8SfZQ/rA7jGEQ3MD69ABapu0jxVFul87ki8DXNNKKNVgzL/DkDYPZsa6AoNIwdHQwyfAbvj/uFZLnVWKKMh4rsaC4AIQLwq4jwf6qlDT+XiE0sx/Q2MTGku2qECgYACmoZ1YLx+ctN0VQAUuicsQlzfqHbttKJPyd8ekYQl+z8xlYvOc1VGymgJp/+I9bWn4d8siETFvEAL92MibLNSwc/9OWWXovLDgXJEHyFpRwhef9ShsjvdjoW0AqLqU2lfmfszfiueCz5GoRowb+xfDEl26iWiMKZGePGtIIEq4Q==',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];