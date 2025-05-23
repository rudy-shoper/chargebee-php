<?php
namespace Chargebee\Actions;

use Chargebee\Responses\InAppSubscriptionResponse\ImportSubscriptionInAppSubscriptionResponse;
use Chargebee\Responses\InAppSubscriptionResponse\RetrieveStoreSubsInAppSubscriptionResponse;
use Chargebee\Responses\InAppSubscriptionResponse\ProcessReceiptInAppSubscriptionResponse;
use Chargebee\Responses\InAppSubscriptionResponse\ImportReceiptInAppSubscriptionResponse;
use Chargebee\ValueObjects\Encoders\URLFormEncoder;
use Chargebee\ValueObjects\Transporters\ChargebeePayload;
use Chargebee\ValueObjects\ResponseObject;
use Chargebee\ValueObjects\APIRequester;
use Chargebee\HttpClient\HttpClientFactory;
use Chargebee\Environment;

final class InAppSubscriptionActions
{
    private HttpClientFactory $httpClientFactory;
    private Environment $env;
    public function __construct(HttpClientFactory $httpClientFactory, Environment $env){
       $this->httpClientFactory = $httpClientFactory;
       $this->env = $env;
    }

    /**
    *   @see https://apidocs.chargebee.com/docs/api/in_app_subscriptions?lang=php#retrieve_store_subscription
    *   @param array{
    *     receipt?: string,
    *     } $params Description of the parameters
    *   @param string $id  
    *   @param array<string, string> $headers
    *   @return RetrieveStoreSubsInAppSubscriptionResponse
    */
    public function retrieveStoreSubs(string $id, array $params, array $headers = []): RetrieveStoreSubsInAppSubscriptionResponse
    {
        $jsonKeys = [
        ];
        $payload = ChargebeePayload::builder()
        ->withEnvironment($this->env)
        ->withHttpMethod("post")
        ->withUriPaths(["in_app_subscriptions",$id,"retrieve"])
        ->withParamEncoder( new URLFormEncoder())
        ->withSubDomain(null)
        ->withJsonKeys($jsonKeys)
        ->withHeaders($headers)
        ->withParams($params)
        ->build();
        $apiRequester = new APIRequester($this->httpClientFactory);
        $respObject = $apiRequester->makeRequest($payload);
        return RetrieveStoreSubsInAppSubscriptionResponse::from($respObject->data, $respObject->headers);
    }

    /**
    *   @see https://apidocs.chargebee.com/docs/api/in_app_subscriptions?lang=php#import_receipt
    *   @param array{
    *     product?: array{
    *     currency_code?: string,
    *     },
    * customer?: array{
    *     id?: string,
    *     email?: string,
    *     },
    * receipt?: string,
    *     } $params Description of the parameters
    *   @param string $id  
    *   @param array<string, string> $headers
    *   @return ImportReceiptInAppSubscriptionResponse
    */
    public function importReceipt(string $id, array $params, array $headers = []): ImportReceiptInAppSubscriptionResponse
    {
        $jsonKeys = [
        ];
        $payload = ChargebeePayload::builder()
        ->withEnvironment($this->env)
        ->withHttpMethod("post")
        ->withUriPaths(["in_app_subscriptions",$id,"import_receipt"])
        ->withParamEncoder( new URLFormEncoder())
        ->withSubDomain(null)
        ->withJsonKeys($jsonKeys)
        ->withHeaders($headers)
        ->withParams($params)
        ->build();
        $apiRequester = new APIRequester($this->httpClientFactory);
        $respObject = $apiRequester->makeRequest($payload);
        return ImportReceiptInAppSubscriptionResponse::from($respObject->data, $respObject->headers);
    }

    /**
    *   @see https://apidocs.chargebee.com/docs/api/in_app_subscriptions?lang=php#import_subscription_without_receipt
    *   @param array{
    *     subscription?: array{
    *     id?: string,
    *     started_at?: int,
    *     term_start?: int,
    *     term_end?: int,
    *     product_id?: string,
    *     currency_code?: string,
    *     transaction_id?: string,
    *     is_trial?: bool,
    *     },
    * customer?: array{
    *     id?: string,
    *     email?: string,
    *     },
    * } $params Description of the parameters
    *   @param string $id  
    *   @param array<string, string> $headers
    *   @return ImportSubscriptionInAppSubscriptionResponse
    */
    public function importSubscription(string $id, array $params, array $headers = []): ImportSubscriptionInAppSubscriptionResponse
    {
        $jsonKeys = [
        ];
        $payload = ChargebeePayload::builder()
        ->withEnvironment($this->env)
        ->withHttpMethod("post")
        ->withUriPaths(["in_app_subscriptions",$id,"import_subscription"])
        ->withParamEncoder( new URLFormEncoder())
        ->withSubDomain(null)
        ->withJsonKeys($jsonKeys)
        ->withHeaders($headers)
        ->withParams($params)
        ->build();
        $apiRequester = new APIRequester($this->httpClientFactory);
        $respObject = $apiRequester->makeRequest($payload);
        return ImportSubscriptionInAppSubscriptionResponse::from($respObject->data, $respObject->headers);
    }

    /**
    *   @see https://apidocs.chargebee.com/docs/api/in_app_subscriptions?lang=php#process_purchase_command
    *   @param array{
    *     product?: array{
    *     id?: string,
    *     currency_code?: string,
    *     price?: int,
    *     name?: string,
    *     price_in_decimal?: string,
    *     period?: string,
    *     period_unit?: string,
    *     },
    * customer?: array{
    *     id?: string,
    *     email?: string,
    *     first_name?: string,
    *     last_name?: string,
    *     },
    * receipt?: string,
    *     } $params Description of the parameters
    *   @param string $id  
    *   @param array<string, string> $headers
    *   @return ProcessReceiptInAppSubscriptionResponse
    */
    public function processReceipt(string $id, array $params, array $headers = []): ProcessReceiptInAppSubscriptionResponse
    {
        $jsonKeys = [
        ];
        $payload = ChargebeePayload::builder()
        ->withEnvironment($this->env)
        ->withHttpMethod("post")
        ->withUriPaths(["in_app_subscriptions",$id,"process_purchase_command"])
        ->withParamEncoder( new URLFormEncoder())
        ->withSubDomain(null)
        ->withJsonKeys($jsonKeys)
        ->withHeaders($headers)
        ->withParams($params)
        ->build();
        $apiRequester = new APIRequester($this->httpClientFactory);
        $respObject = $apiRequester->makeRequest($payload);
        return ProcessReceiptInAppSubscriptionResponse::from($respObject->data, $respObject->headers);
    }

}
?>