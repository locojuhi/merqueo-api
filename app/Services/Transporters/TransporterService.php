<?php

declare(strict_types = 1);

namespace App\Services\Transporters;

use App\Models\Order;
use App\Models\Transporter;
use App\Repositories\OrderRepository;
use App\Repositories\TransporterRepository;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TransporterService
{
    /**
     * @var TransporterRepository
     */
    private $transporterRepository;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * TransporterService constructor.
     * @param TransporterRepository $transporterRepository
     * @param OrderRepository $orderRepository
     */
    public function __construct(
        TransporterRepository $transporterRepository,
        OrderRepository $orderRepository
    ) {
        $this->transporterRepository = $transporterRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @return Collection
     */
    public function getAllTransporters(): Collection
    {
        return $this->transporterRepository->findAll();
    }

    /**
     * @param string $id
     * @return Transporter
     */
    public function getTransporterInfo(string $id): Transporter
    {
        $transporter = $this->transporterRepository->find($id);

        if (empty($transporter)) {
            //TODO: Implement Not Found exception for APIs
            throw new NotFoundHttpException();
        }
        return $transporter;
    }

    /**
     * @param string $id
     * @return Collection
     */
    public function getTransporterOrders(string $id): Collection
    {
        $transporter = $this->transporterRepository->findTransporterWithPendingOrders($id);

        if (empty($transporter)) {
            //TODO: Implement Not Found exception for APIs
            throw new NotFoundHttpException();
        }
        return $transporter;
    }

    /**
     * @param string $transporterId
     * @param string $orderId
     * @return Order
     */
    public function getTransporterOrdersInfo(string $transporterId, string $orderId): Order
    {
        $order = $this->orderRepository->findOderWithProducts($orderId);

        return $order;
    }
}
