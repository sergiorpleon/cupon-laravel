<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateventasRequest;
use App\Http\Requests\UpdateventasRequest;
use App\Repositories\ventasRepository;
use InfyOm\Generator\Controller\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ventasController extends AppBaseController
{
    /** @var  ventasRepository */
    private $ventasRepository;

    public function __construct(ventasRepository $ventasRepo)
    {
        $this->ventasRepository = $ventasRepo;
    }

    /**
     * Display a listing of the ventas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ventasRepository->pushCriteria(new RequestCriteria($request));
        $ventas = $this->ventasRepository->paginate(20);

        return view('ventas.index')
            ->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new ventas.
     *
     * @return Response
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created ventas in storage.
     *
     * @param CreateventasRequest $request
     *
     * @return Response
     */
    public function store(CreateventasRequest $request)
    {
        $input = $request->all();

        $ventas = $this->ventasRepository->create($input);

        Flash::success('Ventas saved successfully.');

        return redirect(route('ventas.index'));
    }

    /**
     * Display the specified ventas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ventas = $this->ventasRepository->findWithoutFail($id);

        if (empty($ventas)) {
            Flash::error('Ventas not found');

            return redirect(route('ventas.index'));
        }

        return view('ventas.show')->with('ventas', $ventas);
    }

    /**
     * Show the form for editing the specified ventas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ventas = $this->ventasRepository->findWithoutFail($id);

        if (empty($ventas)) {
            Flash::error('Ventas not found');

            return redirect(route('ventas.index'));
        }

        return view('ventas.edit')->with('ventas', $ventas);
    }

    /**
     * Update the specified ventas in storage.
     *
     * @param  int              $id
     * @param UpdateventasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateventasRequest $request)
    {
        $ventas = $this->ventasRepository->findWithoutFail($id);

        if (empty($ventas)) {
            Flash::error('Ventas not found');

            return redirect(route('ventas.index'));
        }

        $ventas = $this->ventasRepository->update($request->all(), $id);

        Flash::success('Ventas updated successfully.');

        return redirect(route('ventas.index'));
    }

    /**
     * Remove the specified ventas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ventas = $this->ventasRepository->findWithoutFail($id);

        if (empty($ventas)) {
            Flash::error('Ventas not found');

            return redirect(route('ventas.index'));
        }

        $this->ventasRepository->delete($id);

        Flash::success('Ventas deleted successfully.');

        return redirect(route('ventas.index'));
    }
}
