<template lang="">
<div class="mdui-typo-title">添加一只新猫咪🐱</div>
选择好猫咪照片后在这里上传猫咪信息哦.
<div class="mdui-typo-subheading" v-if="!vector">咦?你还没上传猫咪照片耶</div>
<form id="infoform" action="javascript:void(0)" v-if="vector">
    <div class="mdui-textfield">
        <label class="mdui-textfield-label">姓名</label>
        <input class="mdui-textfield-input" type="text" v-model="name"/>
    </div>
    <br>
    <div class="sex">
        <label class="mdui-textfield-label">性别</label>
        <div class="mdui-row">
            <div class="mdui-col-xs-6">
                <label class="mdui-radio">
                    <input type="radio" name="sex" value=0 v-model="sex"/>
                    <i class="mdui-radio-icon"></i>
                    雄
                </label>
            </div>
            <label class="mdui-radio">
                <input type="radio" name="sex" value=1 v-model="sex"/>
                <i class="mdui-radio-icon"></i>
                雌
            </label>
        </div>
    </div>
    <br>
    <div class="vaccine">
        <label class="mdui-textfield-label">是否接种疫苗</label>
        <div class="mdui-row">
            <div class="mdui-col-xs-6">
                <label class="mdui-radio">
                    <input type="radio" name="vaccine" value=1 v-model="vaccine"/>
                    <i class="mdui-radio-icon"></i>已接种
                </label>
            </div>
            <div class="mdui-col-xs-6">
                <label class="mdui-radio">
                    <input type="radio" name="vaccine" value=0 v-model="vaccine"/>
                    <i class="mdui-radio-icon"></i>
                    未接种
                </label>

            </div>
        </div>
    </div><br>
    <div class="sterilization">
        <label class="mdui-textfield-label">是否绝育</label>
        <div class="mdui-row">
            <div class="mdui-col-xs-6">
                <label class="mdui-radio">
                    <input type="radio" name="sterilization" value=1 v-model="sterilization"/>
                    <i class="mdui-radio-icon"></i>
                    已绝育
                </label>
            </div>
            <label class="mdui-radio">
                <input type="radio" name="sterilization" value=0 v-model="sterilization"/>
                <i class="mdui-radio-icon"></i>
                未绝育
            </label>
        </div>
    </div>
    <br>
    <div class="mdui-textfield">
        <label class="mdui-textfield-label">身体状况</label>
        <input class="mdui-textfield-input" type="text" v-model="status"/>
    </div>
    <br>
    <div class="mdui-textfield">
        <label class="mdui-textfield-label">性格及故事</label>
        <textarea class="mdui-textfield-input" v-model="character"></textarea>
    </div>

</form>
<br>
<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-btn-block" v-if="vector" @click="upload">新增猫咪 !!!</button>
</template>

<script>
import $ from 'jquery';
export default {
    props:['vector'],
    data(){
        return{
            sterilization:'',
            vaccine:'',
            sex:'',

        }
    },
    methods:{
        upload(){
            var data={
                action:'insert',
                name:this.name,
                sex:this.sex,
                vaccine:this.vaccine,
                sterilization:this.sterilization,
                status:this.status,
                character:this.character,
                vector:JSON.stringify(this.vector)
                
            };
            console.log(data);
            $.ajax({
                type: 'POST',
                url: '/api/index.php',
                data:data,
                success: function(re){
                    console.log(re)
                }
            })
        }
    }
}
</script>

<style lang="">

</style>
