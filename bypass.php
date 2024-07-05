<?php

if (isset($_GET["id"])) {
        $id = $_GET["id"];

        if ($id <= 10) {
            $id = "files/".$id.".txt";
        }

        $pattern = '/\.\.(\/\/|\\\\\/)/';


        if (!preg_match($pattern, $id) AND str_contains($id,"..")) {   
            $id = str_replace("..","",$id);
            $id = "files/1.txt";
        }                     
}
else {

    $id = "files/1.txt";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yrprey - Path Traversal - Basic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="icon" href="img/favicon.svg" title="YRprey">
</head>
<body>
    <!-- Navbar -->
    <div class="ui inverted menu">
    <div class="header item"><a class="navbar-brand" href="index.php"><img src="img/logo-letter.svg" width="140px;"></a></div>
    </div>

    <!-- Main Container -->
    <div class="ui container" style="margin-top: 20px;">
        <div class="ui segment">
            <h2 class="ui header">Breaking News</h2>
            <p>This scenario has been adapted to simulate a Path Traversal technique called Bypass,, because it uses characters // and \/.<br> If you attempt to exploit the vulnerability according to the environment requirements, you will succeed in the exploitation. Depending on the environment and how it has been configured to support the application, you could exploit a Local File Inclusion vulnerability.<br>
            Some versions of PHP and environmental configurations make system functions vulnerable. In this scenario, we have adapted to simulate a vulnerable environment.</p>
            <img class="ui centered large image" src="https://via.placeholder.com/800x400" alt="News Image">
            <p><?php include($id); ?> </p>
           
<h1>Path Traversal via `//` and `\/`</h1>

Path Traversal, also known as Directory Traversal, is a vulnerability that arises when an application improperly handles file paths provided by users, allowing them to navigate to directories outside of the intended directory structure. Attackers can exploit this vulnerability by manipulating file paths using sequences like `//` and `\/`.

<h1>Understanding `//` and `\/`:</h1>

1. <li>`//` in Path Traversal:</li>
   
   The sequence `//` is used to traverse directories upwards in a file path. In Unix-like systems, `//` represents the root directory, and repeated usage (`../../`) allows navigation to parent directories.

2. <li>`\/` in Path Traversal:</li>
   
   The sequence `\/` is another way to encode path traversal sequences. It's commonly used to evade filters or detection mechanisms that block typical traversal sequences like `../`.

<h1>Exploitation Scenario:</h1>

1. <li>Vulnerable Application:</li> Suppose a web application allows users to download files based on a parameter passed via a URL, such as `http://example.com/download?file=user_input`.

2. <li>Manipulation with `//`:</li> An attacker can manipulate the file path by appending `//` to navigate upwards in the directory structure. For example, `http://example.com/download?file=../../../etc/passwd`.

3. <li>Manipulation with `\/`:</li> Alternatively, an attacker can use `\/` to achieve similar results, such as `http://example.com/download?file=..\/..\/etc\/passwd`.

<h1>Impact:</h1>

By exploiting `//` and `\/` sequences in file paths, attackers can access sensitive files and directories outside the intended scope of the application. This can lead to unauthorized disclosure of confidential information, such as system files (`/etc/passwd`), configuration files, or even execution of arbitrary code.

<h1>Mitigation Strategies:</h1>

To mitigate Path Traversal via `//` and `\/`:

- <li>Input Validation:</li> Always validate and sanitize user inputs, especially file paths and parameters used for file operations.
  
- <li>Normalization:</li> Normalize file paths to ensure they are within the intended directory structure and prevent traversal sequences.
  
- <li>File System Restrictions:</li> Limit file system access permissions to restrict the application's ability to access sensitive directories and files.
  
- <li>Regular Security Testing:</li> Conduct regular security assessments, including vulnerability scanning and penetration testing, to identify and remediate Path Traversal vulnerabilities.

In conclusion, Path Traversal vulnerabilities leveraging `//` and `\/` sequences can pose significant risks to application security. By implementing rigorous input validation and adopting secure coding practices, developers can effectively mitigate these risks and protect their applications from exploitation.            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>
