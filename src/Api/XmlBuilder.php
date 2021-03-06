<?php

namespace Zoho\CRM\Api;

use SimpleXMLElement;
use Zoho\CRM\Entities\Collection;
use Zoho\CRM\Entities\AbstractEntity;

class XmlBuilder
{
    public static function buildRecords($module, $records)
    {
        if ($records instanceof Collection) {
            $records = $records->toRawArray();
        }

        $xml = new SimpleXMLElement("<$module/>");

        $row_count = 1;

        foreach ($records as $record) {
            $row = $xml->addChild('row');
            $row->addAttribute('no', $row_count);

            if ($record instanceof AbstractEntity) {
                $record = $record->rawData();
            }

            foreach ($record as $attr_name => $attr_value) {
                // Stringify boolean values
                if (is_bool($attr_value)) {
                    $attr_value = \Zoho\CRM\booleanToString($attr_value);
                }

                $attr = $row->addChild('FL', $attr_value);
                $attr->addAttribute('val', $attr_name);
            }

            $row_count++;
        }

        // We need to return the XML as a string,
        // but also to get rid of the XML version declaration node.
        // Otherwise Zoho won't be able to parse it...
        $document = dom_import_simplexml($xml);
        return $document->ownerDocument->saveXML($document->ownerDocument->documentElement);
    }
}
