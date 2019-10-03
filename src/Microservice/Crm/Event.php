<?php

namespace Brighte\Microservice\Crm;

class Event
{

    public const SALESFORCE_ACCOUNT_CREATE = 'Salesforce.Account.Create';
    public const SALESFORCE_ACCOUNT_UPDATE = 'Salesforce.Account.Update';
    public const SALESFORCE_CONTACT_CREATE = 'Salesforce.Contact.Create';
    public const SALESFORCE_CONTACT_UPDATE = 'Salesforce.Contact.Update';
    public const SALESFORCE_OPPORTUNITY_CREATE = 'Salesforce.Opportunity.Create';
    public const SALESFORCE_OPPORTUNITY_UPDATE = 'Salesforce.Opportunity.Update';
    public const SALESFORCE_TASK_CREATE = 'Salesforce.Task.Create';
    public const SALESFORCE_TASK_UPDATE = 'Salesforce.Task.Update';
}
