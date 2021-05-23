<template lang="">
<header class="mdui-appbar mdui-appbar-fixed" style="box-shadow: none;background-color:rgb(0,0,0,0);backdrop-filter:blur(2px)">
    <div class="mdui-toolbar">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
        <a href="/" class="mdui-typo-title mdui-hidden-xs" onclick="progress()"></a>
        <a href="/" class="mdui-typo-title " onclick="progress()">Ruby on Rails</a>
        <div class="mdui-toolbar-spacer"></div>
    </div>

</header>
<div class="mdui-drawer mdui-drawer-open" id="main-drawer" style="background-color: white;">
    <div class="mdui-card-media">
        <img src="..\assets\p.jpg">
        <div class="mdui-card-media-covered">
            <div class="mdui-card-primary" style="padding: 5px;background-color:rgb(0,0,0,0.3)">
                <div class="mdui-card-primary-title" style="font-size: 18px;">ruby on rails</div>
                <div class="mdui-card-primary-subtitle">We love cats.</div>
            </div>
        </div>
    </div>

    <div class="mdui-list" mdui-collapse="{accordion: true}">
        <a class="mdui-list-item mdui-ripple" v-bind:class="{'mdui-list-item-active':route==0}" @click="changeroute(0)"><i class="mdui-list-item-icon mdui-icon material-icons">find_in_page</i>
            <div class="mdui-list-item-content">找到一只猫咪</div>
        </a>
        <a class="mdui-list-item mdui-ripple" v-bind:class="{'mdui-list-item-active':route==1}" @click="changeroute(1)"><i class="mdui-list-item-icon mdui-icon material-icons">compare_arrows</i>
            <div class="mdui-list-item-content">对比猫咪</div>
        </a>
        <a class="mdui-list-item mdui-ripple" v-bind:class="{'mdui-list-item-active':route==2}" @click="changeroute(2)"><i class="mdui-list-item-icon mdui-icon material-icons">featured_play_list</i>
            <div class="mdui-list-item-content">所有猫咪</div>
        </a>
    </div>

    <div class="mdui-divider"></div>
    <div class="copyright">
        <p>© 2021 TEAM Ruby on Rails</p>
        <p>For 2021 Hackathon</p>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            route:0
        }
    },
    methods:{
        changeroute(k){
            this.route = k;
            this.$emit("route", this.route);
        }
    }
}
</script>

<style lang="">

</style>
