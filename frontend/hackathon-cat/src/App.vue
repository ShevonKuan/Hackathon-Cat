<template>
<div>
    其其最叻
</div>
<uploadphoto @photo="photo" />

<div>{{ message }}</div>
</template>

<script>
import uploadphoto from './components/uploadphoto.vue'
import * as tf from '@tensorflow/tfjs';
import * as mobilenet from '@tensorflow-models/mobilenet';
import $ from 'jquery';
export default {
    name: 'App',
    components: {
        uploadphoto
    },
    data() {
        return {
            message: 'IDLE',
        };
    },
    mounted: function () {},
    methods: {
        photo(file) {
            let net;
            var self = this;
            self.message = 'checking server';
            $.ajax({
                url: '/api/',
                async: false,
                success: function () {
                    self.message = '服务器连接成功';
                }

            });
            async function app() {
                self.message = 'Loading mobilenet..';

                // Load the model.
                net = await mobilenet.load();
                self.message = 'Successfully loaded model';

                const img = file
                const result = await net.infer(img, tf.embedding = true);
                self.message = 'Uploading';

                const values = result.dataSync();
                const arr = Array.from(values);
                $.ajax({
                    url: '/api/',
                    async: false,
                    data:{
                        method: 'insert',
                        vector: JSON.stringify(arr),
                    },
                    success: function () {
                        self.message = '上传成功';
                    }

                });

            }

            app();
        }
    }
}
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
</style>
