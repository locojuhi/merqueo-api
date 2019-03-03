<?php

namespace App\Http\Controllers\Api;

use App\Services\Transporters\TransporterService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransporterController extends Controller
{
    /**
     * @var TransporterService
     */
    private $transporterService;

    /**
     * TransporterController constructor.
     * @param TransporterService $transporterService
     */
    public function __construct(TransporterService $transporterService)
    {
        $this->transporterService = $transporterService;
    }

    /**
     * Display a listing of the resource.
     * @SWG\Get(
     *      path="/api/transporters",
     *      tags={"Transporters"},
     *      @SWG\Parameter(
     *          name="Content-Type",
     *          type="string",
     *          default="application/json",
     *          in="header",
     *          description="Application content type",
     *          required=false
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Ok"
     *      )
     * )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transporters = $this->transporterService->getAllTransporters();
        return response(compact('transporters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transporter = $this->transporterService->getTransporterInfo($id);
        return response(compact('transporter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $transporterId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function orders($transporterId)
    {
        $transporter = $this->transporterService->getTransporterOrders($transporterId);
        return response(compact('transporter'));
    }

    /**
     * @param $transporterId
     * @param $orderId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function viewOrder($transporterId, $orderId)
    {
        $order = $this->transporterService->getTransporterOrdersInfo($transporterId, $orderId);
        return response(compact('order'));
    }


}
