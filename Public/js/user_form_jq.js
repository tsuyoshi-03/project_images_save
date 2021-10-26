"use strict";
var defaultImage;
var context = canvas.getContext('2d');

$('#resize').prop('disabled', true);

var previewFile = (file) => {
  var reader = new FileReader();
  defaultImage = new Image(500,500);
  reader.onload = () => {
    $(defaultImage).attr('src', reader.result);
    $(defaultImage).appendTo($('#preview'));
    defaultImage.onload = () => {
      $('#defaultWidthInput').val(defaultImage.naturalWidth);
      $('#defaultHeightInput').val(defaultImage.naturalHeight);
    }
  }
  reader.readAsDataURL(file);
};

var handleFileSelect = () => {
  $('#preview').text("")
  var files = fileInput.files;
  previewFile(files[0]);
  $('#resize').prop('disabled', false);
};

$('#fileInput').change(function() {
  handleFileSelect();
});

$('#resize').click(function() {
  var resizeImage = new Image();
  $(resizeImage).attr('src', defaultImage.src);
  $('#canvas').attr('width',$('#resizeWidthInput').val());
  $('#canvas').attr('height',$('#resizeHeightInput').val());
  context.drawImage(resizeImage, 0, 0, $('#resizeWidthInput').val(), $('#resizeHeightInput').val());
});