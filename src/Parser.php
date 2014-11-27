<?php
namespace SSX\OpenData;

class Parser {
    var $parser;
    var $data;

    public function __construct(DataParserContract $DataParserContact)
    {
        $this->parser = $DataParserContact;

        $this->data = $this->parser->getData();
    }

    public function getData()
    {
        return $this->data;
    }
}