<template lang="">
<!-- <div class="camera">
    <input type="file" capture="camera" accept="image/*" id="filetest" name="filetest" @change="showphoto">
    <img src="" id="photo_upload" width="227" height="227">
</div> -->


<div class="image" style="text-align:center">
  <img src="../assets/bg.jpeg" alt="请输入图片" id="photo_upload" width="227">
</div>
<br>
<input type="file" id="file" style="display: none;" @change="showphoto"/>
<div class="button" style="text-align:center">
  <button class="mdui-btn mdui-color-theme-accent mdui-ripple" onclick="file.click()">
    <i class="mdui-icon mdui-icon-left material-icons">photo</i> 浏览图片
  </button>
</div>



</template>

<script>
export default {
    name: 'uploadphot',
    methods: {
        showphoto() {
            var fileTag = document.getElementById('file');
            var file = fileTag.files[0];
            
            var fileReader = new FileReader();

            fileReader.onloadend = function () {
                if (fileReader.readyState == fileReader.DONE) {
                    document.getElementById('photo_upload').setAttribute('src', fileReader.result);
                }

            };

            fileReader.readAsDataURL(file);
            this.$emit('photo', document.getElementById('photo_upload'));
        },
    }
}
</script>

<style lang="">

</style>
