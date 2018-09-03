<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateofertasRequest;
use App\Http\Requests\UpdateofertasRequest;
use App\Repositories\ofertasRepository;
use InfyOm\Generator\Controller\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ofertasController extends AppBaseController
{
    /** @var  ofertasRepository */
    private $ofertasRepository;

    public function __construct(ofertasRepository $ofertasRepo)
    {
        $this->ofertasRepository = $ofertasRepo;
    }

    /**
     * Display a listing of the ofertas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ofertasRepository->pushCriteria(new RequestCriteria($request));
        $ofertas = $this->ofertasRepository->all();

        return view('ofertas.index')
            ->with('ofertas', $ofertas);
    }

    /**
     * Show the form for creating a new ofertas.
     *
     * @return Response
     */
    public function create()
    {
        return view('ofertas.create');
    }

    /**
     * Store a newly created ofertas in storage.
     *
     * @param CreateofertasRequest $request
     *
     * @return Response
     */
    public function store(CreateofertasRequest $request)
    {
        $input = $request->all();

        $ofertas = $this->ofertasRepository->create($input);

        Flash::success('Ofertas saved successfully.');

        return redirect(route('ofertas.index'));
    }

    /**
     * Display the specified ofertas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ofertas = $this->ofertasRepository->findWithoutFail($id);

        if (empty($ofertas)) {
            Flash::error('Ofertas not found');

            return redirect(route('ofertas.index'));
        }

        return view('ofertas.show')->with('ofertas', $ofertas);
    }

    /**
     * Show the form for editing the specified ofertas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ofertas = $this->ofertasRepository->findWithoutFail($id);

        if (empty($ofertas)) {
            Flash::error('Ofertas not found');

            return redirect(route('ofertas.index'));
        }

        return view('ofertas.edit')->with('ofertas', $ofertas);
    }

    /**
     * Update the specified ofertas in storage.
     *
     * @param  int              $id
     * @param UpdateofertasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateofertasRequest $request)
    {
        $ofertas = $this->ofertasRepository->findWithoutFail($id);

        if (empty($ofertas)) {
            Flash::error('Ofertas not found');

            return redirect(route('ofertas.index'));
        }

        $ofertas = $this->ofertasRepository->update($request->all(), $id);

        Flash::success('Ofertas updated successfully.');

        return redirect(route('ofertas.index'));
    }

    /**
     * Remove the specified ofertas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ofertas = $this->ofertasRepository->findWithoutFail($id);

        if (empty($ofertas)) {
            Flash::error('Ofertas not found');

            return redirect(route('ofertas.index'));
        }

        $this->ofertasRepository->delete($id);

        Flash::success('Ofertas deleted successfully.');

        return redirect(route('ofertas.index'));
    }
}
