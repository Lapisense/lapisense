<?php

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps

namespace Lapisense\Admin\Tables;

abstract class ListTable extends \WP_List_Table
{
    /**
     * Prepare the items for the table to process
     *
     * @return void
     */
    public function prepare_items()
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

    abstract public function getData();

    /**
     * Defines the columns to use in your listing table.
     *
     * @return array
     */
    public function get_columns()
    {
        return $this->getColumns();
    }

    abstract public function getColumns();

    /**
     * Define what data to show on each column of the table.
     *
     * @param object|array $item
     * @param string $column_name - Current column name
     *
     * @return mixed
     */
    public function column_default($item, $column_name)
    {
        return $this->getColumnValue($item, $column_name);
    }

    abstract public function getColumnValue($item, $column_name);
}
