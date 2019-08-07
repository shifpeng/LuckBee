<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

<!--    <div class="jumbotron">-->
<!--        <h1>Congratulations!</h1>-->
<!---->
<!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
<!---->
<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
<!--    </div>-->

    <div class="body-content" style="padding: 20px">

        <div class="row">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>常规时间线</legend>
            </fieldset>
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月18日</h3>
                        <p>
                            layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。
                            <br>不枉近百个日日夜夜与之为伴。因小而大，因弱而强。
                            <br>无论它能走多远，抑或如何支撑？至少我曾倾注全心，无怨无悔 <i class="layui-icon"></i>
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月16日</h3>
                        <p>杜甫的思想核心是儒家的仁政思想，他有<em>“致君尧舜上，再使风俗淳”</em>的宏伟抱负。个人最爱的名篇有：</p>
                        <ul>
                            <li>《登高》</li>
                            <li>《茅屋为秋风所破歌》</li>
                        </ul>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月15日</h3>
                        <p>
                            中国人民抗日战争胜利日
                            <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                            <br>铭记、感恩
                            <br>所有为中华民族浴血奋战的英雄将士
                            <br>永垂不朽
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">过去</div>
                    </div>
                </li>
            </ul>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>简约时间线：大事记</legend>
            </fieldset>
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国最受欢迎的前端UI框架（期望）</div>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">2017年，layui 里程碑版本 2.0 发布</div>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">2016年，layui 首个版本发布</div>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">2015年，layui 孵化</div>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">更久前，轮子时代。维护几个独立组件：layer等</div>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</div>
<script>
    layui.use(['util', 'laydate', 'layer'], function(){
        var util = layui.util
            ,laydate = layui.laydate
            ,layer = layui.layer;
        //固定块
        util.fixbar({
            bar1: true
            ,bar2: true
            ,css: {right: 50, bottom: 100}
            ,bgcolor: '#393D49'
            ,click: function(type){
                if(type === 'bar1'){
                    layer.msg('icon是可以随便换的')
                } else if(type === 'bar2') {
                    layer.msg('两个bar都可以设定是否开启')
                }
            }
        });

        //倒计时
        var thisTimer, setCountdown = function(y, M, d, H, m, s){
            var endTime = new Date(y, M||0, d||1, H||0, m||0, s||0) //结束日期
                ,serverTime = new Date(); //假设为当前服务器时间，这里采用的是本地时间，实际使用一般是取服务端的

            clearTimeout(thisTimer);
            util.countdown(endTime, serverTime, function(date, serverTime, timer){
                var str = date[0] + '天' + date[1] + '时' +  date[2] + '分' + date[3] + '秒';
                lay('#test2').html(str);
                thisTimer = timer;
            });
        };
        setCountdown(2099,1,1);

        laydate.render({
            elem: '#test1'
            ,type: 'datetime'
            ,done: function(value, date){
                setCountdown(date.year, date.month - 1, date.date, date.hours, date.minutes, date.seconds);
            }
        });


        //某个时间在当前时间的多久前
        var setTimeAgo = function(y, M, d, H, m, s){
            var str = util.timeAgo(new Date(y, M||0, d||1, H||0, m||0, s||0));
            lay('#test4').html(str);
        };

        laydate.render({
            elem: '#test3'
            ,type: 'datetime'
            ,done: function(value, date){
                setTimeAgo(date.year, date.month - 1, date.date, date.hours, date.minutes, date.seconds);
            }
        });

    });
</script>