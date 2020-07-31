<?php

interface Transport
{
    public function move($product);
}

class Boat implements Transport
{
    public function move($product)
    {
        echo $product . ' едет по воде.' . PHP_EOL;
    }
}

class Car implements Transport
{
    public function move($product)
    {
        echo $product . ' едет по дороге.' . PHP_EOL;
    }
}

interface FactoryMethod
{
    public function getTransport($product) :Transport;
}

class TransportFactory implements FactoryMethod
{
    const ROAD_TRANSPORT = 'road';
    const WATER_TRANSPORT = 'water';

    public function getTransport($product): Transport
    {
        $transport = $this->getOptimalWayForProduct($product);
        switch ($transport) {
            case static::ROAD_TRANSPORT:
                return new Car();
            case static::WATER_TRANSPORT:
                return new Boat();
        }
        return null;
    }
    private function getOptimalWayForProduct($product)
    {
        $optimalWay = [
            'Белка' => TransportFactory::ROAD_TRANSPORT,
            'Кот' => TransportFactory::ROAD_TRANSPORT,
            'Бегемот' => TransportFactory::WATER_TRANSPORT,
        ];
            return $optimalWay[$product];
    }
}

echo '<pre>';

$products = ['Белка', 'Кот', 'Бегемот'];
foreach ($products as $product) {
    $transport = (new TransportFactory())->getTransport($product);
    $transport->move($product);
}

echo '</pre>';