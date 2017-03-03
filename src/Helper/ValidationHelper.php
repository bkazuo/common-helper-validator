<?php

namespace Helper;

/**
 * Validation Helper
 *
 * Helper methods to validate user input.
 *
 */
class ValidationHelper {

    /**
     * Validate E-Mail Address
     *
     * @param string $email
     *
     * @return boolean
     */
    public function isEmail($email) {
        return ($email && is_string($email) && preg_match('/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,}$/', $email) == 1);
    }

    /**
     * Validate GUID
     *
     * @param string $guid
     *
     * @return boolean
     */
    public function isGuid($guid) {
        return ($guid && is_string($guid) && preg_match('/^[0-9a-f]{8}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{12}$/', $guid) == 1);
    }

    /**
     * Validate CPF
     *
     * @param string $cpf
     *
     * @return boolean
     */
    public function isCpf($cpf) {
        $blacklist = array(
            '00000000000',
            '11111111111',
            '22222222222',
            '33333333333',
            '44444444444',
            '55555555555',
            '66666666666',
            '77777777777',
            '88888888888',
            '99999999999'
        );

        if (!$cpf || !is_scalar($cpf) || strlen($cpf) != 11 || in_array((string) $cpf, $blacklist)) {
            return false;
        }

        $cpf = (string) $cpf;
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validate String Not Blank
     *
     * @param string $value
     *
     * @return boolean
     */
    public function isNotBlank($value) {
        $result = ($value && is_string($value) && strlen(trim($value)) > 0);

        return $result;
    }

    /**
     * Validate Positive Integer
     *
     * @param mixed $number
     *
     * @return boolean
     */
    public function isPositiveInteger($number) {
        return is_scalar($number) && preg_match('/^\d+$/', $number) && $number > 0;
    }

    public function isInteger($number) {
        return is_scalar($number) && preg_match('/^\d+$/', $number) && $number >= 0;
    }

    /**
     * Validate Float Integer
     *
     * @param mixed $number
     *
     * @return boolean
     */
    public function isPositiveFloat($number) {
        return is_scalar($number) && (preg_match('/^\d+(\.\d+)?$/', $number) && $number > 0);
    }

    public function isFloat($number) {
        return is_float(floatval ($number));
    }

    public function isDate($date) {
        $isFormatValid = $date && is_scalar($date) && preg_match('/^\d{4}\-\d{2}-\d{2}?$/', $date);

        if (!$isFormatValid) {
            return false;
        }

        $dateParts = explode('-', $date);
        $isDateValid = checkdate($dateParts[1], $dateParts[2], $dateParts[0]);

        return $isDateValid;
    }

    public function isDateTime($date) {
        $isFormatValid = $date && is_scalar($date) && preg_match('/^\d{4}\-\d{2}-\d{2}( \d{1,2}:\d{2}:\d{2})?$/', $date);

        if (!$isFormatValid) {
            return false;
        }

        $dateTimeParts = explode(' ', $date);
        $dateParts = explode('-', $dateTimeParts[0]);
        $hourParts = isset($dateTimeParts[1]) ? explode(':', $dateTimeParts[1]) : array(0, 0, 0);
        $isDateValid = checkdate($dateParts[1], $dateParts[2], $dateParts[0]);
        $isHourValid =
            ($hourParts[0] >= 0 && $hourParts[0] <= 23) &&
            ($hourParts[1] >= 0 && $hourParts[1] <= 59) &&
            ($hourParts[2] >= 0 && $hourParts[2] <= 59);

        return $isDateValid && $isHourValid;
    }


    public function isTime($date) {
        $isFormatValid = $date && is_scalar($date) && preg_match('/^(\d{1,2}:\d{2})?$/', $date);

        if (!$isFormatValid) {
            return false;
        }

        $timeParts = explode(':', $date);
        $isHourValid =
            ($timeParts[0] >= 0 && $timeParts[0] <= 23) &&
            ($timeParts[1] >= 0 && $timeParts[1] <= 59);

        return $isHourValid;
    }

    public function isHashId($value) {
        return $value && preg_match('/^[a-f0-9]{32}$/', $value);
    }

    /**
     * Validate CEP
     *
     * @param string $value
     *
     * @return boolean
     */
    public function isCep($value) {
        if (preg_match('/^[0-9]{8}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Validate PHONE
     *
     * @param string $value
     *
     * @return boolean
     */
    public function isPhone($value) {
        if (preg_match('/^[0-9]{10,11}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Validate State
     *
     * @param string $value
     *
     * @return boolean
     */
    public function isState($value) {
        $state = array(
        "AC"=>"Acre",
        "AL"=>"Alagoas",
        "AM"=>"Amazonas",
        "AP"=>"Amapá",
        "BA"=>"Bahia",
        "CE"=>"Ceará",
        "DF"=>"Distrito Federal",
        "ES"=>"Espírito Santo",
        "GO"=>"Goiás",
        "MA"=>"Maranhão",
        "MT"=>"Mato Grosso",
        "MS"=>"Mato Grosso do Sul",
        "MG"=>"Minas Gerais",
        "PA"=>"Pará",
        "PB"=>"Paraíba",
        "PR"=>"Paraná",
        "PE"=>"Pernambuco",
        "PI"=>"Piauí",
        "RJ"=>"Rio de Janeiro",
        "RN"=>"Rio Grande do Norte",
        "RO"=>"Rondônia",
        "RS"=>"Rio Grande do Sul",
        "RR"=>"Roraima",
        "SC"=>"Santa Catarina",
        "SE"=>"Sergipe",
        "SP"=>"São Paulo",
        "TO"=>"Tocantins");

        if (isset($state[$value])) {
            return true;
        } else {
            return false;
        }
    }

    public function multiplica_cnpj( $cnpj, $posicao = 5 ) {
        $calculo = 0;
        for ( $i = 0; $i < strlen( $cnpj ); $i++ ) {
            $calculo = $calculo + ( $cnpj[$i] * $posicao );
            $posicao--;
            if ( $posicao < 2 ) {
                $posicao = 9;
            }
        }
        return $calculo;
    }

    /**
     * Validate Cnpj
     *
     * @param string $value
     *
     * @return boolean
     */
    public function isCnpj($cnpj) {
        $cnpj = preg_replace( '/[^0-9]/', '', $cnpj );
        $cnpj = (string)$cnpj;
        $cnpj_original = $cnpj;
        $primeiros_numeros_cnpj = substr( $cnpj, 0, 12 );

        $primeiro_calculo = $this->multiplica_cnpj( $primeiros_numeros_cnpj );
        $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 :  11 - ( $primeiro_calculo % 11 );
        $primeiros_numeros_cnpj .= $primeiro_digito;
        $segundo_calculo = $this->multiplica_cnpj( $primeiros_numeros_cnpj, 6 );
        $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 :  11 - ( $segundo_calculo % 11 );
        $cnpj = $primeiros_numeros_cnpj . $segundo_digito;

        if ( $cnpj === $cnpj_original ) {
            return true;
        }
    }

    /**
     * Validate Renavam
     *
     * @param string $value
     *
     * @return boolean
     */
    public function isRenavam($renavam) {
        if(preg_match('/^([0-9]{9})$/',$renavam)){
            $renavam = "00".$renavam;
        }

        if(!preg_match('/^([0-9]{11})$/',$renavam)){
            return false;
        }

        $renavamSemDigito = preg_replace( '/^([0-9]{10})([0-9]{1})$/', '$1', $renavam );
        $renavamReversoSemDigito = strrev($renavamSemDigito);

        $soma = 0;

        for ($i=0; $i < 8; $i++) {
            $algarismo = intval(substr($renavamReversoSemDigito, $i, 1));
            $multiplicador = $i + 2;

            $soma += $algarismo * $multiplicador;
        }

        $soma += intval(substr($renavamReversoSemDigito, 8, 1))*2;
        $soma += intval(substr($renavamReversoSemDigito, 9, 1))*3;
        $mod11 = $soma % 11;

        $ultimoDigitoCalculado = 11 - $mod11;

        if ($ultimoDigitoCalculado >= 10) {
            $ultimoDigitoCalculado = 0;
        }

        $digitoRealInformado = preg_replace( '/^([0-9]{10})([0-9]{1})$/', '$2', $renavam );

        if($ultimoDigitoCalculado == $digitoRealInformado){
            return true;
        } else {
            return false;
        }
    }
}
