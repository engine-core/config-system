<?php
/**
 * @link https://github.com/engine-core/config-system
 * @copyright Copyright (c) 2021 E-Kevin
 * @license BSD 3-Clause License
 */

namespace EngineCore\config\system;

use EngineCore\extension\repository\info\ConfigInfo;

class Info extends ConfigInfo
{
    
    protected $id = 'config-system';
    
    /**
     * {@inheritdoc}
     */
    public function getConfig(): array
    {
        return [
            'components' => [
                'i18n' => [
                    'translations' => [
                        // 默认翻译配置
                        '*'    => [
                            'class' => 'yii\i18n\PhpMessageSource',
                        ],
                        'ec/*' => [
                            'class'          => 'yii\\i18n\\PhpMessageSource',
                            'sourceLanguage' => 'en-US',
                            'basePath'       => '@EngineCore/messages',
                            'fileMap'        => [
                                'ec/app'     => 'app.php',
                                'ec/setting' => 'setting.php',
                            ],
                        ],
                    ],
                ],
            ],
            'container'  => [
                // 以下的定义系统已经预设，此处仅做提示作用，方便开发者自定义
                'definitions' => [
                    'DispatchManager' => [
                        'class' => 'EngineCore\dispatch\DispatchManager',
                    ],
                    'MenuProvider'    => [
                        'class' => 'EngineCore\extension\menu\FileProvider',
                    ],
                    'SettingProvider' => [
                        'class' => 'EngineCore\extension\setting\FileProvider',
                    ],
                ],
            ],
        ];
    }
    
}