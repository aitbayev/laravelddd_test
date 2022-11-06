<?php
namespace App\Infrastructure\City;

use App\Domain\City\Aggregate\City;
use App\Domain\City\Exception\CityNotFoundException;
use App\Domain\City\CityRepository as CityRepositoryInterface;

use App\Domain\City\ValueObject\Name;
use App\Infrastructure\Laravel\Model\CityModel;

class CityRepository implements CityRepositoryInterface{

    public function create(array $data): array {
        $cityModel = new CityModel();
        $cityModel->name = $data['name'];
        $cityModel->save();
        return CityModel()->toArray();
    }

    public function update(City $city): void {
        $cityModel = CityModel::find($city->id());
        if (empty($userModel)) {
            throw new CityNotFoundException('City not found');
        }
        $cityModel->name = $city->name()->value();
        $cityModel->save();
    }


    public function getAll(): array {
        return CityModel::all()->toArray();
    }


    public function findById(int $cityId): City {
        $cityModel = CityModel::find($cityId);
        if (empty($userModel)) {
            throw new CityNotFoundException('City not found');
         }
        return CityModel;
    }

    public function delete(int $cityId): void {
        $cityModel = CityModel::find($cityId);
        if (empty($userModel)) {
            throw new CityNotFoundException('City not found');
        }
        $cityModel->delete();
    }

}