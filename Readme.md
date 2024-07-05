# YrpreyPathTraversal

![yprey](https://i.imgur.com/uYfdBN9.png)

**Created by [Fernando Mengali](https://www.linkedin.com/in/fernando-mengali-273504142/)**

YrpreyPathTraversal is a framework that explains vulnerabilities of the Path Traversal in a clear and objective way. The framework was developed to teach and learn details in Pentest (penetration testing) and Application Security. In the context of Offensive Security, vulnerabilities contained in web applications can be identified, exploited and compromised. For application security professionals and experts, the framework provides an in-depth understanding of code-level vulnerabilities. Yrprey, making it valuable for educational, learning and teaching purposes in the field of Information Security.

#### Exploitation - Path Traversal - Basic

![yprey](https://i.imgur.com/6A5D5ir.png)

Note that all requests based on a name do not have hierarchy, organization, segmentation, or profiling. In other words, you can view the names of all users from any team.

#### Exploitation - Path Traversal - Null Termination %00

![yprey](https://i.imgur.com/eGoxe2f.png)

Change the token value, even if you enter the wrong username and password, you can authenticate with the token.



#### Exploitation - Path Traversal - Bypass with caracteres "//" and/or "\/"

![yprey](https://i.imgur.com/430Bkdb.png)

Enter the wrong username and password to obtain a valid token and use it on the API2:2023 tab to authenticate in the system.



#### Exploitation - Path Traversal - Encoded %2f, %c0%af and %ef%bc%8f

![yprey](https://i.imgur.com/t54w3FB.png)

Send an image number to the backend, for example 1,000,000. The frontend will receive the response and attempt to render it, causing an application exhaustion.


#### Features
 - Based on Path Traversal vulnerabilities.

 ## The framework was written with the following technologies:

* 1º - PHP
* 2º - Bootstrap - CSS
* 3º - Semantic UI


#### List of Vulnerabilities

* 1º - Path Traversal - Basic
* 2º - Path Traversal - Null Termination
* 3º - Path Traversal - Bypass
* 3º - Path Traversal - Encoded

## How Install

* 1º - Install and configure Apache, PHP on your Linux
* 2º - Import the YRpreyPathTraversal files to /var/www/
* 3º - In php ini change allow_url_include to "On".
* 4º - Start Apache Server
* 5º - Access the address http://localhost in your browser


## Observation
test on the Apache web server with PHP and on Linux operating systems.

## Reporting Vulnerabilities

Please, avoid taking this action and requesting a CVE!

The application intentionally has some vulnerabilities, most of them are known and are treated as lessons learned. Others, in turn, are more "hidden" and can be discovered on your own. If you have a genuine desire to demonstrate your skills in finding these extra elements, we suggest you share your experience on a blog or create a video. There are certainly people interested in learning about these nuances and how you identified them. By sending us the link, we may even consider including it in our references.
