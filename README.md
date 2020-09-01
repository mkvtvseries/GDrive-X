# GDrive-X
A tool for playing Google Photos Video with JW Player

## Description

A tool for playing Google Photos Video using JW Player. You can play any video hosted on Google Photos directly using the following script. It enables you to stream video using world's most renowned player i.e. JW Player.

## Important Note

Please read the Disclaimer carefully before you start to use the GDrive-X (repository). By using the GDrive-X (repository) or by downloading GDrive-X (repository) when this option is made available to you, you accept and agree to be bound and abide by the Disclaimer. If you do not want to agree to the GDrive-X (repository)'s Disclaimer, you must not access or use the GDrive-X (repository). <a href='https://github.com/karankankaria/GDrive-X/blob/master/DISCLAIMER.md'>Read Disclaimer!</a>
## Features

1. CDN Enabled.
2. Support Vast/IMA Ads, Popads, Popunder etc.
3. Attractive Panel.
4. Never Die Link.
4. Login Panel for security.
5. Simple Panel.
7. Encryption.
8. 720p, 480p, 360p Quality Streaming.
9. Use Google Photos Bandwidth.
10. Unlimited Storage.
11. Unlimited Bandwidth.
12. No DMCA.
13. Domain Restriction.
14. Support JWPlayer.
15. Fast setup, in about 15 min you can use it.
16. Frame Busting (newly added)

## Demo Site

1. Currently deployed at Heroku.
2. Check it out: <a href="https://gdrivex.herokuapp.com" target="_blank">Visit GDrive-X</a>
3. Login Details:

   ```
   username: admin
   password: admin123
   ```

4. GDrive-X not opening? Try pasting https://gdrivex.herokuapp.com in your browser. 

## Demo of Working Player

1. Currently deployed at Heroku.
2. Check it out: <a href="https://gdrivex.herokuapp.com/embed.php?url=VnBkYnFkQXNvbmRrL0c1aVRkV1BHUXJYSHhqTmxiSkJVeHZBRGU2enhNb24xeFdVM1hlblVSZmcyY3hiWU9uSEpDdTMrdTdPUXo1VmZ0VzVwbGhGcXZpTDR5eWRtelZDKzhyZEdrY1VHdllGS2ExNE11K1g5MW9KcXRYdmtXRHZ0U3c1RVNrZ25SMjJFeGZjUEdCcXFhNG9OL3N3bGhKck1xeGZNSlpLNXl4bmRxVmFFZCtXb0lqc3BpTGd0SGlmTjkwWkJZYzlKY05RUHY2V09EMFNNZTd2dW5NakFrWlBBbHd6WVp0N2htRGpiY3J0bWFYNUdzemFJTFp0MGVEMFEyYnd3a2tuRXhiajdVZHlYbXdrUHc9PQ==&sub=&poster=https://i.gadgets360cdn.com/large/google_photos_1526539307005.jpg" target="_blank">Visit GDrive-X Player</a>

## Requirements

1. Shared Hosting (minimum)
2. VPS/Shared/Dedicated Hosting (recommended) 

## Installation

1. Download the zip file.
2. Upload it in your server root and extract it. 
3. Open index.php and find following code:

   ```
   $username = 'admin';
   $password = 'admin123';
   ```
   
4. Change "admin" with your username and "admin123" with your password.

## VAST/IMA Setup

<ul>
   <li>Open embed.php</li>
   
   <li>Find following code:</li>
   <br />

