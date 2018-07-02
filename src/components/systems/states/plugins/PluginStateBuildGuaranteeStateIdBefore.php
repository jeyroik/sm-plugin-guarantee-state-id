<?php
namespace jeyroik\extas\components\systems\states\plugins;

use jeyroik\extas\components\systems\Plugin;
use jeyroik\extas\interfaces\systems\states\IStateMachine;
use jeyroik\extas\interfaces\systems\states\machines\plugins\IPluginStateBuildBefore;

/**
 * Class PluginBeforeStateBuildGuaranteeStateId
 *
 * @package jeyroik\extas\components\systems\states\plugins
 * @author Funcraft <me@funcraft.ru>
 */
class PluginStateBuildGuaranteeStateIdBefore extends Plugin implements IPluginStateBuildBefore
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
