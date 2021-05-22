<template lang="">
<div class="camera">
    <input type="file" capture="camera" accept="image/*" id="filetest" name="filetest" @change="showphoto">
    <img src="" id="photo_upload" width="227" height="227">
</div>
</template>

<script>
export default {
    name: 'uploadphot',
    methods: {
        showphoto() {
            var fileTag = document.getElementById('filetest');
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
