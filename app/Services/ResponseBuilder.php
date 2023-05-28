<?php

namespace App\Services;

class ResponseBuilder {
    public function emptyResponse(): bool
    {
        return false;
    }

    public function response(string $qtype)
    {
        return $this->makeResponse($qtype);
    }

    private function makeResponse(string $qtype)
    {
        $nsResponse = [
            [
                "qname" => "<the qname>",
                "qtype" => "NS",
                "content" => "ns1.jimdo.com",
                "ttl" => "3600",
            ],
            [
                "qname" => "<the qname>",
                "qtype" => "NS",
                "content" => "ns2.jimdo.com",
                "ttl" => "3600",
            ],
        ];

        if($qtype === 'ns') {
            return $nsResponse;
        }

        $soaResponse = [
            [
                "qname" => "<the qname>",
                "qtype" => "SOA",
                "content" => "ns1.jimdo.com. hostmaster.jimdo.com. 2018041355 10800 3600 604800 600",
                "ttl" => 3600,
            ],
        ];

        if($qtype === 'soa') {
            return $soaResponse;
        }

        $aResponse = [
            [
                "qname" => "<the qname>",
                "qtype" => "A",
                "content" => "1.2.3.4",
                "ttl" => 3600,
            ],
        ];

        return array_merge($nsResponse, $soaResponse, $aResponse);
    }
}