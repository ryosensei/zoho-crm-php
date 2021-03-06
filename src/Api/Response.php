<?php

namespace Zoho\CRM\Api;

class Response
{
    private $type;

    private $request;

    private $raw_data;

    private $content;

    private $paginated;

    private $has_multiple_records;

    public function __construct(Request $request, $raw_data, $content)
    {
        $this->request = $request;
        $this->raw_data = $raw_data;
        $this->content = $content;
        $this->paginated = is_array($raw_data);
        $method_class = \Zoho\CRM\getMethodClassName($this->request->getMethod());
        $this->type = $method_class::getResponseDataType();
        $this->has_multiple_records = $method_class::expectsMultipleRecords($this->request);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getRawData()
    {
        return $this->raw_data;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function isPaginated()
    {
        return $this->paginated;
    }

    public function containsRecords()
    {
        return $this->type === ResponseDataType::RECORDS;
    }

    public function hasSingleRecord()
    {
        return !$this->has_multiple_records;
    }

    public function hasMultipleRecords()
    {
        return $this->has_multiple_records;
    }

    public function isConvertibleToEntity()
    {
        return $this->type === ResponseDataType::RECORDS ||
               $this->request->getMethod() === 'getUsers';
    }
}
