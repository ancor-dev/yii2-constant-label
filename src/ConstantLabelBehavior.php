<?php
namespace ancor\constantLabel;

use Yii;
use yii\base\Behavior;
use yii\base\Model;

/**
 * ConstantLabelBehavior allow to specify labels for constants in a Model
 *
 * To use ConstantLabelBehavior, insert the following code to your Model class:
 *
 * ```php
 * use common\behaviors\ConstantLabelBehavior;
 *
 * public function behaviors()
 * {
 *     return [
 *         [
 *             'class' => ConstantLabelBehavior::className(),
 *             'constantLabels' => [
 *                 'status' => [
 *                     self::STATUS_ACTIVE  => 'User is active',
 *                     self::STATUS_DELETED => 'User deleted',
 *                 ]
 *             ],
 *         ]
 *     ];
 * }
 * ```
 */
class ConstantLabelBehavior extends Behavior
{
    public $constantLabels = [];

    /**
     * Get label for field constant values
     *
     * @param  string $field    field name
     * @param  mixed  $constant value of constant
     *
     * @return string[]|string|null           array of labels if 'constant' is not
     *   passed or label if it passed and NULL if the field or the constant not
     *   found
     */
    public function getConstantLabel($field, $constant)
    {
        /**
         * @var Model $model
         */
        $model      = $this->owner;
        $attributes = $model->attributes();
        $labels     = $this->constantLabels;

        // check field exists
        if ( !in_array($field, $attributes) || !isset($field, $labels)) return null;

        // the constantLabel not found
        if ( !isset($labels[$field][$constant])) return null;

        return $labels[$field][$constant];
    } // end getConstantLabel()

    /**
     * Get all constant labels for a field
     *
     * @param  string $field field name
     *
     * @return string[]null  array of labels if $field  is exists or
     *                       'null' if $field is not exists
     */
    public function getConstantLabels($field)
    {
        /**
         * @var Model $model
         */
        $model      = $this->owner;
        $attributes = $model->attributes();
        $labels     = $this->constantLabels;

        // check field exists
        if ( !in_array($field, $attributes) || !isset($field, $labels)) return null;

        return $labels[$field];
    } // end getConstantLabels()

}