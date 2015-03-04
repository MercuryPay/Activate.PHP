# Activate.PHP
==========

* More documentation?  http://developer.mercurypay.com
* Questions?  integrationteam@mercurypay.com
* **Feature request?** Open an issue.
* Feel like **contributing**?  Submit a pull request.

##Overview

MercuryActivate is an enrollment service that enables merchants to apply to Mercury through an online form. This shortens the enrollment time so that your merchants can start processing payments as quickly as possible. MercuryActivate offers especially fast turn-around times for enrollment types where details such as contract pricing have been pre-negotiated. 
This code repository is an example of a PHP web form to collect your data and validate it before submitting it to Mercury as a lead using our REST API.

While test credentials are provided within the code repository for ease of use please request test credentials for your integration by following the instructions in Step 2 below.

## Step 1: Choose Your API Style and Entry Point

You can use either JSON or XML RESTful messaging.

You will also need to choose a submission entry point: Lead, Prospect or hybrid. 

* A Lead submission requires five data points 
* A Prospect submission requires over 30 data points 
* A hybrid submission consists of the five required data points plus a subset of the data points for a Prospect. The developer decides which data points to include. 

Although the possible data passed is identical for both entry points, the Prospect ensures that the data being sent is ready for a full underwriting check, which will shorten the time to merchant processing. The Lead entry point requires less data and is used so that Mercury can follow up on a more formal lead.

## Step 2: Get a test API Key and password from Mercury 

An API Key is required for a developer to communicate with Mercury’s MercuryActivate service. Each API Key is unique for that developer. It is also unique to the certification service used for testing. Once the certification review is passed, you will be provided with new credentials for use in production. 

## Step 3: Build your RESTful format: JSON or XML 

The RESTful API can pass messages that are either JSON-formatted or XML-formatted; the entry points are identical. Whereas the JSON format is perhaps simpler to implement, the XML style may be more familiar to you. 
The message formatting is determined by the HTML headers passed to the service. If you omit specific instructions for what type of message format you are using, the service will default to XML. 

* With the XML style, the data elements must be maintained in the same order as listed in the documentation. Out of order elements will cause missed values. 
* The JSON format is not picky about element order.

After the Lead or Prospect is successfully submitted, it becomes an Application. Future status checks on an Application can be queried using the returned ApplicationId.


## Step 3: Certification and Testing

When you have completed your integration, your Developer Integration analyst will work with you to certify that your solution is ready to be released into production. This process includes a review of:

* Branding (i.e., Mercury logo)
* Legal disclaimers
* Mercury’s Hours of Operations
* Lead vs Prospect data element completion
* The validation and verification of data points seen in the test submissions

Use Cases for Certification 

* Lead Use Case 
* Prospect Use Case 

Your Developer Integrations analyst will test your integration as follows, using a set of test merchant profiles that include both positive and negative test cases: 

1. Setup a screen share between yourself and your Developer Integrations analyst, and display your application form so your analyst can observe you entering data. 
2. Enter the Test Merchant Profile data 
3. The Developer Integrations analyst will examine the application form to confirm that the following required components are present: 
  1. Mercury logo is present and Mercury is identified to the merchant as the relationship owner for credit card processing.
  2. Mercury’s Hours of Operations are identified to the merchant. 
  3. Mercury’s Customer Service Number is provided to the merchant. 
  4. It is clearly stated that Mercury will be reviewing this account and may potentially pull a Credit Score if needed for Underwriting. 
4. Click the submit button (or equivalent). This will immediately send the test data from your application form to Mercury’s server. Using Mercury’s backend dashboard, the Developer Integrations analyst will: 
  1. Determine if the information sent is properly identified as a Lead or Prospect.
  2. Analyze the merchant information and inform you of any issues, concerns, or missing elements. 

This process will be repeated until all issues are successfully addressed, then the Developer Integrations analyst will officially certify your application. Upon successful certification, the Developer Integration analyst will provision you in the Production Environment. You can then start using MercuryActivate for your merchants.


###©2015 Mercury Payment Systems, LLC - all rights reserved.

Disclaimer:
This software and all specifications and documentation contained herein or provided to you hereunder (the "Software") are provided free of charge strictly on an "AS IS" basis. No representations or warranties are expressed or implied, including, but not limited to, warranties of suitability, quality, merchantability, or fitness for a particular purpose (irrespective of any course of dealing, custom or usage of trade), and all such warranties are expressly and specifically disclaimed. Mercury Payment Systems shall have no liability or responsibility to you nor any other person or entity with respect to any liability, loss, or damage, including lost profits whether foreseeable or not, or other obligation for any cause whatsoever, caused or alleged to be caused directly or indirectly by the Software. Use of the Software signifies agreement with this disclaimer notice.

