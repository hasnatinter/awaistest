<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_for_empty_parameter_result_is_false()
    {
        $response = $this->get('/');

        $arr = ['result' => false];

        $response->assertJson($arr);
    }

    public function test_for_unknown_domain_parameter_result_is_empty()
    {
        $response = $this->get('/unknown');

        $arr = ['result' => false];

        $response->assertJson($arr);
    }

    public function test_for_ns_domain_parameter_result_is_empty()
    {
        $response = $this->get('/ns');

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

        $arr = ['result' => $nsResponse];

        $response->assertJson($arr);
    }

    public function test_for_soa_domain_parameter_result_is_empty()
    {
        $response = $this->get('/soa');

        $soaResponse = [
            [
                "qname" => "<the qname>",
                "qtype" => "SOA",
                "content" => "ns1.jimdo.com. hostmaster.jimdo.com. 2018041355 10800 3600 604800 600",
                "ttl" => 3600,
            ],
        ];

        $arr = ['result' => $soaResponse];

        $response->assertJson($arr);
    }

    public function test_for_a_domain_parameter_result_is_empty()
    {
        $response = $this->get('/a');

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

        $soaResponse = [
            [
                "qname" => "<the qname>",
                "qtype" => "SOA",
                "content" => "ns1.jimdo.com. hostmaster.jimdo.com. 2018041355 10800 3600 604800 600",
                "ttl" => 3600,
            ],
        ];

        $aResponse = [
            [
                "qname" => "<the qname>",
                "qtype" => "A",
                "content" => "1.2.3.4",
                "ttl" => 3600,
            ],
        ];

        $arr = ['result' => array_merge($nsResponse, $soaResponse, $aResponse)];

        $response->assertJson($arr);
    }

    public function test_for_cname_domain_parameter_result_is_empty()
    {
        $response = $this->get('/a');

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

        $soaResponse = [
            [
                "qname" => "<the qname>",
                "qtype" => "SOA",
                "content" => "ns1.jimdo.com. hostmaster.jimdo.com. 2018041355 10800 3600 604800 600",
                "ttl" => 3600,
            ],
        ];

        $aResponse = [
            [
                "qname" => "<the qname>",
                "qtype" => "A",
                "content" => "1.2.3.4",
                "ttl" => 3600,
            ],
        ];

        $arr = ['result' => array_merge($nsResponse, $soaResponse, $aResponse)];

        $response->assertJson($arr);
    }
}