![](https://raw.githubusercontent.com/karankankaria/JWPlayer/master/assets/advast_setup.jpg)
   <br />

   <li>Otherwise search for following code:</li><br />

   ```
   {adbreak1:{offset:"pre",tag:""}
   adbreak2:{ offset:"50%",tag:""}
   ```
   
   <li>After finding above code, put your VAST/IMA AD TAG in between: tag="" For example:</li>
   <br />
   
   ```
   tag:"add-your-vast/ima-tag-here"
   ```
   
   <li>In offset you can adjust interval between AD shown</li>
</ul>

## IFrame Busting

Initially GDrive-X contains framebusting script which prevents it being loaded in Iframe. If you want to disable it, please follow steps below:
<ul>
<li>Open embed.php</li>
<li>Look for code below. Between line 1 and 3</li>
<br>
   
   ```
   <?PHP
   header('X-Frame-Options: SAMEORIGIN');
   ?>
   ```

<li>Remove it. <strong>Heads up! It will remove framebusting. Anyone with link can now embed it in their site.</strong></li>
</ul>

## Screenshots

![](https://raw.githubusercontent.com/karankankaria/JWPlayer/master/assets/Screenshot%20(177).png)


![](https://raw.githubusercontent.com/karankankaria/JWPlayer/master/assets/Screenshot%20(199).jpg)


![](https://raw.githubusercontent.com/karankankaria/JWPlayer/master/assets/screencapturegooglephoto.jpg)


![](https://raw.githubusercontent.com/karankankaria/JWPlayer/master/assets/Screenshot%20(180).png)


![](https://raw.githubusercontent.com/karankankaria/JWPlayer/master/assets/Screenshot%20(181).png)


## Credits:

<p><b>Credits: <a href="https://github.com/karankankaria" target="_blank">@karankankaria</a></b></p>

## Disclaimer

GDrive-X is created for educational purposes only.

<p>Please read the Disclaimer carefully before you start to use the GDrive-X (repository). By using the GDrive-X (repository) or by downloading GDrive-X (repository) when this option is made available to you, you accept and agree to be bound and abide by the Disclaimer. If you do not want to agree to the GDrive-X (repository)'s Disclaimer, you must not access or use the GDrive-X (repository).</p>

<i>*Use at your own risk.</i>

<b>For Educational And Informational Purposes Only</b>

<p>The information contained in this GDrive-X (repository) and the resources available for download through this GDrive-X (repository) are for educational and informational purposes only.</p>
<br>

   ```
   Fair Use

   Copyright Disclaimer under section 107 of the Copyright Act of 1976, allowance is made for "fair use" for purposes such as:

   1. criticism
   2. comment 
   3. news reporting 
   4. teaching 
   5. scholarship
   6. education and research

   Fair use is not limited to the above and is to be considered on a case by case basis. Fair use is a use permitted by copyright statute that might otherwise be infringing.

   Use at your own risk
   ```
<br>

   ```
   All the information provided on this GDrive-X (repository) is provided on an “as is” and “as available” basis and you agree that you use such information entirely at your own    risk.

   The GDrive-X (repository) gives no warranty and accepts no responsibility or liability for the accuracy or the completeness of the information and materials contained in this    GDrive-X (repository). Under no circumstances will the GDrive-X (repository) be held responsible or liable in any way for any claims, damages, losses, expenses, costs or        liabilities whatsoever (including, without limitation, any direct or indirect damages for loss of profits, business interruption or loss of information) resulting or arising    directly or indirectly from your use of or inability to use this GDrive-X (repository) or any websites linked to it, or from your reliance on the information and material on    this GDrive-X (repository), even if the GDrive-X (repository) has been advised or has known of the possibility of such damages in advance.

   GDrive-X (repository) also contains links to other internet sites. Such links are provided as an information service for the users of this GDrive-X (repository). As the          GDrive-X (repository) has no control over third party sites, the user hereby acknowledges and agrees that the GDrive-X (repository) is not held responsible or liable for any    content or material on such sites. In providing such links, the GDrive-X (repository) does not in any way, expressly or implicitly, endorse the linked sites or resources or      the respective contents thereof. The user further acknowledges and agrees that the GDrive-X (repository) shall not be responsible or liable, whether directly or indirectly,      for any damages or loss caused or sustained by the user, in connection with any use or reliance on information or material obtained from third party sites.

   Any media platforms that claim to represent GDrive-X (repository) are, unless officially recognised by the GDrive-X (repository), unofficial and do not represent the GDrive-X    (repository)'s views or policies. We caution that these platforms may contain outdated, inaccurate or false information. The GDrive-X (repository) excludes any responsibility    in connection with these platforms.
   ```
