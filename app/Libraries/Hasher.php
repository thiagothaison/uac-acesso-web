<?php

namespace AcessoWeb\Libraries;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class Hasher implements HasherContract {

    public function make($value, array $options = array()) {
        return hash('sha512', base64_encode($value));
    }

    public function check($value, $hashedValue, array $options = array()) {
        return $this->make($value) === $hashedValue;
    }

    public function needsRehash($hashedValue, array $options = array()) {
        return false;
    }

}