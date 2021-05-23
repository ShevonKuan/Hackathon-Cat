<template lang="">
<div class="mdui-typo-title">列出所有猫咪🐱</div>
在这里你可以看到数据库所有的猫咪哦

<div class="mdui-table-fluid">
    <table class="mdui-table mdui-table-hoverable">
        <thead>
            <tr>
                <th>姓名</th>
                <th>性别</th>
                <th>是否接种疫苗</th>
                <th>是否绝育</th>
                <th>身体状况</th>
                <th>性格及故事</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="cat in cats" :key="cat.name">
                <td>{{cat.name}}</td>
                <td>{{cat.sex}}</td>
                <td>{{cat.vaccine}}</td>
                <td>{{cat.sterilization}}</td>
                <td>{{cat.status}}</td>
                <td>{{cat.character}}</td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
export default {

    data() {
        return {
            cat: []
        }
    },
    props:['cats']
}
</script>

<style lang="">

</style>
