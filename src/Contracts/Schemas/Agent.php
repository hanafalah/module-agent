<?php

namespace Hanafalah\ModuleAgent\Contracts\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleAgent\Contracts\Data\AgentData;
use Hanafalah\ModuleOrganization\Contracts\Schemas\Organization;

/**
 * @see \Hanafalah\ModuleAgent\Schemas\Agent
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method bool deleteAgent()
 * @method bool prepareDeleteAgent(? array $attributes = null)
 * @method mixed getAgent()
 * @method ?Model prepareShowAgent(?Model $model = null, ?array $attributes = null)
 * @method array showAgent(?Model $model = null)
 * @method Collection prepareViewAgentList()
 * @method array viewAgentList()
 * @method LengthAwarePaginator prepareViewAgentPaginate(PaginateData $paginate_dto)
 * @method array viewAgentPaginate(?PaginateData $paginate_dto = null)
 * @method array storeAgent(?AgentData $agent_dto = null)
 * @method Builder agent(mixed $conditionals = null)
 */

interface Agent extends Organization
{
}
