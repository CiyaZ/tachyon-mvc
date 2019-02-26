<?php

namespace CiyaZ\TachyonMvc;

/**
 * 自定义控制器基类
 *
 * @package Tachyon\Mvc
 */
class Controller
{
    /**
     * 处理GET请求
     *
     * @param $mv ModelAndView
     * @return ModelAndView
     */
    public function get($mv)
    {
        return $mv;
    }

    /**
     * 处理POST请求
     *
     * @param $mv ModelAndView
     * @return ModelAndView
     */
    public function post($mv)
    {
        return $mv;
    }

    /**
     * 处理DELETE请求
     *
     * @param $mv ModelAndView
     * @return ModelAndView
     */
    public function delete($mv)
    {
        return $mv;
    }

    /**
     * 处理PUT请求
     *
     * @param $mv ModelAndView
     * @return ModelAndView
     */
    public function put($mv)
    {
        return $mv;
    }
}

/**
 * 注册自定义控制器
 *
 * @param $controller Controller 控制器实例
 * @throws \Exception 视图未正确配置
 */
function register_controller($controller)
{
    $mv = new ModelAndView();
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $mv = $controller->get($mv);
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mv = $controller->post($mv);
    } else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
        $mv = $controller->put($mv);
    } else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
        $mv = $controller->delete($mv);
    }
    if ($mv == null || $mv->view == null || $mv->view == "") {
        throw new ViewUndefinedException("视图未正确配置! ModelAndView Undefined!");
    }

    $v = $mv->view;
    $m = $mv->model;
    unset($mv);

    require $v;
}
