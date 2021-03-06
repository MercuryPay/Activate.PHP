# Activate.PHP

<a href="https://developer.vantiv.com/?utm_campaign=githubcta&utm_medium=hyperlink&utm_source=github&utm_content=gotquestions">Got questions? Connect with our experts on Vantiv ONE.</a>

<a href="https://developer.vantiv.com/?utm_campaign=githubcta&utm_medium=hyperlink&utm_source=github&utm_content=codingforcommerce">Are you coding for commerce? Connect with our experts on Vantiv ONE.</a>

* Questions?  integrationteam@mercurypay.com
* **Feature request?** Open an issue.
* Feel like **contributing**?  Submit a pull request.

## Overview

MercuryActivate&trade; is a secure enrollment service that enables merchants to apply to Mercury through an online form.  This code repository is an example web form, written in PHP, that can be used to collect and validate data before submitting it to Mercury.

## Step 1: Choose Your Payload Style and Entry Point

You can use either JSON or XML payloads.

There are three entry points each with varying number of data attribute requirements: **Lead**, **Prospect** or **hybrid**.

* A **Lead** submission requires five data attributes.
* A **Prospect** submission requires over 30 data attributes.
* A **hybrid** submission consists of the five required data attributes plus a subset of the data attributes for a Prospect. The developer decides which data attributes to include. 

## Step 2: Get a test API Key and password from Mercury 

An API Key is required to communicate with the MercuryActivate&trade; service. Each API Key is unique for each developer and to the certification environment used for testing. When the certification review is complete, new production credentials will be provided.

## Step 3: Build your Payload

This example uses a model object that contains all of the fields required for submission and then converts that model object to JSON.

* [The model object can be found here](Activate.PHP/Model/MerchantData.php).
* [The code that converts the model to JSON can be found here](Activate.PHP/Helpers/ObjectHelper.php).

## Step 4: Submit Request to Mercury

* [Activate.PHP/Helpers/ActivateServiceHelper.php](Activate.PHP/Helpers/ActivateServiceHelper.php) is a helper class that will show you how to send requests to the Mercury API via JSON.

### Submit A Lead

To submit a Lead or hybrid through an HTTP POST use this endpoint:  https://activatebeta.mps-lab.com:8121/Lead/Submission

Here is a JSON example for a Lead submission:

```
{
  "OwnerFirstName":"Jenny",
  "OwnerLastName":"Smith",
  "OwnerEmail":"Jenny@HelpMe.com",
  "DBAName":"What's For Dinner?",
  "DBAPhone":"7192223333"
}
```

### Submit a Prospect

To submit a Prospect through an HTTP POST use this endpoint:  https://activatebeta.mps-lab.com:8121/QualifiedLead/Submission
	
Here is an XML example for a Prospect submission 

```
<Request>
  <OwnerTitle>General Manager Store 5150</OwnerTitle>
  <OwnerFirstName>Gustavo</OwnerFirstName>
  <OwnerMiddleName>Reyna</OwnerMiddleName>
  <OwnerLastName>Argo</OwnerLastName>
  <OwnerSuffix>PHD</OwnerSuffix>
  <OwnerDOBDay>10</OwnerDOBDay>
  <OwnerDOBMonth>6</OwnerDOBMonth>
  <OwnerDOBYear>1985</OwnerDOBYear>
  <OwnerSSN>123456789</OwnerSSN>
  <OwnerEmail>grargo@HelpMe.com</OwnerEmail>
  <OwnerAddress>200 Main St</OwnerAddress>
  <OwnerCity>Denver</OwnerCity>
  <OwnerStateOrProvince>CO</OwnerStateOrProvince>
  <OwnerPostalCode>80229</OwnerPostalCode>
  <OwnerCountry>US</OwnerCountry>
  <DBAName>What&apos;s for Dinner?</DBAName>
  <DBAAddress>100 Main St</DBAAddress>
  <DBACity>Denver</DBACity>
  <DBAStateOrProvince>CO</DBAStateOrProvince>
  <DBAPostalCode>80229</DBAPostalCode>
  <DBACountry>US</DBACountry>
  <DBAPhone>3031112222</DBAPhone>
  <DBAExtension>1234</DBAExtension>
  <LegalName>Zoom Dinner Inc</LegalName>
  <LegalAddress>300 Main St</LegalAddress>
  <LegalCity>Denver</LegalCity>
  <LegalStateOrProvince>CO</LegalStateOrProvince>
  <LegalPostalCode>80229</LegalPostalCode>
  <LegalCountry>US</LegalCountry>
  <LegalPhone>3031113333</LegalPhone>
  <LegalExtension>1122</LegalExtension>
  <ProductServiceSold>Prepared Food</ProductServiceSold>
  <Market>722210</Market>
  <SIC>5812</SIC>
  <TaxId>1231111234</TaxId>
  <AvgTicket>15.50</AvgTicket>
  <DailyVolume>4125.00</DailyVolume>
  <AnnualSalesVisaMc>1240000.00</AnnualSalesVisaMc>
  <CurrencyType>USD</CurrencyType>
  <PercentRetailSwipedTransactions>80</PercentRetailSwipedTransactions>
  <PercentCardKeyedTransactions>10</PercentCardKeyedTransactions>
  <PercentMailOrderTransactions>0</PercentMailOrderTransactions>
  <Dda>123 4567 8900</Dda>
  <Routing>111222333</Routing>
  <FinancialInstitutionName>Wells Fargo</FinancialInstitutionName>
  <IsChecking>true</IsChecking>
  <FinancialInstitutionNumber>111222333</FinancialInstitutionNumber>
  <OwnershipType>LLC</OwnershipType>
  <ReferenceString>Admin@HelpMe.com</ReferenceString>
</Request>
```

### Status Response

To get the status on the application via an HTTP GET use this endpoint:  https://activatebeta.mps-lab.com:8121/Application/Status/{id}

Where {id} is the integer representing the ApplicationID returned from the submission.

The format of the successful status responses messages for the get lead status or get Prospect status calls is identical. 

Here is the JSON formatted response:

```
{
  "CmdStatus":"Success",
  "TextResponse":"Submitted",
  "ApplicationId": "0D9217A9-1559-437D-A1A6-6283215CAD44"
}
```


### ©2015 Mercury Payment Systems, LLC - all rights reserved.

Disclaimer:
This software and all specifications and documentation contained herein or provided to you hereunder (the "Software") are provided free of charge strictly on an "AS IS" basis. No representations or warranties are expressed or implied, including, but not limited to, warranties of suitability, quality, merchantability, or fitness for a particular purpose (irrespective of any course of dealing, custom or usage of trade), and all such warranties are expressly and specifically disclaimed. Mercury Payment Systems shall have no liability or responsibility to you nor any other person or entity with respect to any liability, loss, or damage, including lost profits whether foreseeable or not, or other obligation for any cause whatsoever, caused or alleged to be caused directly or indirectly by the Software. Use of the Software signifies agreement with this disclaimer notice.

![Analytics](https://ga-beacon.appspot.com/UA-60858025-12/Activate.PHP/readme?pixel)
