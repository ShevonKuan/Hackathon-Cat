<template>
<headerdrawer @route="changeroute" />
<div class="mdui-container">

    <div class="mdui-chip" style="position:fixed;top:10px;right:10px;z-index:100000">
        <span class="mdui-chip-icon"><i class="mdui-icon material-icons">info</i></span>
        <span class="mdui-chip-title">服务状态：{{ message }}</span>
    </div>
    <br>
    <uploadphoto @photo="photo" />
    <br>
    <div>
        <insertcat v-if="route==0" :vector="vector" />
        <comparecat v-if="route==1" :vector="vector" />
        <cats v-if="route==2" :cats="cats" />
    </div>
</div>
</template>

<script>
import uploadphoto from './components/uploadphoto.vue'
import insertcat from '@/components/insertcat'
import headerdrawer from '@/components/headerdrawer'
import comparecat from '@/components/comparecat'
import cats from '@/components/cats'
import * as tf from '@tensorflow/tfjs';
import * as mobilenet from '@tensorflow-models/mobilenet';
import $ from 'jquery';
import "mdui/dist/css/mdui.min.css";
import "mdui/dist/js/mdui.min.js";
import mdui from "mdui/dist/js/mdui.min.js";
mdui.mutation();
export default {
    name: 'App',
    components: {
        uploadphoto,
        insertcat,
        headerdrawer,
        comparecat,
        cats
    },
    data() {
        return {
            message: 'IDLE',
            vector: '',
            route: 0,
            cats: []
        };
    },
    mounted: function () {
        console.log('search');
        $.ajax({
            type: 'POST',
            url: '/api/index.php',
            data: {
                action: 'search'
            },
            success: function (re) {
                console.log(re)
                this.cats = re['cats'];
            }
        })
    },
    methods: {
        photo(file) {
            let net;
            var self = this;
            async function app() {
                self.message = '加载深度学习模型...';

                // Load the model.
                net = await mobilenet.load();
                self.message = '推理猫咪特征...';

                const img = file
                const result = await net.infer(img, tf.embedding = true);
                self.message = '完成特征处理,等待上传';

                const values = result.dataSync();
                const arr = Array.from(values);
                self.vector = arr;
                console.log(self.vector);
            }
            app();
        },
        changeroute(d) {
            this.route = d
        }
    }
}
</script>

<style>
.copyright {
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    font-family: Roboto, Noto, Helvetica, Arial, sans-serif;
    white-space: nowrap;
    -webkit-tap-highlight-color: transparent;
    display: block;
    box-sizing: border-box;
    width: 100%;
    padding: 20px 14px;
    font-size: 12px;
    color: rgb(0, 0, 0, 0.6);
}
</style>
