<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateofertasAPIRequest;
use App\Http\Requests\API\UpdateofertasAPIRequest;
use App\Models\ofertas;
use App\Repositories\ofertasRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Controller\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ofertasController
 * @package App\Http\Controllers\API
 */

class ofertasAPIController extends AppBaseController
{
    /** @var  ofertasRepository */
    private $ofertasRepository;

    public function __construct(ofertasRepository $ofertasRepo)
    {
        $this->ofertasRepository = $ofertasRepo;
    }

    /**
     * Display a listing of the ofertas.
     * GET|HEAD /ofertas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ofertasRepository->pushCriteria(new RequestCriteria($request));
        $this->ofertasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ofertas = $this->ofertasRepository->all();

        return $this->sendResponse($ofertas->toArray(), 'Ofertas retrieved successfully');
    }

    /**
     * Store a newly created ofertas in storage.
     * POST /ofertas
     *
     * @param CreateofertasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateofertasAPIRequest $request)
    {
        $input = $request->all();

        $ofertas = $this->ofertasRepository->create($input);

        return $this->sendResponse($ofertas->toArray(), 'Ofertas saved successfully');
    }

    /**
     * Display the specified ofertas.
     * GET|HEAD /ofertas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ofertas $ofertas */
        $ofertas = $this->ofertasRepository->findWithoutFail($id);

        if (empty($ofertas)) {
            return $this->sendError('Ofertas not found');
        }

        return $this->sendResponse($ofertas->toArray(), 'Ofertas retrieved successfully');
    }

    /**
     * Update the specified ofertas in storage.
     * PUT/PATCH /ofertas/{id}
     *
     * @param  int $id
     * @param UpdateofertasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateofertasAPIRequest $request)
    {
        $input = $request->all();

        /** @var ofertas $ofertas */
        $ofertas = $this->ofertasRepository->findWithoutFail($id);

        if (empty($ofertas)) {
            return $this->sendError('Ofertas not found');
        }

        $ofertas = $this->ofertasRepository->update($input, $id);

        return $this->sendResponse($ofertas->toArray(), 'ofertas updated successfully');
    }

    /**
     * Remove the specified ofertas from storage.
     * DELETE /ofertas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ofertas $ofertas */
        $ofertas = $this->ofertasRepository->findWithoutFail($id);

        if (empty($ofertas)) {
            return $this->sendError('Ofertas not found');
        }

        $ofertas->delete();

        return $this->sendResponse($id, 'Ofertas deleted successfully');
    }
}
