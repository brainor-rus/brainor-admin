<?php

namespace Bradmin\Plugins\BrainorPay\Helpers;


use Illuminate\Support\Facades\Auth;


class Payment
{
//    public static function alfaBankGateway($method, $data) {
//        $curl = curl_init(); // Инициализируем запрос
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => 'https://pay.alfabank.ru/payment/rest/'.$method, // Полный адрес метода
//            CURLOPT_RETURNTRANSFER => true, // Возвращать ответ
//            CURLOPT_POST => true, // Метод POST
//            CURLOPT_POSTFIELDS => http_build_query($data) // Данные в запросе
//        ));
//        $response = curl_exec($curl); // Выполненяем запрос
//
//        $response = json_decode($response, true); // Декодируем из JSON в массив
//        curl_close($curl); // Закрываем соединение
//        return $response; // Возвращаем ответ
//    }
//
//    public static function sberBankGateway($method, $data) {
//        $curl = curl_init(); // Инициализируем запрос
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => 'https://3dsec.sberbank.ru/payment/rest/'.$method, // Полный адрес метода
//            CURLOPT_RETURNTRANSFER => true, // Возвращать ответ
//            CURLOPT_POST => true, // Метод POST
//            CURLOPT_POSTFIELDS => http_build_query($data) // Данные в запросе
//        ));
//        $response = curl_exec($curl); // Выполненяем запрос
//
//        $response = json_decode($response, true); // Декодируем из JSON в массив
//        curl_close($curl); // Закрываем соединение
//        return $response; // Возвращаем ответ
//    }
//
//    public static function alfaBank($args){
//
//        if($args['type'] == 'process'){//запрос на платеж
//            $data = array(
//                'userName' => $args['userName'],
//                'password' => $args['password'],
//                'orderNumber' => $args['orderNumber'],
//                'amount' => $args['amount'],
//                'returnUrl' => $args['returnUrl'],
//                'failUrl' => $args['failUrl'],
//                'jsonParams' => $args['jsonParams']
//            );
//            $response = self::alfaBankGateway($args['method'], $data);
//            return $response;
//        }
//        elseif($args['type'] == 'afterProcess'){//запрос на платеж
//            if (isset($args['response']['errorCode'])) { // В случае ошибки вывести ее
//                $status = $args['payStatuses']->where('slug','pay_error')->first();
//                $payStatisticUpdate = Pay_statistic::where('id',$args['payStatistic']->id)->update([
//                    'status_id'=>$status->id
//                ]);
//                return view('v4.pay.error')->with(compact('response'));
//            } else { // В случае успеха перенаправить пользователя на плетжную форму
//                $status = $args['payStatuses']->where('slug','pay_registered')->first();
//                $payStatisticUpdate = Pay_statistic::where('id',$args['payStatistic']->id)->update([
//                    'status_id'=>$status->id
//                ]);
//                header('Location: ' . $args['response']['formUrl']);
//                die();
//            }
//        }
//        elseif($args['type'] == 'status_check'){//запрос на платеж
//            $data = array(
//                'userName' => $args['userName'],
//                'password' => $args['password'],
//                'orderId' => $args['orderId']
//            );
//            $response = self::alfaBankGateway($args['method'], $data);
//            $htmlResponse = '';
//            if (isset($response['errorCode'])) { // В случае ошибки вывести ее
//                $htmlResponse = '
//                        Ошибка обращения к банку<br><span class="status-check-btn" data-pay-uid="' . $args['payStatistic']->transaction_id . '">Обновить</span>
//                    ';
//            } else { // В случае успеха...
//                $responseAnalise = Pay_bank_response::with('ourResponse')->where('code', $response['OrderStatus'])->first();
//                if (isset($responseAnalise)) {
//                    if (count($responseAnalise->ourResponse) > 0) {
//                        $payStatisticUpdate = Pay_statistic::where('id', $args['payStatistic']->id)->update([
//                            'status_id' => $responseAnalise->ourResponse->id
//                        ]);
//                        $htmlResponse = '
//                                ' . $responseAnalise->ourResponse->name . '<br><span class="status-check-btn" data-pay-uid="' . $args['payStatistic']->transaction_id . '">Обновить</span>
//                            ';
//                    } else {
//                        $htmlResponse = '
//                                Код статуса банка:' . $response['OrderStatus'] . '<br>Ассоциация статуса не выполнена<br><span class="status-check-btn" data-pay-uid="' . $args['payStatistic']->transaction_id . '">Обновить</span>
//                            ';
//                    }
//                } else {
//                    $htmlResponse = '
//                            Код статуса  банка:' . $response['OrderStatus'] . '<br>Ответ не сохранен в системе<br><span class="status-check-btn" data-pay-uid="' . $args['payStatistic']->transaction_id . '">Обновить</span>
//                        ';
//                }
//            }
//
//            return $htmlResponse;
//        }
//        else{
//            return false;
//        }
//    }
//
//    public static function sberBank($args){
//
//        if($args['type'] == 'process'){//запрос на платеж
//            $data = array(
//                'userName' => $args['userName'],
//                'password' => $args['password'],
//                'orderNumber' => $args['orderNumber'],
//                'amount' => $args['amount'],
//                'returnUrl' => $args['returnUrl'],
//                'failUrl' => $args['failUrl']
//            );
//            $response = self::sberBankGateway($args['method'], $data);
//            return $response;
//        }
//        elseif($args['type'] == 'afterProcess'){//запрос на платеж
//            if (isset($args['response']['errorCode'])) { // В случае ошибки вывести ее
//                $status = $args['payStatuses']->where('slug','pay_error')->first();
//                $payStatisticUpdate = Pay_statistic::where('id',$args['payStatistic']->id)->update([
//                    'status_id'=>$status->id
//                ]);
//                return view('v4.pay.error')->with(compact('response'));
//            } else { // В случае успеха перенаправить пользователя на плетжную форму
//                $status = $args['payStatuses']->where('slug','pay_registered')->first();
//                $payStatisticUpdate = Pay_statistic::where('id',$args['payStatistic']->id)->update([
//                    'status_id'=>$status->id
//                ]);
//                header('Location: ' . $args['response']['formUrl']);
//                die();
//            }
//        }
//        elseif($args['type'] == 'status_check'){//запрос на платеж
//            $data = array(
//                'userName' => $args['userName'],
//                'password' => $args['password'],
//                'orderId' => $args['orderId']
//            );
//            $response = self::sberBankGateway($args['method'], $data);
//            $htmlResponse = '';
//            if (isset($response['errorCode'])) { // В случае ошибки вывести ее
//                $htmlResponse = '
//                        Ошибка обращения к банку<br><span class="status-check-btn" data-pay-uid="' . $args['payStatistic']->transaction_id . '">Обновить</span>
//                    ';
//            } else { // В случае успеха...
//                $responseAnalise = Pay_bank_response::with('ourResponse')->where('code', $response['OrderStatus'])->first();
//                if (isset($responseAnalise)) {
//                    if (count($responseAnalise->ourResponse) > 0) {
//                        $payStatisticUpdate = Pay_statistic::where('id', $args['payStatistic']->id)->update([
//                            'status_id' => $responseAnalise->ourResponse->id
//                        ]);
//                        $htmlResponse = '
//                                ' . $responseAnalise->ourResponse->name . '<br><span class="status-check-btn" data-pay-uid="' . $args['payStatistic']->transaction_id . '">Обновить</span>
//                            ';
//                    } else {
//                        $htmlResponse = '
//                                Код статуса банка:' . $response['OrderStatus'] . '<br>Ассоциация статуса не выполнена<br><span class="status-check-btn" data-pay-uid="' . $args['payStatistic']->transaction_id . '">Обновить</span>
//                            ';
//                    }
//                } else {
//                    $htmlResponse = '
//                            Код статуса  банка:' . $response['OrderStatus'] . '<br>Ответ не сохранен в системе<br><span class="status-check-btn" data-pay-uid="' . $args['payStatistic']->transaction_id . '">Обновить</span>
//                        ';
//                }
//            }
//
//            return $htmlResponse;
//        }
//        else{
//            return false;
//        }
//    }
}


