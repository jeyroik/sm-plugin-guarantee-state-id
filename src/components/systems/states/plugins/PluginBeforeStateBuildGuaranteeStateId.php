<?php
namespace tratabor\components\systems\states\plugins;

use tratabor\components\systems\Plugin;
use tratabor\interfaces\systems\states\plugins\IPluginBeforeStateBuild;

/**
 * Class PluginBeforeStateBuildGuaranteeStateId
 *
 * @package tratabor\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginBeforeStateBuildGuaranteeStateId extends Plugin implements IPluginBeforeStateBuild
{
    /**
     * @param array $stateConfig
     * @param string $fromState
     * @param string $stateId
     *
     * @return array
     */
    public function __invoke($stateConfig = [], $fromState = '', $stateId = '')
    {
        $stateId = $stateId
            ?: (
                $stateConfig['id']
                ?? sha1(json_encode($stateConfig))
            );

        return [$stateConfig, $fromState, $stateId];
    }
}
