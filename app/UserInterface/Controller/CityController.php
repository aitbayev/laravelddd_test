<?php

namespace App\UserInterface\Controller;

use App\Domain\City\Aggregate\City;
use App\Domain\City\CityRepository;
use App\Domain\City\ValueObject\Name;
use App\Infrastructure\Laravel\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CityController extends Controller {


    public function index(CityRepository $cityRepository): JsonResponse {
       $cities =  $cityRepository->getAll();

        return response()->json([
            'cities' => $cities]);
    }


    public function store(Request $request, CityRepository $cityRepository ): JsonResponse {

        $city = $cityRepository->create($request->all());

        return response()->json([
            'city' => $city]);
    }

    public function show(CityRepository $cityRepository, int $id): JsonResponse
    {
        $city = $cityRepository->findById($id);

        return response()->json([
            'city' => $city->asArray()
        ]);
    }

    public function update(Request $request, UserRepository $userRepository, int $id): JsonResponse
    {
        $city = $cityRepository->findById($id);
        $city->updateName($request->input('name')); //в будущем когда инпутов станет больше лучше использовать DTO
        $cityRepository->update($city);

        return response()->json([
            'city' => $city->asArray()
        ]);
    }

    public function destroy(CityRepository $cityRepository, string $id): JsonResponse
    {
        $user = $cityRepository->findById($id);
        $cityRepository->delete($city);
        return response()->json([], JsonResponse::HTTP_NO_CONTENT);
    }
}