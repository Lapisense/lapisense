<?php

namespace Lapisense\Admin\Tables;

use Lapisense\Contracts\KeysRepository;

class KeysTable extends ListTable
{
    /**
     * @var KeysRepository
     * @psalm-suppress PropertyNotSetInConstructor
     */
    protected $repository;

    public function setRepository(KeysRepository $repository):void
    {
        $this->repository = $repository;
    }

    public function getData():array
    {
        return $this->repository->getDummyData();
    }

    /**
     * Defines the columns to use in your listing table.
     *
     * @return array
     */
    public function getColumns():array
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'product' => 'Product',
            'activations' => 'Activations',
        ];
    }

    /**
     * Define what data to show on each column of the table.
     *
     * @param array $item Data
     * @param string $column_name - Current column name
     *
     * @return string
     */
    public function getColumnValue(array $item, string $column_name):string
    {
        switch ($column_name) {
            case 'id':
            case 'key':
            case 'product':
            case 'activations':
                return $item[$column_name];

            default:
                return print_r($item, true);
        }
    }
}
