<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateventasAPIRequest;
use App\Http\Requests\API\UpdateventasAPIRequest;
use App\Models\ventas;
use App\Repositories\ventasRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Controller\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ventasController
 * @package App\Http\Controllers\API
 */

class ventasAPIController extends AppBaseController
{
    /** @var  ventasRepository */
    private $ventasRepository;

    public function __construct(ventasRepository $ventasRepo)
    {
        $this->ventasRepository = $ventasRepo;
    }

    /**
     * Display a listing of the ventas.
     * GET|HEAD /ventas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ventasRepository->pushCriteria(new RequestCriteria($request));
        $this->ventasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ventas = $this->ventasRepository->all();

        return $this->sendResponse($ventas->toArray(), 'Ventas retrieved successfully');
    }

    /**
     * Store a newly created ventas in storage.
     * POST /ventas
     *
     * @param CreateventasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateventasAPIRequest $request)
    {
        $input = $request->all();

        $ventas = $this->ventasRepository->create($input);

        return $this->sendResponse($ventas->toArray(), 'Ventas saved successfully');
    }

    /**
     * Display the specified ventas.
     * GET|HEAD /ventas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ventas $ventas */
        $ventas = $this->ventasRepository->findWithoutFail($id);

        if (empty($ventas)) {
            return $this->sendError('Ventas not found');
        }

        return $this->sendResponse($ventas->toArray(), 'Ventas retrieved successfully');
    }

    /**
     * Update the specified ventas in storage.
     * PUT/PATCH /ventas/{id}
     *
     * @param  int $id
     * @param UpdateventasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateventasAPIRequest $request)
    {
        $input = $request->all();

        /** @var ventas $ventas */
        $ventas = $this->ventasRepository->findWithoutFail($id);

        if (empty($ventas)) {
            return $this->sendError('Ventas not found');
        }

        $ventas = $this->ventasRepository->update($input, $id);

        return $this->sendResponse($ventas->toArray(), 'ventas updated successfully');
    }

    /**
     * Remove the specified ventas from storage.
     * DELETE /ventas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ventas $ventas */
        $ventas = $this->ventasRepository->findWithoutFail($id);

        if (empty($ventas)) {
            return $this->sendError('Ventas not found');
        }

        $ventas->delete();

        return $this->sendResponse($id, 'Ventas deleted successfully');
    }
}
