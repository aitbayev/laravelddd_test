<?php
/**
 * Created by PhpStorm.
 * User: Mika
 * Date: 11/3/22
 * Time: 11:50 AM
 */
namespace App\Domain\City\Aggregate;

//use App\Domain\User\ValueObject\Id;
use App\Domain\City\ValueObject\Name;

 class City
{
    private function __construct( private int $id, private Name $name) {

    }

    public static function create(int $id, Name $name ): self {
        return new self(
            $id,
            $name);
    }

    public function id(): int {
        return $this->id;
    }

    public function name(): Name {
        return $this->name;
    }

    public function updateName(string $name): void {
        $this->name = Name::fromString($name);
    }

    public function asArray(): array {
        return [
            'id' => $this->id()->value(),
            'name' => $this->name()->value()
        ];
    }


}