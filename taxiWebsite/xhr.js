//Matthew Rook 18007407
// file xhr.js this is created as a separate file to be used by both admin and booking
//to stop duplicate code
 function createRequest() {
    var xhr = false;  
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xhr;
} // end function createRequest()
