<?php
function gk_page_url() {
	$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			$pageURL .= "://";
		
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"];
		}
		
		return $pageURL;
}
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>WordPress Snap</title>
<script type="text/javascript" src="<?php echo gk_page_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo gk_page_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style>
body, html {font-family: Arial;font-size: 12px;padding: 0 15px; background:url(http://www.geekeries.fr/wp-content/themes/iron/img/iosbg.png) 0 0 repeat #f1f0ee;}#wpsnap { line-height: 40px;}label {color:#aaa; text-shadow:1px 1px 0 white; width: 200px; margin-left: 10px;}label#rel {margin-left: 0px!important;}input#url {width: 370px; }input, select { height: 30px;float: left; margin: 0 5px 0 -2px; background: white;transition:.3s ease-in-out; -webkit-transition:.3s ease-in-out; -moz-transition:.3s ease-in-out; display:inline-block; padding:6px 5px 5px; font-family:'lucida grande', tahoma, verdana, arial, sans-serif; font-size:12px;  color:#444; text-shadow:1px 1px 0 white;white-space:nowrap; cursor:pointer;  text-decoration:none; border:1px solid #CACACA; -webkit-border-radius:2px; -moz-border-radius:2px; border-radius:2px; outline:none; width:auto; -webkit-box-shadow:0 0 6px #ccc; -moz-box-shadow:0 0 5px #ccc; box-shadow:0 0 5px #ccc; }input:focus, select:focus { border:1px solid #DA6B02; -webkit-box-shadow:0 0 6px #DA6B02; -moz-box-shadow:0 0 5px #DA6B02; box-shadow:0 0 5px #DA6B02; }input:hover, select:hover { border:1px solid #DA6B02; }h2 {font:Arial, Helvetica, sans-serif; text-shadow:white 0 1px 2px; font-size:25px; font-weight:lighter; color:#535c65; border-bottom:1px solid #ddd; line-height:normal; margin-bottom: 20px; }.gkbutton.two {width: 330px; margin-top: 20px;  transition: .3s ease-in-out;-webkit-transition: .3s ease-in-out;  -moz-transition: .3s ease-in-out; position: absolute; z-index: 1;overflow: visible; padding: 0.55em 1.4em 0.55em 1.4em; border: 1px solid #AAA; text-decoration: none; text-align: center;font: 13px Helvetica, verdana, arial, sans-serif; white-space: nowrap; cursor: pointer; outline: none;color: #444; text-shadow: white 0 1px 2px;-webkit-box-shadow: 0 2px 2px #ccc, inset 0 -10px 10px #EEE;-moz-box-shadow:0 2px 2px #ccc, inset 0 -10px 10px #eee;box-shadow:0 2px 2px #ccc, inset 0 -10px 10px #eee;-webkit-border-radius:3px; background: #F4F4F4;-moz-border-radius:3px; border-radius:3px;}.gkbutton.two:hover, button.gkbutton.two:hover {transition: .2s ease-in-out; -webkit-transition:.2s ease-in-out; -moz-transition:.2s ease-in-out; -webkit-box-shadow: 0 2px 2px #ccc, inset 0 10px 20px white;-moz-box-shadow:0 2px 2px #ccc, inset 0 10px 20px white;box-shadow:0 2px 2px #ccc, inset 0 10px 20px white;-webkit-transition-duration:200ms,200ms,200ms;background: #e0e0e0; background: -moz-linear-gradient(top, #e0e0e0 0%, #e8e8e8 49%, #e0e0e0 50%, #e8e8e8 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e0e0e0), color-stop(49%,#e8e8e8), color-stop(50%,#e0e0e0), color-stop(100%,#e8e8e8)); background: -webkit-linear-gradient(top, #e0e0e0 0%,#e8e8e8 49%,#e0e0e0 50%,#e8e8e8 100%); background: -o-linear-gradient(top, #e0e0e0 0%,#e8e8e8 49%,#e0e0e0 50%,#e8e8e8 100%); background: -ms-linear-gradient(top, #e0e0e0 0%,#e8e8e8 49%,#e0e0e0 50%,#e8e8e8 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0e0e0', endColorstr='#e8e8e8',GradientType=0 ); background: linear-gradient(top, #e0e0e0 0%,#e8e8e8 49%,#e0e0e0 50%,#e8e8e8 100%); color: #444!important;}.gkbutton.two:focus, .gkbutton.two:active {background-color: #ededed;background: -moz-linear-gradient(top, #ededed 0%, #ededed 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ededed), color-stop(100%,#ededed)); background: -webkit-linear-gradient(top, #ededed 0%,#ededed 100%); background: -o-linear-gradient(top, #ededed 0%,#ededed 100%); background: -ms-linear-gradient(top, #ededed 0%,#ededed 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#ededed',GradientType=0 ); background: linear-gradient(top, #ededed 0%,#ededed 100%); -webkit-box-shadow: 0px 0px 0px #aaa, inset 0 5px 10px #d9d9d9;-moz-box-shadow: 0px 0px 0px #aaa, inset 0 5px 10px #d9d9d9;box-shadow: 0px 0px 0px #aaa, inset 0 5px 10px #d9d9d9;}
</style><script type="text/javascript">
var HighlightDialog = {local_ed : 'ed',init : function(ed) {HighlightDialog.local_ed = ed;tinyMCEPopup.resizeToInnerSize();},insert : function insertHighlightSection(ed) {
	tinyMCEPopup.execCommand('mceRemoveNode', false, null);
	var url = jQuery('#wpsnap input#url').val();
	var link = jQuery('#wpsnap select#link').val();
	var alt = jQuery('#wpsnap input#alt').val();
	var title = jQuery('#wpsnap input#title').val();
	var rel = jQuery('#wpsnap select#rel').val();
	var target = jQuery('#wpsnap select#target').val();
	if (url == "") url = "http://";
	var output = '';
	
	output += '[snap url="' + url + '" ';
	output += 'alt="' + alt + '" ';
	if (link == 'on') {
	output += 'link="' + link + '" ';
	output += 'title="' + title + '" ';
	output += 'target="' + target + '" ';

	if (rel == 'nofollow') {
	output += 'rel="' + rel + '" ';
	}
	}
	output += ']';

tinyMCEPopup.execCommand('mceReplaceContent', false, output);
tinyMCEPopup.close(); } };
tinyMCEPopup.onInit.add(HighlightDialog.init, HighlightDialog);
document.write('<base href="'+tinymce.baseURL+'" />');
</script>
	<base target="_self" />
</head>

<body>
<div id="wpsnap">
<h2>Add a great thumbnail</h2>
<input type="text" name="url" value="http://" id="url">
<br>
<label for="alt">Alt (thumbnail) </label>
<input type="text" name="alt" value="My Thumbnail" id="alt">
<br>
<label for="title">Title (link)</label>
<input type="text" name="title" value="My title" id="title">

<br>
<label for="target">Target and </label>
<select name="target" id="target" size="1">
<option value="_blank" selected="selected">New window</option>
<option value="_self">Self</option>
<option value="_parent">Parent</option>
<option value="_top">Top</option>
</select>

<label for="rel" id="rel">Rel :</label>
<select name="rel" id="rel" size="1">
<option value="" selected="selected">None</option>
<option value="nofollow">nofollow</option>

</select>
<br>
<label for="link">Link</label>
<select name="link" id="link" size="1">
<option value="off" selected="selected">No</option>
<option value="on">Yes</option>
</select>
<br>
<a rel="nofollow" class="two gkbutton" href="javascript:HighlightDialog.insert(HighlightDialog.local_ed)">Insert your Snap &rarr;</a>
</form>

</div>
</body>
</html>