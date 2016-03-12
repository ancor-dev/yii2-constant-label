# Allow to specify labels for constants in a Model


Feel free to let me know what else you want added via:

- [Issues](https://github.com/ancor-dev/yii2-constant-label/issues)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require ancor/yii2-constant-label
```

or add

```
"ancor/yii2-constant-label": "dev-master"
```

to the `require` section of your `composer.json` file.

## Adding to the model

To use ConstantLabelBehavior, insert the following code to your Model class:

```php
use common\behaviors\ConstantLabelBehavior;

/**
 * @mixin ConstantLabelBehavior
 */
class MyModel extends Model
{
    const STATUS_ACTIVE  = 10;
    const STATUS_DELETED = 0;

    public function behaviors()
    {
      return [
          [
              'class' => ConstantLabelBehavior::className(),
              'constantLabels' => [
                  'status' => [
                      self::STATUS_ACTIVE  => 'User is active',
                      self::STATUS_DELETED => 'User deleted',
                  ]
              ],
          ]
      ];
    }
}
```

## Usage

```php
$model = new MyModel();


// return key-value array with constant values as key and constant label as value
$labels = $model->getConstantLabels('status');

// return label for one constant
$label = $model->getConstant('status', $model::STATUS_ACTIVE);

// return values of all constants
$values = $model->getConstantValues('status'); // [10, 0]

// also it can be use in validation rules
[
    ['status', 'in', 'range' => $model->getConstantValues('status')],
]
```