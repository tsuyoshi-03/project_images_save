"use strict";
let preview_1 = document.getElementById('preview_1');
const fileInput_1 = document.getElementById('fileInput_1');
let preview_2 = document.getElementById('preview_2');
const fileInput_2 = document.getElementById('fileInput_2');
const submit = document.getElementById('submit');

//プレビューサイズの調整
let previewWidth = 600;
let previewHeight = 300;

submit.disabled = true;

fileInput_1.addEventListener('change', function(){
  handleFileSelect_1();
}, false);

fileInput_2.addEventListener('change', function(){
  handleFileSelect_2();
}, false);

const handleFileSelect_1 = () => {
  preview_1.innerHTML = "";
  let file_1 = fileInput_1.files;
  previewFile(file_1[0], preview_1);
  isFileCheck();
}

const handleFileSelect_2 = () => {
  preview_2.innerHTML = "";
  let file_2 = fileInput_2.files;
  previewFile(file_2[0], preview_2);
  isFileCheck();
}

let uploadImage;
const previewFile = (file, previewSpace) => {
  const reader = new FileReader();
  uploadImage = new Image(previewWidth, previewHeight);
  reader.onload = () => {
    uploadImage.src = reader.result;
    previewSpace.appendChild(uploadImage);
    //展開された画像の元サイズを取得したい場合
    //uploadImage.onload = () => {
      //console.log('横幅: '+ uploadImage.naturalWidth);
      //console.log('縦幅: '+ uploadImage.naturalHeight);
    //}
  }
  reader.readAsDataURL(file);
}

const isFileCheck = () => {
  if(fileInput_1.files.length > 0 && fileInput_2.files.length > 0){
    submit.disabled = false;
  }
}