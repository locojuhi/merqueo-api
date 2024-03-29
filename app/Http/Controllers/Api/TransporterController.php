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
     * @SWG\Get(
     *      path="/api/transporters/{transporterId}",
     *      tags={"Transporters"},
     *      @SWG\Parameter(
     *          name="Content-Type",
     *          type="string",
     *          default="application/json",
     *          in="header",
     *          description="Application content type",
     *          required=false
     *      ),
     *      @SWG\Parameter(
     *          type="string",
     *          name="transporterId",
     *          in="path",
     *          description="ID of transporter that needs to be fetched",
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Ok"
     *      )
     * )
     * return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transporter = $this->transporterService->getTransporterInfo($id);
        return response(compact('transporter'));
    }

    /**
     * @SWG\Get(
     *      path="/api/transporters/{transporterId}/orders",
     *      tags={"Transporters"},
     *      @SWG\Parameter(
     *          name="Content-Type",
     *          type="string",
     *          default="application/json",
     *          in="header",
     *          description="Application content type",
     *          required=false
     *      ),
     *      @SWG\Parameter(
     *          type="string",
     *          name="transporterId",
     *          in="path",
     *          description="ID of transporter that needs to be fetched",
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Ok"
     *      )
     * )
     * @param $transporterId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \App\Exceptions\ResourceNotFoundException
     */
    public function orders($transporterId)
    {
        $transporter = $this->transporterService->getTransporterOrders($transporterId);
        return response(compact('transporter'));
    }

    /**
     * @SWG\Get(
     *      path="/api/transporters/{transporterId}/orders/{orderId}",
     *      tags={"Transporters"},
     *      @SWG\Parameter(
     *          name="Content-Type",
     *          type="string",
     *          default="application/json",
     *          in="header",
     *          description="Application content type",
     *          required=false
     *      ),
     *      @SWG\Parameter(
     *          type="string",
     *          name="transporterId",
     *          in="path",
     *          description="ID of transporter that needs to be fetched",
     *      ),
     *      @SWG\Parameter(
     *          type="string",
     *          name="orderId",
     *          in="path",
     *          description="ID of the order that needs to be fetched",
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Ok"
     *      )
     * )
     * @param $transporterId
     * @param $orderId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \App\Exceptions\ResourceNotFoundException
     */
    public function viewOrder($transporterId, $orderId)
    {
        $order = $this->transporterService->getTransporterOrdersInfo($transporterId, $orderId);
        return response(compact('order'));
    }


}
