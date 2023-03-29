<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Http\Controllers\Voyager;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBreadController as BaseVoyagerBreadController;

class VoyagerPositionController extends BaseVoyagerBreadController
{
    public function __invoke(Request $request): RedirectResponse
    {
        $class = $request->get('class');
        $field = $request->get('field');
        $sort = $request->get('sort');
        $direction = $request->get('direction');
        $id = $request->get('id');

        $this->checkModelPositions($class, $field);

        $current = $class::find($id);

        if (($sort === 'asc' && $direction === 'down') || ($sort === 'desc' && $direction === 'up')) {
            $next = $class::firstWhere($field, $current->$field + 1);
            $current->update([$field => ++$current->$field]);
            $next->update([$field => --$next->$field]);
        } elseif (($sort === 'asc' && $direction === 'up') || ($sort === 'desc' && $direction === 'down')) {
            $prev = $class::firstWhere($field, $current->$field - 1);
            $current->update([$field => --$current->$field]);
            $prev->update([$field => ++$prev->$field]);
        } elseif (($sort === 'asc' && $direction === 'first') || ($sort === 'desc' && $direction === 'last')) {
            $current->update([$field => 1]);
            $models = $class::orderBy($field)->get();
            $this->alignModelPositions($models, $current, $field, 2);
        } elseif (($sort === 'asc' && $direction === 'last') || ($sort === 'desc' && $direction === 'first')) {
            $current->update([$field => $class::count()]);
            $models = $class::orderBy($field)->get();
            $this->alignModelPositions($models, $current, $field, 1);
        }

        return redirect()->route('voyager.' . (new $class())->getTable() . '.index');
    }


    private function checkModelPositions(string $class, string $field): void
    {
        $positions = $class::orderBy($field)->get()->pluck($field)->toArray();
        $needUpdateOrder = !$this->isArrayInRightOrder($positions);

        if ($needUpdateOrder === true) {
            $this->putPositionsInOrder($class, $field);
        }
    }

    private function isArrayInRightOrder(array $positions): bool
    {
        $i = 1;
        foreach ($positions as $position) {
            if ($i++ !== $position) {
                return false;
            }
        }
        return true;
    }

    private function putPositionsInOrder(string $class, string $field): void
    {
        $i = 1;
        $models = $class::orderBy($field)->get();
        foreach ($models as $model) {
            $model->update([$field => $i++]);
        }
    }

    private function alignModelPositions(Collection $models, Model $current, string $field, int $index): void
    {
        foreach ($models as $model) {
            if ($model->id === $current->id) {
                continue;
            }
            $model->update([$field => $index++]);
        }
    }
}
