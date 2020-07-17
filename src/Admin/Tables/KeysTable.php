<?php

namespace Lapisense\Admin\Tables;

use Lapisense\Contracts\KeysRepository;

class KeysTable extends ListTable
{
    /** @var KeysRepository */
    protected $repository;

    public function setRepository(KeysRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getData()
    {
        return $this->repository->getDummyData();
    }

    /**
     * Defines the columns to use in your listing table.
     *
     * @return array
     */
    public function getColumns()
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
     * @return mixed
     */
    public function getColumnValue($item, $column_name)
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