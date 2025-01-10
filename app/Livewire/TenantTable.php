<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Tenant;

class TenantTable extends DataTableComponent
{
    protected $model = Tenant::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")->searchable()->sortable(),
            Column::make("Email", "email")->searchable()->sortable(),
            Column::make("Created at", "created_at"),
            Column::make("Action")->label(function ($tenant) {
                return view('livewire.tenant-table-actions', ['tenant' => $tenant]);
            })

        ];
    }
}
