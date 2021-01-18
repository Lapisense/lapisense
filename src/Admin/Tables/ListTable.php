<?php

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps

namespace Lapisense\Admin\Tables;

abstract class ListTable extends \WP_List_Table
{
    public function __construct(array $args = array())
    {
        $this->items = array();
        $this->_column_headers = array();

        parent::__construct();
    }

    /**
     * Prepare the items for the table to process
     *
     * @return void
     */
    public function prepare_items():void
    {
        $columns = $this->get_columns();
        $sortable = $this->get_sortable_columns();

        $data = $this->getData();

        $perPage = 20;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args([
            'total_items' => $totalItems,
            'per_page' => $perPage
        ]);

        $data = array_slice($data, (($currentPage - 1) * $perPage), $perPage);

        $this->_column_headers = [$columns, $sortable];
        $this->items = $data;
    }

    abstract public function getData(): array;

    /**
     * Defines the columns to use in your listing table.
     *
     * @return array
     */
    public function get_columns():array
    {
        return $this->getColumns();
    }

    abstract public function getColumns(): array;

    /**
     * Define what data to show on each column of the table.
     *
     * @param object|array $item
     * @param string $column_name - Current column name
     *
     * @return string
     */
    public function column_default($item, $column_name):string
    {
        return $this->getColumnValue((array) $item, $column_name);
    }

    abstract public function getColumnValue(array $item, string $column_name): string;
}
