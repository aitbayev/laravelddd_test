<?php
/**
 * Created by PhpStorm.
 * User: Mika
 * Date: 11/3/22
 * Time: 12:20 PM
 */
namespace App\Domain\City;

use App\Domain\City\Aggregate\City;

interface CityRepository
{
    public function create(array $data): array;

    public function update(City $city): void;

    public function getAll(): array;

    public function findById(int $cityId): City;

    public function delete(int cityId): void;

}