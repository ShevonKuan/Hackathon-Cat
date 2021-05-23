<template lang="">
<div class="mdui-typo-title">猫咪对比🐱</div>
选择好猫咪照片后我们会返回与数据库中猫咪的相似度.
<div class="mdui-typo-subheading" v-if="!vector">咦?你还没上传猫咪照片耶</div>
</template>
<script>
export default {
     props:['vector']
}
</script>
<style lang="">
    
</style>