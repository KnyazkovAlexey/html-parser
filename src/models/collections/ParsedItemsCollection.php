<?php

namespace models\collections;

class ParsedItemsCollection extends BaseCollection
{
    public function getNames(): array
    {
        return $this->getColumn('name');
    }
}