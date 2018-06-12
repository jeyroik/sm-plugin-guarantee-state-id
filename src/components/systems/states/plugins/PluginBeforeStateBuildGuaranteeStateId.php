<?php
namespace tratabor\components\systems\states\plugins;

use tratabor\components\systems\Plugin;
use tratabor\interfaces\systems\states\IStateMachine;
use tratabor\interfaces\systems\states\machines\plugins\IPluginBeforeStateBuild;

/**
 * Class PluginBeforeStateBuildGuaranteeStateId
 *
 * @package tratabor\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginBeforeStateBuildGuaranteeStateId extends Plugin implements IPluginBeforeStateBuild
{
    /**
     * @param IStateMachine $machine
     * @param array $stateConfig
     * @param $fromStateId
     * @param $stateId
     *
     * @return array
     */
    public function __invoke(IStateMachine &$machine, $stateConfig, $fromStateId, $stateId)
    {
        $stateId = $stateId
            ?: (
                $stateConfig['id']
                ?? sha1(json_encode($stateConfig))
            );

        return [$stateConfig, $fromStateId, $stateId];
    }
}
