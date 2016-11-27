<?php
// / This file is intended to be included in PHP files that require safe sanitization of 
// / supported POST and GET inputs. 

// / This file also dictates the basic HRCloud2 API. (NOT INLCLUDING APP-SPECIFIC API's)

// / If you're looking to add code to sanitize additional 
// / POST or GET inputs, you should put it in this file and then require this file into
// / your code project, or app.

// / The following code will sanitize API inputs. Authentication is automatic. 


// / -----------------------------

// / Developers add your code between the following comment lines.....


$your_code_here = null;






// / Developers DO NOT add your code below this comment line.
set_time_limit(0);
// / -----------------------------

// / OFFICIAL HRCLOUD2 SANITIZED API INPUTS

// / The following blocks of code each represent a distnct HRCloud2 API input.
// / To use the official API, satisfy the corresponding POST or GET variables below.
// / API inputs require that the user be logged in. Non-logged-in users will receieve a login screen.

// / The following handles a UserDir POST or GET request.
  // / UserDir's can be POSTed or GETed using the "UserDIR" or "UserDirPOST" variables.

// / This can be used to create a directory or retreive the contents of an existing directory.
  // / Must specify either UserDir or UserDirPOST as a POST or GET variable.
if (isset($_GET['UserDirPOST'])) {
  $_GET['UserDirPOST'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_GET['UserDirPOST']);
  $_POST['UserDirPOST'] = $_GET['UserDirPOST'];
  $_POST['UserDir'] = $_GET['UserDirPOST']; }
if (isset($_GET['UserDir'])) {
  $_GET['UserDirPOST'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_GET['UserDir']);
  $_POST['UserDirPOST'] = $_GET['UserDir'];
  $_POST['UserDir'] = $_GET['UserDir']; }

// / Can be used to trigger HRStreamer on a valid ".Platlist" file.
  // / Must specify $_POST['streamselected'] as an array of files from the CloudLoc.
if (isset($_GET['playlistSelected'])) {
  $_GET['playlistSelected'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_GET['playlistSelected']);
  $_POST['playlistSelected'] = $_GET['playlistSelected']; }
if (isset($_POST['playlistSelected'])) {
  $_POST['playlistSelected'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['playlistSelected']);
  $_GET['playlistSelected'] = $_POST['playlistSelected']; }

// / Can be used to upload multiple files.
  // / Must specify upload as a POST variable.
  // / Must specify $_FILES['filesToUpload'] as an array of files from the client's device.
if (isset($_POST['upload'])) {
  $_POST['upload'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['upload']); 
  if (!is_array($_POST['filesToUpload'])) {
    $_FILES['filesToUpload'] = array($_FILES['filesToUpload']); 
    $_FILES['filesToUpload'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_FILES['filesToUpload']); } }

// / Can be used to download multiple files.
  // / must specify download as a POST variable.
  // / Must specify $_POST['filesToDownload'] as a string or an array of filenames in the CloudLoc.
if (isset($_POST['download'])) {
  $_POST['download'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['download']); 
  if (!is_array($_POST['filesToDownload'])) {
    $_POST['filesToDownload'] = array($_POST['filesToDownload']); 
    $_POST['filesToDownload'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['filesToDownload']); } }

// / Can be used to copy multiple files (will auto-increment with _0, _1, _2, _3, _##, ect. ect...).
  // / must specify copy as a POST variable.
  // / Must specify $_POST['filesToCopy'] as a string or an array of filenames in the CloudLoc.
if (isset($_POST['copy'])) {
  $_POST['copy'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['copy']);
  if (!is_array($_POST['filesToCopy'])) {
    $_POST['newcopyfilename'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['newcopyfilename']);
    $_POST['filesToCopy'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['filesToCopy']);
    $_POST['filesToCopy'] = array($_POST['filesToCopy']); } }

// / Can be used to rename multiple files (will auto-increment with _0, _1, _2, _3, _##, ect. ect...).
  // / must specify rename as a POST variable.
  // / Must specify $_POST['filesToRename'] as a string or an array of filenames in the CloudLoc.
  // / Must specify a renamefilename as a POST variable.
if (isset($_POST['rename'])) {
  $_POST['rename'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['rename']);
  if (!is_array($_POST['filesToRename'])) {
    $_POST['renamefilename'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['renamefilename']); 
    $_POST['filesToRename'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['filesToRename']);
    $_POST['filesToRename'] = array($_POST['filesToRename']); } }

