<?php
/**
 * @link https://github.com/engine-core/config-system
 * @copyright Copyright (c) 2021 engine-core
 * @license BSD 3-Clause License
 */

namespace EngineCore\config\system;

use EngineCore\extension\installation\CoreConfigInterface;
use EngineCore\extension\repository\info\ConfigInfo;
use EngineCore\extension\setting\SettingProviderInterface;

class Info extends ConfigInfo implements CoreConfigInterface
{

    protected
        $id = 'config-system',
        $category = self::CATEGORY_SYSTEM;

    /**
     * {@inheritdoc}
     */
    public function getConfig(): array
    {
        return [
            'components' => [
                'i18n' => [
                    'translations' => [
                        'ec/*' => [
                            'class' => 'yii\\i18n\\PhpMessageSource',
                            'sourceLanguage' => 'en-US',
                            'basePath' => '@EngineCore/messages',
                            'fileMap' => [
                                'ec/app' => 'app.php',
                                'ec/setting' => 'setting.php',
                                'ec/extension' => 'extension.php',
                            ],
                        ],
                    ],
                ],
            ],
            'container' => [
                // 以下的定义系统已经预设，此处仅做提示作用，便于开发者自定义
                'definitions' => [
                    // 调度管理器
                    'DispatchManager' => [
                        'class' => 'EngineCore\dispatch\DispatchManager',
                    ],
                    // 默认采用文件方式存储菜单数据
                    'MenuProvider' => [
                        'class' => 'EngineCore\extension\menu\FileProvider',
                    ],
                    // 默认采用文件方式存储系统设置数据
                    'SettingProvider' => [
                        'class' => 'EngineCore\extension\setting\FileProvider',
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSettings(): array
    {
        return array_merge(parent::getSettings(), [
            SettingProviderInterface::DEFAULT_THEME => [
                'value' => 'engine-core/theme-basic',
                'extra' => 'engine-core/theme-basic:engine-core/theme-basic',
            ],
        ]);
    }

}