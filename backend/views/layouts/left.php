<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
//                    ['label' => '商户产品信息', 'url' => ['api-product-info/index']],
//                    ['label' => '用户基本信息', 'url' => ['user-base-info/index']],
//                    ['label' => '撞库记录', 'url' => ['user-verify-record/index']],
//                    ['label' => '订单基本信息', 'url' => ['order-info/index']],
//                    ['label' => '一推二推信息', 'url' => ['order-operate-info/index']],
                    [
                        'label' => '测试环境',
                        'icon' => 'file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '商户产品信息', 'url' => ['api-product-info/index']],
                            ['label' => '用户基本信息', 'url' => ['user-base-info/index']],
                            ['label' => '撞库记录', 'url' => ['user-verify-record/index']],
                            ['label' => '订单基本信息', 'url' => ['order-info/index']],
                            ['label' => '一推二推信息', 'url' => ['order-operate-info/index']],
                            ['label' => '接口日志', 'url' => ['api-log/index']],
                        ],
                    ],
                    [
                        'label' => '生产环境',
                        'icon' => 'file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => '商户产品信息', 'url' => ['api-product-info/search']],
                            ['label' => '用户基本信息', 'url' => ['user-base-info/search']],
                            ['label' => '撞库记录', 'url' => ['user-verify-record/search']],
                            ['label' => '订单基本信息', 'url' => ['order-info/search']],
                            ['label' => '一推二推信息', 'url' => ['order-operate-info/search']],
//                            ['label' => '接口日志', 'url' => ['api-log/search']],
                        ],
                    ],
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Some tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
