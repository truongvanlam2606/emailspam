// Part 5
function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
  // var file = _("file_upload").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);

  // var formdata = new FormData();
  // formdata.append("file_upload", file);
  // var ajax = new XMLHttpRequest();
  // ajax.upload.addEventListener("progress", progressHandler, false);
  // ajax.addEventListener("load", completeHandler, false);
  // ajax.addEventListener("error", errorHandler, false);
  // ajax.addEventListener("abort", abortHandler, false);
  // ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  // //use file_upload_parser.php from above url
  // ajax.send(formdata);

  // Here is demo run process
  for (let i=0; i<=100; i++) {
    setTimeout(function () {
      progressHandler({
        'total' : 100,
        'loaded': i,
      });
    }, i*20);
  }
  setTimeout(function () {
    readURL( _("file_upload"))
  }, 2500);
  setTimeout(completeHandler, 2500);
}

function progressHandler(event) {
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").style.opacity = 1;
  _("progressBar").value = Math.round(percent);
  _("status").style.opacity = 1;
  _("status").innerHTML = Math.round(percent) + "% uploaded" + (percent < 100 ? "... please wait" : "");
}

function completeHandler(event) {
  _("status").style.opacity = 0;
  _("status").innerHTML = '';
  _("progressBar").style.opacity = 0;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
  _("file-upload-btn").innerHTML = 'Change file';
  _("text-above").innerHTML = 'Change file or drag here';
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          _('file-image').style.display = 'block';
          _('file-image').src = e.target.result;
      };

      reader.readAsDataURL(input.files[0]);
  }
}