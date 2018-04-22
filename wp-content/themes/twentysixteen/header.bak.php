<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background: #FFF">
<div class="header clearfix">
    <div class="header-bar clearfix">
        <div class="toenglish fr">
            <a href="http://www.tsinghua.edu.cn/publish/essen/index.html">English</a>
            <a style="margin-left: 10px;" href="http://info.ess.tsinghua.edu.cn/" target="_blank">办公入口</a></div>
        <div class="top-search fr clearfix">
            <FORM>
                <div class="top-s fl">
                    <INPUT type="text"></div>
                <div class="top-tj fl">
                    <INPUT class="top-sub" type="submit" value="在线搜索"></div>
            </FORM>
        </div>
    </div>
    <div class="header-box clearfix">
        <div class="logo fl">
            <a href="http://www.tsinghua.edu.cn/publish/ess/index.html">清华大学地球系统科学系</a></div>
        <div class="nav fr">
            <UL class="navbox">
                <li>
                    <a class="act" href="http://www.tsinghua.edu.cn/publish/ess/index.html">首页</a></li>
                <li>
                    <a href="http://www.tsinghua.edu.cn/publish/ess/7760/index.html">新闻</a>
                    <UL class="pop-up">
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7777/index.html">图片新闻</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/11337/index.html">媒体地学</a></li>
                    </UL>
                </li>
                <li>
                    <a href="javascript:void(0);">概况</a>
                    <UL class="pop-up">
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7683/index.html">关于我们</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7684/index.html">主任致辞</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7685/index.html">历史沿革</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/10533/index.html">大事记</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/10534/index.html">联系我们</a></li>
                    </UL>
                </li>
                <li>
                    <a href="javascript:void(0);">师资</a>
                    <UL class="pop-up">
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7851/index.html">科学指导委员会</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7687/index.html">全职教师</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7934/index.html">讲席教授</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7935/index.html">双聘教师</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7689/index.html">博士后</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7690/index.html">行政人员</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7688/index.html">实验人员</a></li>
                    </UL>
                </li>
                <li>
                    <a href="javascript:void(0);">教学</a>
                    <UL class="pop-up">
                        <!-- <li><a href="/publish/ess/7698/index.html">本科生</a></li> -->
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7699/index.html">学生课程</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/10536/index.html">学生工作</a></li>
                    </UL>
                </li>
                <li>
                    <a href="javascript:void(0);">科研</a>
                    <UL class="pop-up">
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/10537/index.html">研究方向</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7695/index.html">科研项目</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7783/index.html">科研动态</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/8872/index.html">模式研发</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7693/index.html">实验室</a></li>
                    </UL>
                </li>
                <li>
                    <a href="javascript:void(0);">资源</a>
                    <UL class="pop-up">
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7746/index.html">科研资源</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/7747/index.html">教师资源</a></li>
                    </UL>
                </li>
                <li>
                    <a href="http://www.tsinghua.edu.cn/publish/ess/10538/index.html">招生</a></li>
                <li>
                    <a href="http://www.tsinghua.edu.cn/publish/ess/7700/index.html">招聘</a></li>
                <li class="jz">
                    <a href="javascript:void(0);">捐赠</a>
                    <UL class="pop-up">
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/10539/index.html">捐赠计划</a></li>
                        <li>
                            <a href="http://www.tsinghua.edu.cn/publish/ess/10540/index.html">已有项目</a></li>
                    </UL>
                </li>
            </UL>
        </div>
    </div>
</div>
<!--头部 end-->
<!-- 轮播 开始 -->
<div class="flexslider">
    <UL class="slides">
        <li>
            <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180409112208494444800/20180409112208494444800_.html">
                <img src="清华大学地球系统科学系-首页_files/20180410152513552109900.jpg"></a>
            <div class="show_text">
                <h4>
                    <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180409112208494444800/20180409112208494444800_.html">清华大学—《柳叶刀》“中国健康城市”特邀报告发布会邀请函</a></h4>
            </div>
        </li>
        <li>
            <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180408101008352282409/20180408101008352282409_.html">
                <img src="清华大学地球系统科学系-首页_files/20180408101134626230627.jpg"></a>
            <div class="show_text">
                <h4>
                    <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180408101008352282409/20180408101008352282409_.html">地学系2018年全国优秀大学生夏令营报名通知</a></h4>
            </div>
        </li>
        <li>
            <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180404084005701713315/20180404084005701713315_.html">
                <img src="清华大学地球系统科学系-首页_files/20180405110933806911426.jpg"></a>
            <div class="show_text">
                <h4>
                    <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180404084005701713315/20180404084005701713315_.html">地学系蔡闻佳副教授发表《柳叶刀·星球健康》封面文章</a></h4>
            </div>
        </li>
        <li>
            <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180330090043874438752/20180330090043874438752_.html">
                <img src="清华大学地球系统科学系-首页_files/20180330113605029278386.jpg"></a>
            <div class="show_text">
                <h4>
                    <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180330090043874438752/20180330090043874438752_.html">第五届中国全球变化研究生论坛邀稿通知（第一轮）</a></h4>
            </div>
        </li>
        <li>
            <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180328160031093663039/20180328160031093663039_.html">
                <img src="清华大学地球系统科学系-首页_files/20180328160124249498939.jpg"></a>
            <div class="show_text">
                <h4>
                    <a href="http://www.tsinghua.edu.cn/publish/ess/7777/2018/20180328160031093663039/20180328160031093663039_.html">博士生周璐在《The Cryosphere》发文 ——提出创新的多星融...</a></h4>
            </div>
        </li>
    </UL>
</div>
<!-- 轮播 结束 -->
<div id="page" class="site">
    <div class="site-inner">
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

        <header id="masthead" class="site-header" role="banner">
            <div class="site-header-main">
                <div class="site-branding">
                    <?php twentysixteen_the_custom_logo(); ?>

                    <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
                    <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

                    <div id="site-header-menu" class="site-header-menu">
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'primary-menu',
                                ) );
                                ?>
                            </nav><!-- .main-navigation -->
                        <?php endif; ?>

                        <?php if ( has_nav_menu( 'social' ) ) : ?>
                            <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'social',
                                    'menu_class'     => 'social-links-menu',
                                    'depth'          => 1,
                                    'link_before'    => '<span class="screen-reader-text">',
                                    'link_after'     => '</span>',
                                ) );
                                ?>
                            </nav><!-- .social-navigation -->
                        <?php endif; ?>
                    </div><!-- .site-header-menu -->
                <?php endif; ?>
            </div><!-- .site-header-main -->

            <?php if ( get_header_image() ) : ?>
                <?php
                /**
                 * Filter the default twentysixteen custom header sizes attribute.
                 *
                 * @since Twenty Sixteen 1.0
                 *
                 * @param string $custom_header_sizes sizes attribute
                 * for Custom Header. Default '(max-width: 709px) 85vw,
                 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
                 */
                $custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
                ?>
                <div class="header-image">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    </a>
                </div><!-- .header-image -->
            <?php endif; // End header image check. ?>
        </header><!-- .site-header -->

        <div id="content" class="site-content">
