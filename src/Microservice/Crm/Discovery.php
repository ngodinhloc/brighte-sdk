<?php

namespace Brighte\Microservice\Crm;

class Discovery
{

    public const API_ENDPOINT_PRODUCTION = 'https://api.brighte.com.au/v1/crm/';
    public const API_ENDPOINT_UAT = 'https://api.uat.brightelabs.com.au/v1/crm/';
    public const API_ENDPOINT_STAGING = 'https://api.staging.brightelabs.com.au/v1/crm/';

    public const SQS_CONNECTION_CRM = 'sqs.ms.crm';
    public const SQS_CONNECTION_PORTAL = 'sqs.portal';
}