// / Can be used to delete multiple files.
  // / must specify deleteconfirm as a POST variable.
  // / Must specify $_POST['filesToDelete'] as a string or an array of filenames in the CloudLoc.
if (isset($_POST['deleteconfirm'])) {
  $_POST['deleteconfirm'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['deleteconfirm']);
  if (!is_array($_POST['filesToDelete'])) {
    $_POST['filesToDelete'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['filesToDelete']);
    $_POST['filesToDelete'] = array($_POST['filesToDelete']); } }

// / Can be used to archive multiple files (will auto-increment with _0, _1, _2, _3, _##, ect. ect...).
  // / must specify archive as a POST variable.
  // / Must specify $_POST['filesToArchive'] as a string or an array of filenames in the CloudLoc.
  // / Must specify "archextension" and "userfilename" POST variables. 
    // / The filename should NOT contain an extension.
if (isset($_POST['archive'])) {
  $_POST['archive'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['archive']);
  if (!is_array($_POST['filesToArchive'])) {
    $_POST['filesToArchive'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['filesToArchive']);
    $_POST['filesToArchive'] = array($_POST['filesToArchive']);
    $_POST['archextension'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['archextension']);
    $_POST['userfilename'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['userfilename']); } }

// / Can be used to de-archive multiple files, archives, or disk images.
  // / must specify dearchiveButton as a POST variable.
  // / Must specify $_POST['filesToDearchive'] as a string or an array of filenames in the CloudLoc.
if (isset($_POST["dearchiveButton"])) {
  $_POST['dearchiveButton'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['dearchiveButton']); }

// / Can be used to convert multiple files. Supports images, documents, media, archives, disk images, & more.
  // / IMPORTANT NOTE: For basic document or image to .pdf conversions this method of conversion will suffice.
  // / For Advanced .pdf conversions requiring OCR, please use the "pdfwork" API input instead.
    // / Must specify $_POST['convertSelected'] as a string or an array of filenames in the CloudLoc.
    // / Must specify an "extension" and a "userconvertfilename" . 
    // / OPTIONAL: Audio Files Only. Specify either pure integer to select a bitrate or "auto" for automatic (no quotes) .
      // / The userconvertfilename should NOT contain an extension.
if (isset( $_POST['convertSelected'])) {
  $_POST['convertSelected'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['convertSelected']);
    if (!is_array($_POST['convertSelected'])) {
      $_POST['convertSelected'] = array($_POST['convertSelected']); }
  $_POST['extension'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['extension']); 
  $_POST['userconvertfilename'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['userconvertfilename']);
  if (isset($_POST['bitrate'])) {
    $_POST['bitrate'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['bitrate']); } }

// / Can be used to convert multiple document, image, or .pdf files to other document or .pdf files.
// / Really handy for taking pictures of documents and turning them into actual document files. 
  // / Must specify $_POST['pdfworSelected'] as a string or an array of filenames in the CloudLoc.
  // // Must specift pdfextension, userpdfconvertfilename, and method.
    // /  Method must either be 0 or 1.
      // / Method 0 is automatic. The simplest method is chosen first. Best for simple image or .pdf to document conversions.
      // / Method 1 is advanced. This is best for advanced format support and multi-page .pdf to document conversions.
      // / Method 1 requires unoconv. If conversions fail make sure to run "unoconv -l" or "unoconv --listen" in a terminal window.
if (isset($_POST['pdfworkSelected'])) {
  $_POST['pdfworkSelected'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['pdfworkSelected']);
  $txt = ('OP-Act: Initiated PDFWork on '.$Time.'.');
  $MAKELogFile = file_put_contents($LogFile, $txt.PHP_EOL , FILE_APPEND);
    if (!is_array($_POST['pdfworkSelected'])) {
      $_POST['pdfworkSelected'] = array($_POST['pdfworkSelected']); } 
  $_POST['pdfextension'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['pdfextension']); 
  $_POST['userpdfconvertfilename'] = str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['userpdfconvertfilename']);
  $_POST['method'] =  str_replace(str_split('[]{};:$!#^&%@>*<'), '', $_POST['method']); }

// / / There is an API input for creating playlists, but it sucks and I'm still working on HRStreamer. When it's ready, or
   // / if the date is later than February of 2017, plaease open a support ticket and tell me to update this code. 
  // / HRC2SanCore139.

set_time_limit(0);
?>