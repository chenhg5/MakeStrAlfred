<?php

require 'vendor/autoload.php';

use Alfred\Workflows\Workflow;

// $workflow->result()
//          ->uid('bob-belcher')   唯一编号 : STRING (可选)，用于排序
//          ->title('Bob')         标题： STRING， 显示结果
//          ->subtitle('Head Burger Chef')  副标题： STRING ,显示额外的信息
//          ->quicklookurl('http://www.bobsburgers.com')  快速预览地址 : STRING (optional)
//          ->type('default')   类型，可选择文件类型: "default" | "file"
//          ->arg('bob')    输出参数 : STRING (recommended)，传递值到下一个模块
//          ->valid(true)       回车是否可用 : true | false (optional, default = true)
//          ->icon('bob.png')   图标
//          ->mod('cmd', 'Search for Bob', 'search')   修饰键 : OBJECT (可选)
//          ->text('copy', 'Bob is the best!')   按cmd+c 复制出来的文本: OBJECT (optional)
//          ->autocomplete('Bob Belcher');    自动补全 : STRING (recommended)

class ManageStr
{
    private $workflow;

    public function __construct()
    {
        $this->workflow = new Workflow;
    }

    public function generate($query)
    {
        $length = intval($query) < 50 ?  intval($query) : 50;

        $randArr = ['1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i','j','v','k',
                    'l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G',
                    'H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        shuffle($randArr);

        $uuid = '';
        for ($i = 0; $i < $length; $i++) {
            $uuid .= $randArr[mt_rand(0, 62)];
        }

        $this->workflow->result()
                    ->title($uuid)
                    ->subtitle('enter to copy')
                    ->arg($uuid)
                    ->icon('icon.png')
                    ->text('copy', $uuid);

        echo $this->workflow->output();
    }
}
