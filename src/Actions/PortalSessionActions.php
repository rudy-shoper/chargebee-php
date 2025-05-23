<?php
namespace Chargebee\Actions;

use Chargebee\Responses\PortalSessionResponse\CreatePortalSessionResponse;
use Chargebee\Responses\PortalSessionResponse\RetrievePortalSessionResponse;
use Chargebee\Responses\PortalSessionResponse\ActivatePortalSessionResponse;
use Chargebee\Responses\PortalSessionResponse\LogoutPortalSessionResponse;
use Chargebee\ValueObjects\Encoders\URLFormEncoder;
use Chargebee\ValueObjects\Transporters\ChargebeePayload;
use Chargebee\ValueObjects\ResponseObject;
use Chargebee\ValueObjects\APIRequester;
use Chargebee\HttpClient\HttpClientFactory;
use Chargebee\Environment;

final class PortalSessionActions
{
    private HttpClientFactory $httpClientFactory;
    private Environment $env;
    public function __construct(HttpClientFactory $httpClientFactory, Environment $env){
       $this->httpClientFactory = $httpClientFactory;
       $this->env = $env;
    }

    /**
    *   @see https://apidocs.chargebee.com/docs/api/portal_sessions?lang=php#create_a_portal_session
    *   @param array{
    *     customer?: array{
    *     id?: string,
    *     },
    * redirect_url?: string,
    *     forward_url?: string,
    *     } $params Description of the parameters
    *   
    *   @param array<string, string> $headers
    *   @return CreatePortalSessionResponse
    */
    public function create(array $params, array $headers = []): CreatePortalSessionResponse
    {
        $jsonKeys = [
        ];
        $payload = ChargebeePayload::builder()
        ->withEnvironment($this->env)
        ->withHttpMethod("post")
        ->withUriPaths(["portal_sessions"])
        ->withParamEncoder( new URLFormEncoder())
        ->withSubDomain(null)
        ->withJsonKeys($jsonKeys)
        ->withHeaders($headers)
        ->withParams($params)
        ->build();
        $apiRequester = new APIRequester($this->httpClientFactory);
        $respObject = $apiRequester->makeRequest($payload);
        return CreatePortalSessionResponse::from($respObject->data, $respObject->headers);
    }

    /**
    *   @see https://apidocs.chargebee.com/docs/api/portal_sessions?lang=php#activate_a_portal_session
    *   @param array{
    *     token?: string,
    *     } $params Description of the parameters
    *   @param string $id  
    *   @param array<string, string> $headers
    *   @return ActivatePortalSessionResponse
    */
    public function activate(string $id, array $params, array $headers = []): ActivatePortalSessionResponse
    {
        $jsonKeys = [
        ];
        $payload = ChargebeePayload::builder()
        ->withEnvironment($this->env)
        ->withHttpMethod("post")
        ->withUriPaths(["portal_sessions",$id,"activate"])
        ->withParamEncoder( new URLFormEncoder())
        ->withSubDomain(null)
        ->withJsonKeys($jsonKeys)
        ->withHeaders($headers)
        ->withParams($params)
        ->build();
        $apiRequester = new APIRequester($this->httpClientFactory);
        $respObject = $apiRequester->makeRequest($payload);
        return ActivatePortalSessionResponse::from($respObject->data, $respObject->headers);
    }

    /**
    *   @see https://apidocs.chargebee.com/docs/api/portal_sessions?lang=php#logout_a_portal_session
    *   
    *   @param string $id  
    *   @param array<string, string> $headers
    *   @return LogoutPortalSessionResponse
    */
    public function logout(string $id, array $headers = []): LogoutPortalSessionResponse
    {
        $jsonKeys = [
        ];
        $payload = ChargebeePayload::builder()
        ->withEnvironment($this->env)
        ->withHttpMethod("post")
        ->withUriPaths(["portal_sessions",$id,"logout"])
        ->withParamEncoder( new URLFormEncoder())
        ->withSubDomain(null)
        ->withJsonKeys($jsonKeys)
        ->withHeaders($headers)
        ->build();
        $apiRequester = new APIRequester($this->httpClientFactory);
        $respObject = $apiRequester->makeRequest($payload);
        return LogoutPortalSessionResponse::from($respObject->data, $respObject->headers);
    }

    /**
    *   @see https://apidocs.chargebee.com/docs/api/portal_sessions?lang=php#retrieve_a_portal_session
    *   
    *   @param string $id  
    *   @param array<string, string> $headers
    *   @return RetrievePortalSessionResponse
    */
    public function retrieve(string $id, array $headers = []): RetrievePortalSessionResponse
    {
        $jsonKeys = [
        ];
        $payload = ChargebeePayload::builder()
        ->withEnvironment($this->env)
        ->withHttpMethod("get")
        ->withUriPaths(["portal_sessions",$id])
        ->withParamEncoder( new URLFormEncoder())
        ->withSubDomain(null)
        ->withJsonKeys($jsonKeys)
        ->withHeaders($headers)
        ->build();
        $apiRequester = new APIRequester($this->httpClientFactory);
        $respObject = $apiRequester->makeRequest($payload);
        return RetrievePortalSessionResponse::from($respObject->data, $respObject->headers);
    }

}
?>