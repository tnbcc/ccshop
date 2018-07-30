<?php

return [
    'alipay' => [
        'app_id'         => '2016091800540236',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA1h7CVwL6G41JhOgy8Uxh6cXkMWsAcexVMLuZN5kjAzpelmLMTsuaKGEru5qRi9QQxplVNkbesN0w9F+BVhHSd047mB39DEIOD0tuaYLNqm61MsdtTzN9RrGpqEQ8wKLahUHX/FIlz4W3QlO2yWnJ4BZhybBzL21RqLL4e06BJ3GYq96dOMuHAwgrCrkaMZavxFBJUZecybikCMs69c4QuUbxfoPn5SVXBDcBhpx8CDuirXu/AaGRQ8WnH+ZEhW/ivwz/0dTWFze3XUUFrdOHqYPCy45eQMtoYWdAcs6NG1co5bmlKs1EYQjqtyYPRV1IaTQ4Mpvp4QpHh7zYu8aeuwIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEAnYchNo7PhQkzzSNOsbuVPbRP71gMM1ZcL13GrUW1c+opdr8Xtk233h4p2AS36rk2rwiEEtOITz9ulZWFOkc2nJG+F9bBosJyhXLdYu5c9iGosf5YyvrCGxKBBZ7o0xAXyf+m+CPsERI0mT9cMYZTp9FyO4kigFlupPU7UXXeLW9UGzs6rMXkgsLhq8caRRkWG3Aazm0j66FVX04js755EDFqjftpTmgI4xoSDJV/XOTl6Ei4ZxbBxVEm5MErT3gn+xK9jM9v4UEGvW7ug8IReig+Kdkja8bewgRQgLqrBFJxIM2bKQxe7/bo4P+o9hgMdGT72BMprxOK4pZXMHkE5QIDAQABAoIBABw+yYbFzpHVF5O1u/uEXfslZJvO1skxt+/KScBx2lpBZ1PiabcHcmuCTxBrsCqHMTXrOftCMJO9FO//Ulcjw7gJLeOKX0f2w6AH+4gso0CCwoO/zl3+3mUKSVYfqzGFFi7jByZBEqfw8rtzr+01X7ScinYAXc5TutIbIpq1nrPYlVm54MghKXHeH0YLQfQkcVUNi6sZx5cVI4WY0U9Bbo3va1V2gW6KIi3qatnKcBp2xnSf7+XXpLcYq+duUMYbVAs0xHAUj0TgCBFkvZRAFy7LdIKatI1UiYm0VlaXoAsHOTZ7VQBP2fwilRYmAQ+YIHFTMcxEKye4RKv/C7KZXDUCgYEAzqDxoxEBef5IBewFxFAXHMTy+HWOFZkrmSt7Jb45K53S9UDpAMa4FvFQp/WxcSU810SlstZRenjDw3GQ0Pi1moZaB/sFiUpwWs1u1Xxdo2Kc1qVmLLC/4GyGCJDCRMuM7t6yhd/546yzPjz/jtBGtHrmKQYPL12NiKmn4sm7oGcCgYEAwyrJorgGLHNHZfOuE9n8NlkP6IlVgoGsuuasvSrxsF29IbD7sD8bnVQ4zuLGH+5Z78K3SuQyY6tVAgYEfpSg01Tw1g4H315iasSm0maflva+YCF+xJ+Y+u4f1yfwED4PP0C4sJnmL3MuB2MIz82Po10r4kcoAGu42OPHUCLrsNMCgYBlsgKbTiBa6VKLT5mbAAwQBcLLlBfk+2jgzuyiK9g5ZkjQmizTS/qImCYpNBwr4rbqAAhJV3/sdglrZLZwkyfWMK+Y4+vaoT9hAWC+Q6JWao9keS0ra6ZUDzV8e7qRX1kyq3pTt2NmsbXaOO1SXaGe7CnhIPFST4n8K/vL+5uTmwKBgQDCGFaJnkx9fnQ+X3b7RSpAfpiEobhJ318CTZDzXLcauE71J8dXg5uZ/v20OvHhJbGJ8fNJ5uJ6HxWeuo9Tt8quAea2ayPHMF3eYw6pZuhGQcQZZJZnQ3Xn8FP4LT7hWGbfeCV1dMjo3bqkHAjSaVP1mx6enjeZG4itIvLArsoJgwKBgQDIpN2+6FfcDu1vu/6NZijFBE7aTaxiwzJ0B6g7bNnmPbqitPx1WBuo3Rl/GwhVNInrvPLnsMujpc0LLIplL9qxHFsDKODlGhDNekaj6zKFiVQusvzNYjxOR9DO19p+o2RwWyPrk1IQh+4xSzT1g+hyKa/KkFWVYowM0j7rBO+4IQ==',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => 'wx*******', //公众号 app id
        'mch_id'      => '14*****',  //第一步获取的商户号
        'key'         => '******', //刚刚设置的 API 秘钥
        'cert_client' => resource_path('wechat_pay/apiclient_cert.pem'),
        'cert_key'    => resource_path('wechat_pay/apiclient_key.pem'),
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];