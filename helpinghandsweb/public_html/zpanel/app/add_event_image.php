<div class="viewbody">
<h2>Add Images</h2>
 
{{ message }}
	<form action="uploadev.php" method="post" enctype="multipart/form-data">
    Select image to upload(Only JPEG Files Supported):
     <img id="imgshow" src="#" alt="your image" />
    <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);">
    <input type="submit" value="Upload Image" name="submit">
</form>
</div>