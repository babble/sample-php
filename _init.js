
function mapUrlToJxpFile( uri , req ){
    if ( uri == "/" || uri.match( /^.\w+$/ ) ){
	req.name = uri.substring(1);
	return "/controller.php";
    }
}
