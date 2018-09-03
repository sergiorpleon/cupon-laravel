<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateciudadesAPIRequest;
use App\Http\Requests\API\UpdateciudadesAPIRequest;
use App\Models\ciudades;
use App\Repositories\ciudadesRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Controller\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ciudadesController
 * @package App\Http\Controllers\API
 */

class ciudadesAPIController extends AppBaseController
{
    /** @var  ciudadesRepository */
    private $ciudadesRepository;

    public function __construct(ciudadesRepository $ciudadesRepo)
    {
        $this->ciudadesRepository = $ciudadesRepo;
    }

    /**
     * Display a listing of the ciudades.
     * GET|HEAD /ciudades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ciudadesRepository->pushCriteria(new RequestCriteria($request));
        $this->ciudadesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ciudades = $this->ciudadesRepository->all();

        return $this->sendResponse($ciudades->toArray(), 'Ciudades retrieved successfully');
    }

    /**
     * Store a newly created ciudades in storage.
     * POST /ciudades
     *
     * @param CreateciudadesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateciudadesAPIRequest $request)
    {
        $input = $request->all();

        $ciudades = $this->ciudadesRepository->create($input);

        return $this->sendResponse($ciudades->toArray(), 'Ciudades saved successfully');
    }

    /**
     * Display the specified ciudades.
     * GET|HEAD /ciudades/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ciudades $ciudades */
        $ciudades = $this->ciudadesRepository->findWithoutFail($id);

        if (empty($ciudades)) {
            return $this->sendError('Ciudades not found');
        }

        return $this->sendResponse($ciudades->toArray(), 'Ciudades retrieved successfully');
    }

    /**
     * Update the specified ciudades in storage.
     * PUT/PATCH /ciudades/{id}
     *
     * @param  int $id
     * @param UpdateciudadesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateciudadesAPIRequest $request)
    {
        $input = $request->all();

        /** @var ciudades $ciudades */
        $ciudades = $this->ciudadesRepository->findWithoutFail($id);

        if (empty($ciudades)) {
            return $this->sendError('Ciudades not found');
        }

        $ciudades = $this->ciudadesRepository->update($input, $id);

        return $this->sendResponse($ciudades->toArray(), 'ciudades updated successfully');
    }

    /**
     * Remove the specified ciudades from storage.
     * DELETE /ciudades/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ciudades $ciudades */
        $ciudades = $this->ciudadesRepository->findWithoutFail($id);

        if (empty($ciudades)) {
            return $this->sendError('Ciudades not found');
        }

        $ciudades->delete();

        return $this->sendResponse($id, 'Ciudades deleted successfully');
    }
}
