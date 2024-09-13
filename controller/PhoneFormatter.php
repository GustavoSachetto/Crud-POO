<?php
class PhoneFormatter
{

    public static function format($phone)
    {    
        $number = preg_replace('/\D/', '', $phone);

        if (strlen($phone) < 10 || strlen($phone) > 11) {
            return "Número inválido";
        }
    
        if (strlen($phone) == 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $phone);
        } else {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $phone);
        }
    }
}