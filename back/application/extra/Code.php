<?php
declare(strict_types=1);

return [
    'base'=>[
        '20000'=>'success',//成功
        '50000'=>'error',//失败
        '59000'=>'框架配置错误,源:request->secretMode',//加密方式填写有误
    ],
    'aliSMS'=>[
        'isv.MOBILE_NUMBER_ILLEGAL' =>                              '无效号码',
        'isv.SMS_TEMPLATE_ILLEGAL' =>                               '服务器内部错误',
        'isv.SMS_SIGNATURE_ILLEGAL' =>                              '服务器内部错误',
        'isv.TEMPLATE_MISSING_PARAMETERS' =>                        '服务器内部错误',
        'isv.EXTEND_CODE_ERROR' =>                                  '服务器内部错误',
        'isv.DOMESTIC_NUMBER_NOT_SUPPORTED' =>                      '国际/港澳台消息模板不支持发送境内号码',
        'isv.DAY_LIMIT_CONTROL' =>                                  '已超过当日获取验证码次数',
        'isv.SMS_CONTENT_ILLEGAL' =>                                '服务器内部错误',
        'isv.SMS_SIGN_ILLEGAL' =>                                   '服务器内部错误',
        'isp.RAM_PERMISSION_DENY' =>                                '服务器内部错误',
        'isp.OUT_OF_SERVICE' =>                                     '服务器内部错误',
        'isv.PRODUCT_UN_SUBSCRIPT' =>                               '服务器内部错误',
        'isv.PRODUCT_UNSUBSCRIBE' =>                                '服务器内部错误',
        'isv.ACCOUNT_NOT_EXISTS' =>                                 '服务器内部错误',
        'isv.BUSINESS_LIMIT_CONTROL' =>                             '请勿连续发送验证码',
        'isv.BLACK_KEY_CONTROL_LIMIT' =>                            '该手机已被拉黑',
        'VALVE:M_MC' =>                                             '服务器内部错误，稍后再试',
        'VALVE:H_MC' =>                                             '服务器内部错误，稍后再试',
        'VALVE:D_MC' =>                                             '服务器内部错误，稍后再试',
        'isv.ACCOUNT_ABNORMAL' =>                                   '服务器内部错误，稍后再试',
        'isv.AMOUNT_NOT_ENOUGH' =>                                  '服务器内部错误，稍后再试',
        'isp.SYSTEM_ERROR' =>                                       '服务器内部错误，稍后再试',
        'isv.TEMPLATE_PARAMS_ILLEGAL' =>                            '服务器内部错误，稍后再试',
        'isv.MOBILE_COUNT_OVER_LIMIT' =>                            '服务器内部错误，稍后再试',
        'isv.PARAM_LENGTH_LIMIT' =>                                 '服务器内部错误，稍后再试',
        'isv.INVALID_PARAMETERS' =>                                 '服务器内部错误，稍后再试',
        'FILTER' =>                                                 '服务器内部错误，稍后再试',
        'isv.OUT_OF_SERVICE' =>                                     '服务器内部错误，稍后再试',
        'isv.PARAM_NOT_SUPPORT_URL' =>                              '服务器内部错误，稍后再试',
        'MissingParameter.To' =>                                    '服务器内部错误，稍后再试',
        'MissingParameter.Message' =>                               '服务器内部错误，稍后再试',
        'Forbidden.Operation' =>                                    '服务器内部错误，稍后再试',
        'Account.Abnormal' =>                                       '服务器内部错误，稍后再试',
        'InvalidParameter.Type' =>                                  '服务器内部错误，稍后再试',
        'InvalidParameter.To' =>                                    '服务器内部错误，稍后再试',
        'InvalidParameter.SenderId' =>                              '服务器内部错误，稍后再试',
        'PhoneNumber.Illegal' =>                                    '手机号码无效',
        'InvalidParameter.From' =>                                  '服务器内部错误，稍后再试',
        'InvalidParameter.ExternalId' =>                            '服务器内部错误，稍后再试',
        'Unsupport.CountryCode' =>                                  '不支持的手机号码',
        'Unknown.CountryCode' =>                                    '不支持的手机号码',
        'InvalidParameter.Channel' =>                               '服务器内部错误，稍后再试',
        'MonthLimitControl' =>                                      '服务器内部错误，稍后再试',
        'DayLimitControl' =>                                        '服务器内部错误，稍后再试',
        'OutOfService' =>                                           '服务器内部错误，稍后再试',
        'Amount.NotEnough' =>                                       '服务器内部错误，稍后再试',
        'isv.INVALID_JSON_PARAM' =>                                 '服务器内部错误，稍后再试',
    ]
];