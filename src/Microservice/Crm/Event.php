<?php

namespace Brighte\Microservice\Crm;

class Event
{

    public const SALESFORCE_CREATE_ACCOUNT = 'Salesforce.CreateAccount';
    public const SALESFORCE_CREATE_CONTACT = 'Salesforce.CreateContact';
    public const SALESFORCE_CREATE_OPPORTUNITY = 'Salesforce.CreateOpportunity';
    public const SALESFORCE_CREATE_TASK = 'Salesforce.CreateTask';

    public const SALESFORCE_UPDATE_ACCOUNT = 'Salesforce.UpdateAccount';
    public const SALESFORCE_UPDATE_CONTACT = 'Salesforce.UpdateContact';
    public const SALESFORCE_UPDATE_OPPORTUNITY = 'Salesforce.UpdateOpportunity';
    public const SALESFORCE_UPDATE_TASK = 'Salesforce.UpdateTask';
}
