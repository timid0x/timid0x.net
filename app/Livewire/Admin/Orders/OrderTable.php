<?php

namespace App\Livewire\Admin\Orders;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Order;

class OrderTable extends DataTableComponent
{
    protected $model = Order::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("#Orden", "id")
                ->sortable(),

            Column::make("Ticket")
                ->label(function ($row) {
                    return view('admin.orders.ticket', ['order' => $row]);
                }),

            Column::make("Fecha Orden", "created_at")
                ->format(function ($value) {
                    return  $value->format('d/M/y');
                })
                ->sortable(),
            Column::make("Total", "total")
                ->format(function ($value) {
                    return  '$' . number_format($value, 2);
                })
                ->sortable(),
            Column::make("Cantidad", "content")
                ->format(function ($value) {
                    return  count($value);
                })
                ->sortable(),

            Column::make("Estado", "status")
                ->format(function ($value) {
                    return  $value->name;
                })
                ->sortable(),
            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.orders.actions', ['order' => $row]);
                }),


        ];
    }
}
