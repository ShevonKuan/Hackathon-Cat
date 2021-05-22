module.exports = {
    devServer: {
        proxy: {
            // 匹配所有以 /api 开头的url
            '/api': {
                // 请求的目标主机
                target: 'https://shevonpeng.cn/api/cat',
                changeOrigin: true,
                ws: true,
                pathRewrite: {
                    '^/api/': ''
                }
            },
        },
    },
}