<?php
/**
 * Created by PhpStorm.
 * User: Mika
 * Date: 11/3/22
 * Time: 11:31 AM
 */

namespace App\Domain\Shared\ValueObject;

class StringValueObject {

protected string $value;

    public function __construct(string $value) {
        $this->value = $value;
    }

    public function __toString() {
        return $this->value();
    }

    public function value(): string {
        return $this->value;
    }

    public function empty(): bool {
        return empty($this->value());
    }
}